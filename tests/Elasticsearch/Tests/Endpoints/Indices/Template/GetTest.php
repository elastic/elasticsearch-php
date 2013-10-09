<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 3:00 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Template;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Template\Get;
use Mockery as m;

/**
 * Class GetTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Template
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class GetTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }


    public function testValidGetNoName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
            ->shouldReceive('performRequest')->once()
            ->with(
                'GET',
                '/_template/',
                array(),
                null
            )
            ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')
            ->performRequest();

    }

    public function testValidGet()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'GET',
                                 '/_template/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Get($mockTransport);
        $action->setIndex('testIndex')->setName('testName')
        ->performRequest();

    }


}