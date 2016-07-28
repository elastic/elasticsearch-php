<?php

namespace Elasticsearch\Namespaces;

use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Transport;
use GuzzleHttp\Ring\Future\FutureArrayInterface;

/**
 * Trait AbstractNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
trait BooleanRequestWrapper
{
    /**
     * Perform Request
     *
     * @param  AbstractEndpoint $endpoint  The Endpoint to perform this request against
     * @param  Transport        $transport Transport to execute the request
     *
     * @throws Missing404Exception
     * @throws RoutingMissingException
     *
     * @return bool|array
     */
    public static function performRequest(AbstractEndpoint $endpoint, Transport $transport)
    {
        try {
            $response = $transport->performEndpoint($endpoint);

            if (!($response instanceof FutureArrayInterface)) {
                if ($response['status'] === 200) {
                    return true;
                } else {
                    return false;
                }
            } else {
                // async mode, can't easily resolve this...punt to user
                return $response;
            }
        } catch (Missing404Exception $exception) {
            return false;
        } catch (RoutingMissingException $exception) {
            return false;
        }
    }
}
