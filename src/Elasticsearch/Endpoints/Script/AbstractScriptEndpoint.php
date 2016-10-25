<?php

namespace Elasticsearch\Endpoints\Script;

use Elasticsearch\Endpoints\AbstractEndpoint;

/**
 * Class AbstractScriptEndpoint
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Script
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractScriptEndpoint extends AbstractEndpoint
{
    /** @var  String */
    protected $lang;

    /**
     * @param $lang
     *
     * @return $this
     */
    public function setLang($lang)
    {
        if (isset($lang) !== true) {
            return $this;
        }

        $this->lang = urlencode($lang);

        return $this;
    }

}