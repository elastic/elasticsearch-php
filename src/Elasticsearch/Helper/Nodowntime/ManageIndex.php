<?php

namespace Elasticsearch\Helper\Nodowntime;


use Elasticsearch\Client;
use Elasticsearch\Common\Exceptions\BadMethodCallException;
use Elasticsearch\Common\Exceptions\RuntimeException;
use Elasticsearch\Helper\Nodowntime\Exceptions\IndexNotFoundException;

/**
 * Class ManageIndex : This class can help you to manage your index with the alias management.
 * According to this link https://www.elastic.co/guide/en/elasticsearch/guide/master/index-aliases.html, alias management allow to use with no downtime your index.
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Helper\Nodowntime
 * @author   Augustin Husson <husson.augustin@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class ManageIndex implements ManageIndexInterface
{
    /**
     * @var Client
     */
    protected $client;

    protected static $INDEX_NAME_CONVENTION_1 = '_v1';
    protected static $INDEX_NAME_CONVENTION_2 = '_v2';

    /**
     * You can pass an alias name or an index name here.
     *
     * @param string $index [REQUIRED]
     * @return bool
     */
    public function existsIndex($index)
    {
        $params = array(
            'index' => $index,
        );

        return $this->client->indices()->exists($params);
    }


    /**
     * @param string $alias [REQUIRED]
     * @return void
     * @throws BadMethodCallException
     */
    public function createIndex($alias)
    {
        $index = $alias . self::$INDEX_NAME_CONVENTION_1;

        if ($this->existsIndex($index)) {
            throw new BadMethodCallException('$index ' . $index . ' already exists. Cannot be created again');
        }

        $params = array(
            'index' => $index,
            'body' => array(
                'aliases' => array(
                    $alias => json_decode('{}')
                )),
        );

        $this->client->indices()->create($params);

    }

    /**
     * @param $index : index or alias can put here [REQUIRED]
     * @return void
     * @throws IndexNotFoundException
     */
    public function deleteIndex($index)
    {
        $params = array(
            'index' => $index
        );

        if (!$this->existsIndex($index)) {
            throw new IndexNotFoundException('$index ' . $index . 'not found');
        }

        $this->client->indices()->delete($params);
    }

    /**
     * @param string $alias_src [REQUIRED]
     * @param string $alias_dest [REQUIRED]
     * @return void
     * @throws RuntimeException
     * @throws IndexNotFoundException
     * @throws BadMethodCallException
     */
    public function copyIndex($alias_src, $alias_dest)
    {
        if (!$this->existsAlias($alias_src)) {
            throw new IndexNotFoundException('$index ' . $alias_src . 'not found');
        }

        if ($this->existsAlias($alias_dest)) {
            throw new BadMethodCallException('$index ' . $alias_dest . ' must not exist');
        }

        $index_src = $this->findIndexByAlias($alias_src);
        $index_dest = $alias_dest . self::$INDEX_NAME_CONVENTION_1;


        $this->copyMappingAndSetting($index_src, $index_dest);

        // currently, the reindex api doesn't work when there are no documents inside the index source
        //So if there are some documents to copy and if the reindex Api send an error, we throw a RuntimeException
        if (($this->countDocuments($index_src) !== 0) && !$this->copyDocuments($index_src, $index_dest)) {
            $this->deleteIndex($index_dest);
            throw new RuntimeException('reindex failed');
        }

        $this->putAlias($alias_dest, $index_dest);

    }

    /**
     * @param string $alias [REQUIRED]
     * @param bool $needToCreateIndexDest
     * @return void
     * @throws RuntimeException
     * @throws IndexNotFoundException
     */
    public function reindex($alias, $needToCreateIndexDest = true)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $index_src = $this->findIndexByAlias($alias);
        $index_dest = $this->getIndexDest($alias, $index_src);


        if ($needToCreateIndexDest) { // for example, if you have updated your settings/mappings, your index_dest is already created. So you don't need to create it again
            if ($this->existsIndex($index_dest)) {
                $this->deleteIndex($index_dest);
            }

            $this->copyMappingAndSetting($index_src, $index_dest);
        }

        // currently, the reindex api doesn't work when there are no documents inside the index source
        //So if there are some documents to copy and if the reindex Api send an error, we throw a RuntimeException
        if (($this->countDocuments($index_src) !== 0) && !$this->copyDocuments($index_src, $index_dest)) {
            $this->deleteIndex($index_dest);
            throw new RuntimeException('reindex failed');
        }

        $this->switchIndex($alias, $index_src, $index_dest);

        $this->deleteIndex($index_src);

    }

    /**
     * This method must call when you want to add something inside the settings. Because the reindexation is a long task,
     * you should do the difference between add and delete something inside the settings. In the add task,
     * you don't need to reindex , unlike the delete task
     *
     * @param string $alias [REQUIRED]
     * @param array $settings [REQUIRED]
     * @return void
     * @throws IndexNotFoundException
     */
    public function addSettings($alias, $settings)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $index_source = $this->findIndexByAlias($alias);

        $this->closeIndex($index_source);
        $params = array(
            'index' => $index_source,
            'body' => array(
                'settings' => $settings
            )
        );

        $this->client->indices()->putSettings($params);

        $this->openIndex($index_source);
    }

    /**
     * This méthod must call when you want to delete something inside the settings.
     *
     * @param string $alias [REQUIRED]
     * @param array $settings [REQUIRED]
     * @param bool $needReindexation : The process of reindexation can be so long, instead of calling reindex method inside this method, you may want to call it in an asynchronous process.
     * But if you pass this parameters to false, don't forget to reindex. If you don't do it, you will not see your modification of the settings
     * @return void
     * @throws RuntimeException
     * @throws IndexNotFoundException
     */
    public function updateSettings($alias, $settings, $needReindexation = true)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $index_src = $this->findIndexByAlias($alias);
        $index_dest = $this->getIndexDest($alias, $index_src);
        if ($this->existsIndex($index_dest)) {
            $this->deleteIndex($index_dest);
        }

        $mappings = $this->getMappingByIndex($index_src)[$index_src]['mappings'];

        $params = array(
            'index' => $index_dest,
        );

        if (is_array($settings) && count($settings) > 0) {
            $params['body'] = array(
                'settings' => $settings
            );
        }

        if (is_array($mappings) && count($mappings) > 0) {
            if ($params['body'] === null) {
                $params['body'] = array();
            }
            $params['body']['mappings'] = $mappings;
        }

        $this->client->indices()->create($params);

        if ($needReindexation) {
            $this->reindex($alias, false);
        }
    }

    /**
     * @param string $alias [REQUIRED]
     * @param array $mapping [REQUIRED]
     * @param bool $needReindexation : The process of reindexation can be so long, instead of calling reindex method inside this method, you may want to call it in an asynchronous process.
     * But if you pass this parameters to false, don't forget to reindex. If you don't do it, you will not see your modification of the mappings
     * @return void
     * @throws RuntimeException
     * @throws IndexNotFoundException
     */
    public function updateMapping($alias, $mapping, $needReindexation = true)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $index_src = $this->findIndexByAlias($alias);
        $index_dest = $this->getIndexDest($alias, $index_src);
        if ($this->existsIndex($index_dest)) {
            $this->deleteIndex($index_dest);
        }

        $settings = $this->getSettingsByIndex($index_src)[$index_src]['settings']['index'];

        $params = array(
            'index' => $index_dest,
        );

        if (count($mapping) > 0) {
            $params['body'] = array(
                'mappings' => $mapping,
            );
        }

        $this->copySettings($params, $settings);

        $this->client->indices()->create($params);

        if ($needReindexation) {
            $this->reindex($alias, false);
        }
    }

    /**
     * @return array
     */
    public function getListAlias()
    {
        $indices = $this->client->indices()->getAliases();
        $result = array();
        foreach ($indices as $index) {
            foreach ($index['aliases'] as $alias => $params_alias) {
                $result[] = $alias;
            }
        }
        return $result;
    }

    /**
     * @param string $alias [REQUIRED]
     * @return array
     * @throws IndexNotFoundException
     */
    public function getMapping($alias)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $index_source = $this->findIndexByAlias($alias);
        return $this->getMappingByIndex($index_source)[$index_source]['mappings'];
    }

    /**
     * @param string $alias [REQUIRED]
     * @return array
     * @throws IndexNotFoundException
     */
    public function getSetting($alias)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $index_source = $this->findIndexByAlias($alias);
        return $this->getSettingsByIndex($index_source)[$index_source]['settings']['index'];
    }

    /**
     * @param string $alias [REQUIRED]
     * @return array
     * @throws IndexNotFoundException
     */
    public function getAllDocuments($alias)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $params = array(
            'index' => $alias,
            'body' => array(
                'query' => array(
                    'match_all' => array()
                )
            )
        );

        return $this->client->search($params);
    }

    /**
     * @param string $alias [REQUIRED]
     * @param array $query [REQUIRED]
     * @param null|string $type
     * @param int $size
     * @param int $from
     * @return array
     * @throws IndexNotFoundException
     */
    public function searchDocuments($alias, $query, $type = null, $size = 10, $from = 0)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $params = array(
            'index' => $alias,
            'size' => $size,
            'from' => $from,
            'body' => array(
                'query' => $query
            ),
        );

        if ($type !== null) {
            $params['type'] = $type;
        }

        return $this->client->search($params);
    }

    /**
     * @param string $index [REQUIRED] If the alias is associated to an unique index, you can pass an alias rather than an index
     * @param $id [REQUIRED]
     * @param string $type [REQUIRED]
     * @param array $body [REQUIRED]
     * @return boolean
     * @throws IndexNotFoundException
     */
    public function updateDocument($index, $id, $type, $body)
    {
        if (!$this->existsIndex($index)) {
            throw new IndexNotFoundException('$index ' . $index . ' not found');
        }
        return $this->indexDocument($index, $id, $body, $type) > 1;
    }

    /**
     * @param string $index [REQUIRED] If the alias is associated to an unique index, you can pass an alias rather than an index
     * @param $id [REQUIRED]
     * @param string $type [REQUIRED]
     * @param array $body [REQUIRED]
     * @return boolean
     * @throws IndexNotFoundException
     */
    public function addDocument($index, $id, $type, $body)
    {
        if (!$this->existsIndex($index)) {
            throw new IndexNotFoundException('$index ' . $index . ' not found');
        }
        return $this->indexDocument($index, $id, $body, $type) === 1;
    }

    /**
     * To use this method you need to install the plugin delete-by-query
     * @see https://www.elastic.co/guide/en/elasticsearch/plugins/current/plugins-delete-by-query.html
     *
     * @param string $alias [REQUIRED]
     * @param null|string $type : if the type is null, this method will delete all documents from the index pointed by $alias
     * @return boolean
     * @throws IndexNotFoundException
     */
    public function deleteDocuments($alias, $type = null)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $params = array(
            'index' => $alias,
            'body' => array(
                'query' => array(
                    'match_all' => array()
                ),
            )
        );

        if ($type !== null) {
            $params['type'] = $type;
        }

        $response = $this->client->deleteByQuery($params);

        return ($response['_indices']['_all']['found'] > 0
            && $response['_indices']['_all']['found'] === $response['_indices']['_all']['deleted']
            && $response['_indices']['_all']['missing'] === 0
            && $response['_indices']['_all']['failed'] === 0);
    }

    /**
     * @param $alias [REQUIRED]
     * @param $id [REQUIRED]
     * @param string $type [REQUIRED]
     * @return boolean
     * @throws IndexNotFoundException
     */
    public function deleteDocument($alias, $id, $type)
    {
        if (!$this->existsAlias($alias)) {
            throw new IndexNotFoundException('$index ' . $alias . ' not found');
        }

        $params = array(
            'index' => $alias,
            'type' => $type,
            'id' => $id,
        );

        $response = $this->client->delete($params);
        return $response['found'] > 0;
    }

    /**
     * @param Client $client
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @param string $index
     * @param string|integer $id
     * @param array $body
     * @param string $type
     * @return mixed
     */
    protected function indexDocument($index, $id, $body, $type)
    {

        $params = array(
            'index' => $index,
            'type' => $type,
            'id' => $id,
            'body' => $body
        );

        $response = $this->client->index($params);

        return $response['_version'];
    }

    /**
     * @param string $index
     */
    protected function openIndex($index)
    {
        $params = array(
            'index' => $index
        );
        $this->client->indices()->open($params);
    }

    /**
     * @param string $index
     */
    protected function closeIndex($index)
    {
        $params = array(
            'index' => $index
        );
        $this->client->indices()->close($params);
    }

    /**
     * @param string $alias
     * @return string
     */
    protected function findIndexByAlias($alias)
    {
        $params = array(
            'name' => $alias
        );
        return array_keys($this->client->indices()->getAlias($params))[0];
    }

    /**
     * @param $index
     * @return int
     */
    protected function countDocuments($index)
    {
        $params = array(
            'index' => $index,
        );

        return $this->client->count($params)['count'];
    }

    /**
     * @param string $alias
     * @return bool
     */
    protected function existsAlias($alias)
    {
        $params = array(
            'name' => $alias
        );

        return $this->client->indices()->existsAlias($params);
    }

    /**
     * @param $index_source
     * @param $index_dest
     */
    protected function copyMappingAndSetting($index_source, $index_dest)
    {
        $params = array(
            'index' => $index_dest,
        );

        $mapping_source = $this->getMappingByIndex($index_source)[$index_source]['mappings'];

        $setting_source = $this->getSettingsByIndex($index_source)[$index_source]['settings']['index'];

        $this->copySettings($params, $setting_source);

        if (($mapping_source !== null) && (count($mapping_source) !== 0)) {
            $params['body'] = array(
                'mappings' => $mapping_source[$index_source]['mappings']
            );
        }


        $this->client->indices()->create($params);
    }

    protected function copySettings(&$params, $settings)
    {
        $number_of_shards = $settings['number_of_shards'];
        $number_of_replicas = $settings['number_of_replicas'];

        $analysis_source = $settings['analysis'];

        if ($number_of_shards !== null) {
            if ($params['body'] === null) {
                $params['body'] = array();
            }

            $params['body']['settings'] = array(
                'number_of_shards' => $number_of_shards
            );
        }

        if ($number_of_replicas !== null) {
            $this->createBody($params);

            if ($params['body']['settings'] === null) {
                $params['body']['settings'] = array();
            }

            $params['body']['settings']['number_of_replicas'] = $number_of_replicas;
        }

        if (($analysis_source !== null) && (count($analysis_source) !== 0)) {

            $this->createBody($params);

            if ($params['body']['settings'] === null) {
                $params['body']['settings'] = array();
            }

            $params['body']['settings']['analysis'] = $analysis_source;
        }
    }

    private function createBody(&$params)
    {
        if ($params['body'] === null) {
            $params['body'] = array();
        }
    }

    /**
     * @param string $index_src
     * @param string $index_dest
     * @return boolean
     */
    protected function copyDocuments($index_src, $index_dest)
    {
        $params = array(
            'body' => array(
                'source' => array(
                    'index' => $index_src
                ),
                'dest' => array(
                    'index' => $index_dest
                )
            )
        );

        $response = $this->client->reindex($params);

        return count($response['failures']) === 0;
    }

    /**
     * @param string $index
     * @return array
     */
    protected function getSettingsByIndex($index)
    {
        $params = array(
            'index' => $index
        );
        return $this->client->indices()->getSettings($params);
    }

    /**
     * @param string $index
     * @return array
     */
    protected function getMappingByIndex($index)
    {
        $params = array(
            'index' => $index
        );
        return $this->client->indices()->getMapping($params);
    }

    /**
     * @param string $alias
     * @param string $index_src
     * @return string
     */
    protected function getIndexDest($alias, $index_src)
    {
        if ($alias . self::$INDEX_NAME_CONVENTION_1 === $index_src) {
            return $alias . self::$INDEX_NAME_CONVENTION_2;
        } else {
            return $alias . self::$INDEX_NAME_CONVENTION_1;
        }
    }

    /**
     * @param string $alias
     * @param string $index_src
     * @param string $index_dest
     */
    protected function switchIndex($alias, $index_src, $index_dest)
    {

        $params = array(
            'body' => array(
                'actions' => array(
                    0 => array(
                        'remove' => array(
                            'index' => $index_src,
                            'alias' => $alias),
                    ),
                    1 => array(
                        'add' => array(
                            'index' => $index_dest,
                            'alias' => $alias),
                    )
                ),
            ),
        );

        $this->client->indices()->updateAliases($params);
    }

    /**
     * @param string $alias
     * @param string $index
     */
    protected function putAlias($alias, $index)
    {
        $params = array(
            'index' => $index,
            'name' => $alias
        );

        $this->client->indices()->putAlias($params);
    }
}