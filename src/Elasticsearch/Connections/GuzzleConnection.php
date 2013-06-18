<?php
/**
 * User: zach
 * Date: 6/17/13
 * Time: 10:39 AM
 */

namespace Elasticsearch\Connections;


use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\TransportException;
use \Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Guzzle\Http\Exception\CurlException;
use Guzzle\Http\Exception\ServerErrorResponseException;
use Guzzle\Http\Message\Request;
use Guzzle\Http\Message\RequestInterface;
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
     *
     * @throws \Elasticsearch\Common\Exceptions\TransportException
     * @throws \Elasticsearch\Common\Exceptions\ServerErrorResponseException
     * @return array
     */
    public function performRequest($method, $uri, $params = null, $body = null)
    {

        $uri = $this->getURI($uri, $params);
        $request = $this->buildGuzzleRequest($method, $uri, $body);
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
     *
     * @return Request
     */
    private function buildGuzzleRequest($method, $uri, $body)
    {
        if ($method === 'GET' && isset($body) === true) {
            $method = 'POST';
        }

        if (isset($body) === true) {
            $request = $this->guzzle->$method($uri, array(), $body);
        } else {
            $request = $this->guzzle->$method($uri, array());
        }

        return $request;
    }


    /**
     * @param Request $request
     *
     * @param string  $body
     *
     * @return \Guzzle\Http\Message\Response
     * @throws \Elasticsearch\Common\Exceptions\TransportException
     */
    private function sendRequest(Request $request, $body)
    {
        try {
            $request->send();
        } catch (ServerErrorResponseException $exception) {
            $this->process5xxError($request, $exception, $body);

        } catch (ClientErrorResponseException $exception) {
            $this->logErrorDueToFailure($request, $exception, $body);

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
     * @throws \Guzzle\Http\Exception\ServerErrorResponseException
     */
    private function process5xxError(Request $request, ServerErrorResponseException $exception, $body)
    {
        $this->logErrorDueToFailure($request, $exception, $body);

        $exceptionText = $request->getResponse()->getStatusCode().' Server Exception: '.$exception->getMessage();
        $this->log->addError($exceptionText);
        throw new ServerErrorResponseException($exceptionText);

    }


    /**
     * @param Request                      $request
     * @param ClientErrorResponseException $exception
     * @param string                       $body
     */
    private function logErrorDueToFailure(Request $request, ClientErrorResponseException $exception, $body)
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