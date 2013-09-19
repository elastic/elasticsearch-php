<?php
/**
 * User: zach
 * Date: 5/1/13
 * Time: 9:59 PM
 */

namespace Elasticsearch\Connections;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Common\Exceptions\ServerErrorResponseException;
use Elasticsearch\Common\Exceptions\TransportException;

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


    /**
     * Constructor
     *
     * @param string          $host             Host string
     * @param int             $port             Host port
     * @param array           $connectionParams Array of connection parameters
     * @param \Monolog\Logger $log              Monolog logger object
     * @param \Monolog\Logger $trace            Monolog logger object (for curl traces)
     *
     * @throws \Elasticsearch\Common\Exceptions\RuntimeException
     * @throws \Elasticsearch\Common\Exceptions\InvalidArgumentException
     * @return CurlMultiConnection
     */
    public function __construct($host, $port, $connectionParams, $log, $trace)
    {
        if (function_exists('curl_version') !== true) {
            $log->addCritical('Curl library/extension is required for CurlMultiConnection.');
            throw new RuntimeException('Curl library/extension is required for CurlMultiConnection.');
        }

        if (isset($connectionParams['curlMultiHandle']) !== true) {
            $log->addCritical('curlMultiHandle must be set in connectionParams');
            throw new InvalidArgumentException('curlMultiHandle must be set in connectionParams');
        }

        if (isset($port) !== true) {
            $port = 9200;
        }
        $this->multiHandle = $connectionParams['curlMultiHandle'];
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
    public function performRequest($method, $uri, $params = null, $body = null, $options = array())
    {
        $uri = $this->host . $uri;

        if (isset($params) === true) {
            $uri .= '?' . http_build_query($params);
        }

        $curlHandle = curl_init();

        $opts = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 3,
            CURLOPT_CONNECTTIMEOUT => 3,
            CURLOPT_URL            => $uri,
            CURLOPT_CUSTOMREQUEST  => $method,
        );

        if (isset($body) === true) {
            $opts[CURLOPT_POST]       = true;
            $opts[CURLOPT_POSTFIELDS] = $body;
        }

        // Custom Curl options?  Merge them.
        // TODO reconcile these with $options
        if (isset($this->connectionParams['curlOpts']) === true) {
            $opts = array_merge($opts, $this->connectionParams['curlOpts']);
        }

        $this->log->addDebug("Curl Options:", $opts);

        curl_setopt_array($curlHandle, $opts);
        curl_multi_add_handle($this->multiHandle, $curlHandle);

        $response = array();


        do {

            do {
                $execrun = curl_multi_exec($this->multiHandle, $running);
            } while ($execrun == CURLM_CALL_MULTI_PERFORM && $running === 1);

            if ($execrun !== CURLM_OK) {
                $this->log->addCritical('Unexpected Curl error: ' . $execrun);
                throw new TransportException('Unexpected Curl error: ' . $execrun);
            }

            /*
                Curl_multi_select not strictly nescessary, since we are only
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

        // If there was an error response, something like a time-out or
        // refused connection error occurred.
        if ($response['error'] !== '') {
            $this->log->addError('Curl error: ' . $response['error']);
            throw new TransportException('Curl error: ' . $response['error']);
        }

        // Log all 4xx-5xx errors.
        if ($response['requestInfo']['http_code'] >= 400) {
            $this->logRequestFail(
                $method,
                $uri,
                $response['requestInfo']['total_time'],
                $response['requestInfo']['http_code'],
                $response['responseText'],
                $response['error']
            );

            // Throw exceptions on 5xx (server) errors.
            if ($response['requestInfo']['http_code'] >= 500) {
                $exceptionText = $response['requestInfo']['http_code'] . ' Server Exception: ' . $response['responseText'];
                $this->log->addError($exceptionText);
                throw new ServerErrorResponseException($exceptionText);
            }
        }

        $this->logRequestSuccess(
            $method,
            $uri,
            $body,
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

}