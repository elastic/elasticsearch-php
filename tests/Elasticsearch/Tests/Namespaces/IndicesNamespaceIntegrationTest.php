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
     * @return void
     */
    public function testIndexCreation()
    {
        $client = new Elasticsearch\Client();
        $params = array();
        $params['index'] = 'testintegrationindex'.microtime(true);
        $retValue = $client->indices()->create($params);

        $this->assertEquals(1, $retValue['ok']);
        $this->assertEquals(1, $retValue['acknowledged']);

        $deleteParams['index'] = $params['index'];
        $retValue = $client->indices()->delete();
        $this->assertEquals(1, $retValue['ok']);
        $this->assertEquals(1, $retValue['acknowledged']);


    }//end testIndexCreation()

}