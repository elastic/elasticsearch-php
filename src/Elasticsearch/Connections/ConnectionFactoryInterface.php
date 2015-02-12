<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tongz
 * Date: 2/12/15
 * Time: 3:56 PM
 * To change this template use File | Settings | File Templates.
 */

namespace Elasticsearch\Connections;


use Elasticsearch\Serializers\SerializerInterface;
use Psr\Log\LoggerInterface;

interface ConnectionFactoryInterface {

    /**
     * @param $handler
     * @param array $connectionParams
     * @param SerializerInterface $serializer
     * @param LoggerInterface $logger
     * @param LoggerInterface $tracer
     */
    public function __construct($handler, array $connectionParams,
                                SerializerInterface $serializer, LoggerInterface $logger, LoggerInterface $tracer);

    /**
     * @param $hostDetails
     *
     * @return Connection
     */
    public function create($hostDetails);

}