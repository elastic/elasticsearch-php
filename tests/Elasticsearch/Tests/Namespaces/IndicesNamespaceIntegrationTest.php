<?php

namespace Elasticsearch\Tests\Namespaces;
use Elasticsearch;

/**
 * Class ClientIntegrationTest
 *
 * @category   Tests
 * @package    Elasticsearch
 * @subpackage Test\Namespaces\IndicesNamespaceIntegrationTest
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class IndicesNamespaceIntegrationTest extends \PHPUnit_Framework_TestCase
{


    /**
     * Create an index then delete it
     *
     * @covers \Elasticsearch\Namespaces\IndicesNamespace::createIndex
     *
     * @return void
     */
    public function testIndexCreation()
    {
        $client = new Elasticsearch\Client();
        $index  = 'testintegrationindex'.microtime(true);

        $retValue = $client->indices()->createIndex($index);
        $this->assertEquals(1, $retValue['ok']);
        $this->assertEquals(1, $retValue['acknowledged']);

        $retValue = $client->indices()->deleteIndex($index);
        $this->assertEquals(1, $retValue['ok']);
        $this->assertEquals(1, $retValue['acknowledged']);


    }//end testIndexCreation()

}