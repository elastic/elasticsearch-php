<?php
/**
 * User: zach
 * Date: 6/4/13
 * Time: 11:36 AM
 */

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Common\Exceptions\UnexpectedValueException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Mockery as m;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class AbstractEndpointTest
 * @package Elasticsearch\Tests\Endpoints
 * @author  Zachary Tong <zachary.tong@elasticsearch.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link    http://elasticsearch.org
 */
class AbstractEndpointTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown() {
        m::close();
    }

    public function testPerformRequest()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()->once()
                         ->with(
                                 'GET',
                                 '/testIndex/',
                                 array(),
                                 null
                             )
                         ->getMock();

        $stub = $this->getMockForAbstractClass('\Elasticsearch\Endpoints\AbstractEndpoint', array($mockTransport));

        $stub->expects($this->once())
            ->method('getURI')
            ->will($this->returnValue('/testIndex/'));

        $stub->expects($this->once())
            ->method('getMethod')
            ->will($this->returnValue('GET'));

        $stub->performRequest();

    }

    public function testSetOneParam()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $stub = $this->getMockForAbstractClass('\Elasticsearch\Endpoints\AbstractEndpoint', array($mockTransport));

        $paramWhiteList = array(
            'param1',
            'param2',
            'param3'
        );

        $stub->expects($this->once())
            ->method('getParamWhitelist')
            ->will($this->returnValue($paramWhiteList));


        $params = array('param1'=>'value');
        $stub->setParams($params);

    }

    public function testSetMultipleParam()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $stub = $this->getMockForAbstractClass('\Elasticsearch\Endpoints\AbstractEndpoint', array($mockTransport));

        $paramWhiteList = array(
            'param1',
            'param2',
            'param3'
        );

        $stub->expects($this->once())
        ->method('getParamWhitelist')
        ->will($this->returnValue($paramWhiteList));

        $params = array(
            'param1' => 'value',
            'param2' => 'value',
            'param3' => 'value'
        );
        $stub->setParams($params);

    }


    /**
     * @expectedException UnexpectedValueException
     */
    public function testSetInvalidParam()
    {
        $mockTransport = m::mock('\Elasticsearch\Transport');

        $stub = $this->getMockForAbstractClass('\Elasticsearch\Endpoints\AbstractEndpoint', array($mockTransport));

        $paramWhiteList = array(
            'param1',
            'param2',
            'param3'
        );

        $stub->expects($this->once())
        ->method('getParamWhitelist')
        ->will($this->returnValue($paramWhiteList));

        $params = array('param10' => 'value');
        $stub->setParams($params);

    }

    public function testSetSortParam()
    {
        $params = array(
            'sort' => array(
                'field' => 'value2',
                'field2' => array(
                    'field3' => 'value3'
                )
            ),
            'param2' => 'value',
            'param3' => 'value'
        );

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()->once()
                         ->with(
                                 'GET',
                                 '/testIndex/',
                                 $params,
                                 null
                             )
                         ->getMock();


        $stub = $this->getMockForAbstractClass('\Elasticsearch\Endpoints\AbstractEndpoint', array($mockTransport));

        $paramWhiteList = array(
            'sort',
            'param2',
            'param3'
        );

        $stub->expects($this->once())
             ->method('getParamWhitelist')
             ->will($this->returnValue($paramWhiteList));

        $stub->expects($this->once())
             ->method('getURI')
             ->will($this->returnValue('/testIndex/'));

        $stub->expects($this->once())
             ->method('getMethod')
             ->will($this->returnValue('GET'));

        /** @var AbstractEndpoint $stub */
        $stub->setParams($params);
        try {
            $stub->performRequest();
        } catch (Exception $e) {
            // Don't care about errors, just want to validate params
            // in mock Transport
        }
    }

    public function testSetSortParamWithImplodeList()
    {
        $params = array(
            'sort' => array(
                'field' => 'value2',
                'field2' => array(
                    'field3' => 'value3'
                )
            ),
            'param2' => array(
                'implode1',
                'implode2'
            ),
            'param3' => 'value'
        );

        $expected = array(
            'sort' => array(
                'field' => 'value2',
                'field2' => array(
                    'field3' => 'value3'
                )
            ),
            'param2' => 'implode1,implode2',
            'param3' => 'value'
        );

        $mockTransport = m::mock('\Elasticsearch\Transport')
                         ->shouldReceive('performRequest')->once()->once()
                         ->with(
                                 'GET',
                                 '/testIndex/',
                                 $expected,
                                 null
                             )
                         ->getMock();


        $stub = $this->getMockForAbstractClass('\Elasticsearch\Endpoints\AbstractEndpoint', array($mockTransport));

        $paramWhiteList = array(
            'sort',
            'param2',
            'param3'
        );

        $stub->expects($this->once())
        ->method('getParamWhitelist')
        ->will($this->returnValue($paramWhiteList));

        $stub->expects($this->once())
        ->method('getURI')
        ->will($this->returnValue('/testIndex/'));

        $stub->expects($this->once())
        ->method('getMethod')
        ->will($this->returnValue('GET'));

        /** @var AbstractEndpoint $stub */
        $stub->setParams($params);
        try {
            $stub->performRequest();
        } catch (Exception $e) {
            // Don't care about errors, just want to validate params
            // in mock Transport
        }
    }

}
