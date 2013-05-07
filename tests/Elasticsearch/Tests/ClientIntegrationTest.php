<?php

namespace Elasticsearch\Tests;
use Elasticsearch;

/**
 * Class ClientIntegrationTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Tests
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ClientIntegrationTest extends \PHPUnit_Framework_TestCase
{


    public function testClient()
    {
        $client = new Elasticsearch\Client();
    }
}