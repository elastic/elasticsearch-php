<?php
/**
 * User: zach
 * Date: 6/13/13
 * Time: 9:20 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Alias;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\Indices\Aliases\Get;
use Elasticsearch\Endpoints\Indices\Aliases\Update;
use Mockery as m;

/**
 * Class AliasesTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Cache
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */

class AliasesTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    public function testSetArrayBody()
    {
        $body = array('field' => 'value');
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'POST',
                                 '/_aliases',
                                 array(),
                                 $body
                             )
                         ->getMock();

        $action = new Update($mockTransport);
        $action->setBody($body)->performRequest();

    }

    public function testValidAliasesWithoutIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_aliases',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->performRequest();

    }

    public function testValidAliasesWithIndex()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/testIndex/_aliases',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->performRequest();

    }


}