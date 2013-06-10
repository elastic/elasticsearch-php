<?php
/**
 * User: zach
 * Date: 6/10/13
 * Time: 2:53 PM
 */

namespace Elasticsearch\Tests\Endpoints\Indices\Template\Template;

use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Endpoints\Indices\Template\Delete;
use Mockery as m;

/**
 * Class DeleteTest
 * @package Elasticsearch\Tests\Endpoints\Indices\Template\Delete
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class DeleteTest extends \PHPUnit_Framework_TestCase
{
    public function tearDown() {
        m::close();
    }

    /**
     * @expectedException RuntimeException
     */
    public function testNoName()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport');

        $index = new Delete($mockTransport);
        $index->performRequest();

    }

    public function testValidDelete()
    {

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()
                         ->with(
                                 'DELETE',
                                 '/_template/testName',
                                 array(),
                                 null
                             )
                         ->getMock();

        $action = new Delete($mockTransport);
        $action->setIndex('testIndex')->setName('testName')
        ->performRequest();

    }


}