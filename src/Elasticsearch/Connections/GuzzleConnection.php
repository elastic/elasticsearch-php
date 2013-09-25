<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 10:39 AM
 */

namespace Elasticsearch\Connections;


use Elasticsearch\Common\Exceptions\AlreadyExpiredException;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\NoDocumentsToGetException;
use Elasticsearch\Common\Exceptions\NoShardAvailableException;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Common\Exceptions\ScriptLangNotSupportedException;
use Elasticsearch\Common\Exceptions\TransportException;
use \Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Guzzle\Http\Exception\CurlException;
use Guzzle\Http\Exception\ServerErrorResponseException;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\Response;

class GuzzleConnection extends AbstractConnection implements ConnectionInterface
{
    /** @var  Client */
    private $guzzle;


    /**
     * @param string          $host             Host string
     * @param int             $port             Host port
     * @param array           $connectionParams Array of connection parameters
     * @param \Monolog\Logger $log              Monolog logger object
     * @param \Monolog\Logger $trace            Monolog logger object (for curl traces)
     *
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return \Elasticsearch\Connections\GuzzleConnection
     */
    public function __construct($host, $port, $connectionParams, $log, $trace)
    {
        if (isset($connectionParams['guzzleClient']) !== true) {
            $log->addCritical('guzzleClient must be set in connectionParams');
            throw new InvalidArgumentException('guzzleClient must be set in connectionParams');
        }

        if (isset($port) !== true) {
            $port = 9200;
        }
        $this->guzzle = $connectionParams['guzzleClient'];
        return parent::__construct($host, $port, $connectionParams, $log, $trace);

    }

    /**
     * Returns the transport schema
     *
     * @return string
     */
    public function getTransportSchema()
    {
        return $this->transportSchema;
    }


    /**
     * Perform an HTTP request on the cluster
     *
     * @param string      $method HTTP method to use for request
     * @param string      $uri    HTTP URI to use for request
     * @param null|string $params Optional URI parameters
     * @param null|string $body   Optional request body
     * @param array       $options
     *
     * @return array
     */
    public function performRequest($method, $uri, $params = null, $body = null, $options = array())
    {

        $uri = $this->getURI($uri, $params);
        $request = $this->buildGuzzleRequest($method, $uri, $body, $options);
        $response = $this->sendRequest($request, $body);

        return array(
            'status' => $response->getStatusCode(),
            'text'   => $response->getBody(true),
            'info'   => $response->getInfo(),
        );

    }


    /**
     * @param string $uri
     * @param array $params
     *
     * @return string
     */
    private function getURI($uri, $params)
    {
        $uri = $this->host . $uri;

        if (isset($params) === true) {
            $uri .= '?' . http_build_query($params);
        }

        return $uri;
    }


    /**
     * @param string $method
     * @param string $uri
     * @param string $body
     * @param array $options
     *
     * @return Request
     */
    private function buildGuzzleRequest($method, $uri, $body, $options = array())
    {
        if ($method === 'GET' && isset($body) === true) {
            $method = 'POST';
        }

        if (isset($body) === true) {
            $request = $this->guzzle->$method($uri, array(), $body, $options);
        } else {
            $request = $this->guzzle->$method($uri, array(), $options);
        }

        return $request;
    }


    /**
     * @param Request $request
     *
     * @param string  $body
     *
     * @throws \Elasticsearch\Common\Exceptions\TransportException
     * @return \Guzzle\Http\Message\Response
     */
    private function sendRequest(Request $request, $body)
    {
        try {
            $request->send();
        } catch (ServerErrorResponseException $exception) {
            $this->process5xxError($request, $exception, $body);

        } catch (ClientErrorResponseException $exception) {
            $this->process4xxError($request, $exception, $body);

        } catch (CurlException $exception) {
           $this->processCurlError($exception);

        } catch (\Exception $exception) {
            $error = 'Unexpected error: ' . $exception->getMessage();
            $this->log->addCritical($error);
            throw new TransportException($error);
        }

        $this->processSuccessfulRequest($request, $body);
        return $request->getResponse();
    }


    /**
     * @param Request                      $request
     * @param ServerErrorResponseException $exception
     * @param string                       $body
     *
     * @throws \Elasticsearch\Common\Exceptions\RoutingMissingException
     * @throws \Elasticsearch\Common\Exceptions\NoShardAvailableException
     * @throws \Guzzle\Http\Exception\ServerErrorResponseException
     * @throws \Elasticsearch\Common\Exceptions\NoDocumentsToGetException
     */
    private function process5xxError(Request $request, ServerErrorResponseException $exception, $body)
    {
        $this->logErrorDueToFailure($request, $exception, $body);

        $statusCode    = $request->getResponse()->getStatusCode();
        $exceptionText = $exception->getMessage();
        $responseBody  = $request->getResponse()->getBody(true);

        $exceptionText = "$statusCode Server Exception: $exceptionText\n$responseBody";
        $this->log->addError($exceptionText);

        if ($statusCode === 500 && strpos($responseBody, "RoutingMissingException") !== false) {
            throw new RoutingMissingException($exceptionText, $statusCode, $exception);
        } elseif ($statusCode === 500 && preg_match('/ActionRequestValidationException.+ no documents to get/',$responseBody) === 1) {
            throw new NoDocumentsToGetException($exceptionText, $statusCode, $exception);
        } elseif ($statusCode === 500 && strpos($responseBody, 'NoShardAvailableActionException') !== false) {
            throw new NoShardAvailableException($exceptionText, $statusCode, $exception);
        } else {
            throw new ServerErrorResponseException($exceptionText, $statusCode, $exception);
        }


    }


    private function process4xxError(Request $request, ClientErrorResponseException $exception, $body)
    {
        $this->logErrorDueToFailure($request, $exception, $body);

        $statusCode    = $request->getResponse()->getStatusCode();
        $exceptionText = $exception->getMessage();
        $responseBody  = $request->getResponse()->getBody(true);

        $exceptionText = "$statusCode Server Exception: $exceptionText\n$responseBody";

        if ($statusCode === 400 && strpos($responseBody, "AlreadyExpiredException") !== false) {
            throw new AlreadyExpiredException($exceptionText, $statusCode, $exception);
        } elseif ($statusCode === 403) {
            throw new Forbidden403Exception($exceptionText, $statusCode, $exception);
        } elseif ($statusCode === 404) {
            throw new Missing404Exception($exceptionText, $statusCode, $exception);
        } elseif ($statusCode === 409) {
            throw new Conflict409Exception($exceptionText, $statusCode, $exception);
        } elseif ($statusCode === 400 && strpos($responseBody, 'script_lang not supported') !== false) {
            throw new ScriptLangNotSupportedException($exceptionText. $statusCode);
        }
    }


    /**
     * @param Request    $request
     * @param \Exception $exception
     * @param string     $body
     */
    private function logErrorDueToFailure(Request $request, \Exception $exception, $body)
    {
        $response = $request->getResponse();

        $this->logRequestFail(
            $request->getMethod(),
            $request->getUrl(),
            $response->getInfo('total_time'),
            $response->getStatusCode(),
            $body,
            $exception->getMessage()
        );
    }


    /**
     * @param CurlException $exception\
     */
    private function processCurlError(CurlException $exception)
    {
        $error = 'Curl error: ' . $exception->getMessage();
        $this->log->addError($error);
        $this->throwCurlException($exception->getErrorNo(), $exception->getError());
    }

    /**
     * @param Request $request
     * @param string  $body
     */
    private function processSuccessfulRequest(Request $request, $body)
    {
        $response = $request->getResponse();

        $this->logRequestSuccess(
            $request->getMethod(),
            $request->getUrl(),
            $body,
            $response->getStatusCode(),
            $response->getBody(true),
            $response->getInfo('total_time')
        );
    }
}