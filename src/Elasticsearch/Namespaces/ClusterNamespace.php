<?php
/**
 * User: zach
 * Date: 5/9/13
 * Time: 5:13 PM
 */

namespace Elasticsearch\Namespaces;

/**
 * Class ClusterNamespace
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Namespaces\ClusterNamespace
 * @author   Zachary Tong <zachary.tong@elasticsearch.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elasticsearch.org
 */
class ClusterNamespace extends AbstractNamespace
{
    /**
     * Get cluster state
     *
     * @param null|array $params Optional parameters
     *
     * @return void
     */
    public function state($params = null)
    {

    }
}