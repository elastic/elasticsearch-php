<?php

namespace Elasticsearch\Namespaces;

use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\MessageBuilder;
use Elasticsearch\Transport;
use Http\Promise\Promise;
use Psr\Http\Message\ResponseInterface;

/**
 * Trait AbstractNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces
 * @author   Zachary Tong <zach@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
trait BooleanRequestWrapper
{
    /**
     * Perform Request
     *
     * @param  AbstractEndpoint $endpoint The Endpoint to perform this request against
     *
     * @throws Missing404Exception
     * @throws RoutingMissingException
     */
    public static function performRequest(AbstractEndpoint $endpoint, Transport $transport)
    {
        try {
            $options = $endpoint->getOptions();
            $fetch = MessageBuilder::FETCH_PSR7_RESPONSE;

            if (isset($options['client']['future'])) {
                $fetch = MessageBuilder::FETCH_PROMISE;
            }

            $response = $transport->performRequest($endpoint, $fetch);

            if ($response instanceof Promise) {
                return $response->then(function (ResponseInterface $response) {
                    return $response->getStatusCode() === 200;
                });
            }

            return $response->getStatusCode() === 200;
        } catch (Missing404Exception $exception) {
            return false;
        } catch (RoutingMissingException $exception) {
            return false;
        }
    }
}
