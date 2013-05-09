<?php
/**
 * User: zach
 * Date: 5/9/13
 * Time: 5:13 PM
 */

namespace Elasticsearch\Namespaces;

/**
 * Class IndicesNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\IndicesNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class IndicesNamespace extends AbstractNamespace
{
    /**
     * Create a new Elasticsearch index
     *
     * @param string     $index  Name for new index
     * @param null|array $body   Optional body parameters (mapping, setting, etc)
     * @param null|array $params Optional parameters
     *
     * @return void
     */
    public function createIndex($index, $body=null, $params=null)
    {

    }//end createIndex()
}