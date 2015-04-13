<?php

namespace Elasticsearch\Common;

use Psr\Log\AbstractLogger;
use Psr\Log\LoggerInterface;

/**
 * Class EmptyLogger
 * @package Elasticsearch\Common
 *
 * Logger that doesn't do anything.  Similar to Monolog's NullHandler,
 * but avoids the overhead of partially loading Monolog
 */
class EmptyLogger extends AbstractLogger implements LoggerInterface
{
    public function log($level, $message, array $context = array())
    {
        return;
    }
}
