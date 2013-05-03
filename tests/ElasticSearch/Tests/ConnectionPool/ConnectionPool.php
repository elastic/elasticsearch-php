<?php

namespace ElasticSearch\Tests\ConnectionPool;
use ElasticSearch;

/**
 * Class ConnectionPool
 *
 * @category   Tests
 * @package    ElasticSearch
 * @subpackage Tests/ConnectionPool
 * @author     Zachary Tong <zachary.tong@elasticsearch.com>
 * @license    http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link       http://elasticsearch.org
 */
class ConnectionPool extends \PHPUnit_Framework_TestCase
{


    /**
     * Test null constructors
     *
     * @expectedException \ElasticSearch\Common\Exceptions\InvalidArgumentException
     * @expectedExceptionMessage `hosts` parameter must be set
     *
     * @covers ConnectionPool::__construct
     * @return void
     */
    public function testNullConstructor()
    {
        $connections    = null;
        $deadTimeout    = null;
        $selector       = null;
        $randomizeHosts = null;
        $connectionPool = new \ElasticSearch\ConnectionPool\ConnectionPool($connections, $deadTimeout, $selector, $randomizeHosts);

    }//end testNullConstructor()



}//end class