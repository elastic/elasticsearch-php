<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace Elasticsearch\Connections;

use Elasticsearch\Common\Exceptions\AlreadyExpiredException;
use Elasticsearch\Common\Exceptions\Authentication401Exception;
use Elasticsearch\Common\Exceptions\BadRequest400Exception;
use Elasticsearch\Common\Exceptions\Conflict409Exception;
use Elasticsearch\Common\Exceptions\Forbidden403Exception;
use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\NoDocumentsToGetException;
use Elasticsearch\Common\Exceptions\NoShardAvailableException;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Common\Exceptions\ScriptLangNotSupportedException;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use Elasticsearch\Common\Exceptions\TransportException;
use Guzzle\Parser\ParserRegistry;
use Psr\Log\LoggerInterface;

/**
 * Class Connection
 *
 * @category Elasticsearch
 * @package  Elasticsearch\CurlMultiConnection
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class CurlMultiConnection extends AbstractConnection implements ConnectionInterface
{

    /**
     * @var Resource
     */
    private $multiHandle;

    private $headers;

    private $curlOpts;

    private $lastRequest = array();


    /**
     * Constructor
     *
     * @param array                    $hostDetails
     * @param array                    $connectionParams Array of connection parameters
     * @param \Psr\Log\LoggerInterface $log              logger object
     * @param \Psr\Log\LoggerInterface $trace            logger object (for curl traces)
     *
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return CurlMultiConnection
     */
    public function __construct($hostDetails, $connectionParams, LoggerInterface $log, LoggerInterface $trace)
    {
        parent::__construct($hostDetails, $connectionParams, $log, $trace);

        if (extension_loaded('curl') !== true) {
            $log->critical('Curl library/extension is required for CurlMultiConnection.');
            throw new RuntimeException('Curl library/extension is required for CurlMultiConnection.');
        }

        if (isset($connectionParams['curlMultiHandle']) !== true) {
            $log->critical('curlMultiHandle must be set in connectionParams');
            throw new InvalidArgumentException('curlMultiHandle must be set in connectionParams');
        }

        if (isset($hostDetails['port']) !== true) {
            $hostDetails['port'] = 9200;
        }

        if (isset($hostDetails['scheme']) !== true) {
            $hostDetails['scheme'] = 'http';
        }

        $connectionParams = $connectionParams + $this->connectionParams;
        $connectionParams = $this->transformAuth($connectionParams);
        $this->curlOpts = $this->generateCurlOpts($connectionParams);

        $this->multiHandle = $connectionParams['curlMultiHandle'];

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
     * @param string      $method  HTTP method to use for request
     * @param string      $uri     HTTP URI to use for request
     * @param null|string $params  Optional URI parameters
     * @param null|string $body    Optional request body
     * @param array       $options Optional options
     *
     * @throws \Elasticsearch\Common\Exceptions\TransportException
     * @throws \Elasticsearch\Common\Exceptions\ServerErrorResponseException
     * @return array
     */
    public function performRequest($method, $uri, $params = null, $body = null, $options = array())
    {
        $curlHandle = curl_init();
        $opts = $this->curlOpts;
        $perRequestCurlOpts = array();

        if (isset($params['curlOpts']) === true) {
            $perRequestCurlOpts = $params['curlOpts'];
            unset($params['curlOpts']);
        }

        $uri = $this->getURI($uri, $params);

        $opts[CURLOPT_URL] = $uri;

        if (isset($opts[CURLOPT_CUSTOMREQUEST]) !== true) {
            $opts[CURLOPT_CUSTOMREQUEST]= $method;
        }

        if (count($options) > 0) {
            $opts = $this->reconcileOptions($options) + $opts;
        }

        if ($method === 'GET') {
            //Force these since Curl won't reset by itself
            $opts[CURLOPT_NOBODY] = false;
        } else if ($method === 'HEAD') {
            $opts[CURLOPT_NOBODY] = true;
        }

        if (isset($body) === true) {
            $opts[CURLOPT_POSTFIELDS] = $body;
        }

        // Add in our custom per-request curl opts after everything is generated
        $opts = $perRequestCurlOpts + $opts;    // Left-hand takes precedence over right-hand

        $this->log->debug("Curl Options:", $opts);

        $this->lastRequest = array('request' =>
                                   array(
                                        'uri'     => $uri,
                                        'body'    => $body,
                                        'options' => $options,
                                        'method'  => $method
                                    )
                                );

        curl_setopt_array($curlHandle, $opts);
        curl_multi_add_handle($this->multiHandle, $curlHandle);

        $response = array();


        do {

            do {
                $execrun = curl_multi_exec($this->multiHandle, $running);
            } while ($execrun == CURLM_CALL_MULTI_PERFORM && $running === 1);

            if ($execrun !== CURLM_OK) {
                $this->log->critical('Unexpected Curl error: ' . $execrun);
                throw new TransportException('Unexpected Curl error: ' . $execrun);
            }

            /*
                Curl_multi_select not strictly necessary, since we are only
                performing one request total.  May be useful if we ever
                implement batching

                From Guzzle: https://github.com/guzzle/guzzle/blob/master/src/Guzzle/Http/Curl/CurlMulti.php#L314
                Select the curl handles until there is any
                activity on any of the open file descriptors. See:
                https://github.com/php/php-src/blob/master/ext/curl/multi.c#L170
            */

            if ($running === 1 && $execrun === CURLM_OK && curl_multi_select($this->multiHandle, 0.5) === -1) {
                /*
                    Perform a usleep if a previously executed select returned -1
                    @see https://bugs.php.net/bug.php?id=61141
                */

                usleep(100);
            }

            // A request was just completed.
            while ($transfer = curl_multi_info_read($this->multiHandle)) {
                $response['responseText'] = curl_multi_getcontent($transfer['handle']);
                $response['errorNumber']  = curl_errno($transfer['handle']);
                $response['error']        = curl_error($transfer['handle']);
                $response['requestInfo']  = curl_getinfo($transfer['handle']);
                curl_multi_remove_handle($this->multiHandle, $transfer['handle']);

            }
        } while ($running === 1);

        $this->lastRequest['response']['body']    = $response['responseText'];
        $this->lastRequest['response']['info']    = $response['requestInfo'];
        $this->lastRequest['response']['status']  = $response['requestInfo']['http_code'];

        // If there was an error response, something like a time-out or
        // refused connection error occurred.
        if ($response['error'] !== '') {
            $this->processCurlError($method, $uri, $response);
        }

        if ($response['requestInfo']['http_code'] >= 400 && $response['requestInfo']['http_code'] < 500) {
            $this->process4xxError($method, $uri, $body, $response);
        } else if ($response['requestInfo']['http_code'] >= 500) {
            $this->process5xxError($method, $uri, $body, $response);
        }

        $this->logRequestSuccess(
            $method,
            $uri,
            $body,
            "",  //TODO FIX THIS
            $response['requestInfo']['http_code'],
            $response['responseText'],
            $response['requestInfo']['total_time']
        );



        return array(
            'status' => $response['requestInfo']['http_code'],
            'text'   => $response['responseText'],
            'info'   => $response['requestInfo'],
        );

    }


    /**
     * @return array
     */
    public function getLastRequestInfo()
    {
        return $this->lastRequest;
    }


    /**
     * @param $method
     * @param $uri
     * @param $response
     *
     * @throws \Elasticsearch\Common\Exceptions\ScriptLangNotSupportedException
     * @throws \Elasticsearch\Common\Exceptions\Forbidden403Exception
     * @throws \Elasticsearch\Common\Exceptions\Conflict409Exception
     * @throws \Elasticsearch\Common\Exceptions\Missing404Exception
     * @throws \Elasticsearch\Common\Exceptions\AlreadyExpiredException
     */
    private function process4xxError($method, $uri, $request, $response)
    {
        $this->logErrorDueToFailure($method, $uri, $request, $response);

        $statusCode    = $response['requestInfo']['http_code'];
        $exceptionText = $response['error'];
        $responseBody  = $response['responseText'];

        $exceptionText = "$statusCode Server Exception: $exceptionText\n$responseBody";

        if ($statusCode === 400 && strpos($responseBody, "AlreadyExpiredException") !== false) {
            throw new AlreadyExpiredException($responseBody, $statusCode);
        } elseif ($statusCode === 401) {
            throw new Authentication401Exception($responseBody, $statusCode);
        } elseif ($statusCode === 403) {
            throw new Forbidden403Exception($responseBody, $statusCode);
        } elseif ($statusCode === 404) {
            throw new Missing404Exception($responseBody, $statusCode);
        } elseif ($statusCode === 409) {
            throw new Conflict409Exception($responseBody, $statusCode);
        } elseif ($statusCode === 400 && strpos($responseBody, 'script_lang not supported') !== false) {
            throw new ScriptLangNotSupportedException($responseBody. $statusCode);
        } elseif ($statusCode === 400) {
            throw new BadRequest400Exception($responseBody, $statusCode);
        }
    }


    /**
     * @param $method
     * @param $uri
     * @param $response
     *
     * @throws \Elasticsearch\Common\Exceptions\RoutingMissingException
     * @throws \Elasticsearch\Common\Exceptions\NoShardAvailableException
     * @throws \Elasticsearch\Common\Exceptions\NoDocumentsToGetException
     * @throws \Elasticsearch\Common\Exceptions\ServerErrorResponseException
     */
    private function process5xxError($method, $uri, $request, $response)
    {
        $this->logErrorDueToFailure($method, $uri, $request, $response);

        $statusCode    = $response['requestInfo']['http_code'];
        $exceptionText = $response['error'];
        $responseBody  = $response['responseText'];

        $exceptionText = "$statusCode Server Exception: $exceptionText\n$responseBody";
        $this->log->error($exceptionText);

        if ($statusCode === 500 && strpos($responseBody, "RoutingMissingException") !== false) {
            throw new RoutingMissingException($responseBody, $statusCode);
        } elseif ($statusCode === 500 && preg_match('/ActionRequestValidationException.+ no documents to get/',$responseBody) === 1) {
            throw new NoDocumentsToGetException($responseBody, $statusCode);
        } elseif ($statusCode === 500 && strpos($responseBody, 'NoShardAvailableActionException') !== false) {
            throw new NoShardAvailableException($responseBody, $statusCode);
        } else {
            throw new ServerErrorResponseException($responseBody, $statusCode);
        }


    }


    /**
     * @param $method
     * @param $uri
     * @param $response
     */
    private function processCurlError($method, $uri, $response)
    {
        $error = 'Curl error: ' . $response['error'];
        $this->log->error($error);
        $this->throwCurlException($response['errorNumber'], $response['error']);
    }


    /**
     * @param $method
     * @param $uri
     * @param $request
     * @param $response
     */
    private function logErrorDueToFailure($method, $uri, $request, $response)
    {
        $this->logRequestFail(
            $method,
            $uri,
            $request,
            $response['requestInfo']['http_code'],
            $response['responseText'],
            $response['error'],
            $response
        );
    }



    /**
     * @param array $connectionParams
     * @return array
     */
    private function transformAuth($connectionParams)
    {
        if (isset($connectionParams['auth']) !== true) {
            return $connectionParams;
        }

        $username = $connectionParams['auth'][0];
        $password = $connectionParams['auth'][1];

        switch ($connectionParams['auth'][2]) {
            case 'Basic':
                $connectionParams['curlOpts'][CURLOPT_HTTPAUTH] = CURLAUTH_BASIC;
                break;

            case 'Digest':
                $connectionParams['curlOpts'][CURLOPT_HTTPAUTH] = CURLAUTH_DIGEST;
                break;

            case 'NTLM':
                $connectionParams['curlOpts'][CURLOPT_HTTPAUTH] = CURLAUTH_NTLM;
                break;

            case 'Any':
                $connectionParams[CURLOPT_HTTPAUTH] = CURLAUTH_ANY;
                break;
        }


        $connectionParams['curlOpts'][CURLOPT_USERPWD] = "$username:$password";

        unset($connectionParams['auth']);
        return $connectionParams;

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

    private function generateCurlOpts($connectionParams)
    {
        $opts = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT_MS     => 1000,
            CURLOPT_CONNECTTIMEOUT_MS => 1000,
            CURLOPT_HEADER         => false,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_TCP_NODELAY    => false
        );

        if (isset($this->headers) && count($this->headers) > 0) {
            $opts[CURLOPT_HTTPHEADER] = $this->headers;
        }

        if (isset($connectionParams['timeout']) === true) {
            $opts[CURLOPT_TIMEOUT_MS] = $connectionParams['timeout'];
            $opts[CURLOPT_CONNECTTIMEOUT_MS] = $connectionParams['timeout'];
        }

        if (isset($connectionParams['curlOpts'])) {
            //MUST use union operator, array_merge rekeys numeric
            $opts = $connectionParams['curlOpts'] +  $opts;
        }

        return $opts;
    }

    private function reconcileOptions($options)
    {
        $opts = array();
        if (isset($options['timeout']) === true) {
            $opts[CURLOPT_TIMEOUT_MS] = $options['timeout'];
            $opts[CURLOPT_CONNECTTIMEOUT_MS] = $options['timeout'];
        }

        return $opts;
    }

}