<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Snapshot;

use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Common\Exceptions;

/**
 * Abstract cass for Snapshot operations
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Snapshot
 * @author   Emanuele Panzeri <thepanz@gmail.com>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
abstract class AbstractSnapshotEndpoint extends AbstractEndpoint
{
    /**
     * @var string
     */
    protected $baseUrl = '/_snapshot/{repository}/{snapshot}';

    /**
     * The repository name
     *
     * @var string
     */
    protected $repository;

    /**
     * The snapshot name
     *
     * @var string
     */
    protected $snapshot;

    /**
     * @param string $repository
     *
     * @return $this
     */
    public function setRepository($repository): self
    {
        $this->repository = $repository;

        return $this;
    }

    /**
     * @param string $snapshot
     *
     * @return $this
     */
    public function setSnapshot($snapshot): self
    {
        $this->snapshot = $snapshot;

        return $this;
    }

    /**
     * @throws Exceptions\RuntimeException
     * @return string
     */
    public function getURI()
    {
        $this->ensureRepositoryAndSnapshot();

        return $this->buildUrl();
    }

    /**
     * @throws Exceptions\RuntimeException
     */
    protected function ensureRepositoryAndSnapshot()
    {
        $this->ensureRepository();
        $this->ensureSnapshot();
    }

    protected function buildUrlParameters(): array
    {
        return [
            '{repository}' => $this->repository,
            '{snapshot}' => $this->snapshot,
        ];
    }

    protected function buildUrl(): string
    {
        $parameters = $this->buildUrlParameters();

        return str_replace(array_keys($parameters), $parameters, $this->baseUrl);
    }

    /**
     * @throws Exceptions\RuntimeException
     */
    protected function ensureRepository()
    {
        if (empty($this->repository)) {
            throw new Exceptions\RuntimeException(
                'The "repository" parameter is required'
            );
        }
    }

    /**
     * @throws Exceptions\RuntimeException
     */
    protected function ensureSnapshot()
    {
        if (empty($this->snapshot)) {
            throw new Exceptions\RuntimeException(
                'The "snapshot" parameter is required'
            );
        }
    }
}
