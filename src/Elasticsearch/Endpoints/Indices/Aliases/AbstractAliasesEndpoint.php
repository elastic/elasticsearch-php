<?php
namespace Elasticsearch\Endpoints\Indices\Aliases;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractAliasesEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Indices\Aliases
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractAliasesEndpoint extends AbstractEndpoint
{

    /** @var null|string */
    protected $name = null;

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        if (isset($name) !== true) {
            return $this;
        }

        $this->name = urlencode($name);

        return $this;
    }
}