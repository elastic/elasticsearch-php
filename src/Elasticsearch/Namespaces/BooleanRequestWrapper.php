<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tongz
 * Date: 2/6/15
 * Time: 6:36 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Elasticsearch\Namespaces;


use Elasticsearch\Common\Exceptions\Missing404Exception;
use Elasticsearch\Common\Exceptions\RoutingMissingException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use GuzzleHttp\Ring\Future\FutureArrayInterface;

trait BooleanRequestWrapper {
    public static function performRequest(AbstractEndpoint $endpoint)
    {
        try {
            $response = $endpoint->performRequest();
            $response = $endpoint->resultOrFuture($response);
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