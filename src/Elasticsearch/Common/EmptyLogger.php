<?php
/**
 * User: zach
 * Date: 11/11/13
 * Time: 3:32 PM
 */

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