<?php

/**
 * Elasticsearch PHP Client
 *
 * @link      https://github.com/elastic/elasticsearch-php
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   https://opensource.org/licenses/MIT MIT License
 *
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the MIT License.
 * See the LICENSE file in the project root for more information.
 */

declare(strict_types=1);

namespace Elastic\Elasticsearch\Traits;

use Elastic\Elasticsearch\Endpoints\AsyncSearch;
use Elastic\Elasticsearch\Endpoints\Autoscaling;
use Elastic\Elasticsearch\Endpoints\Cat;
use Elastic\Elasticsearch\Endpoints\Ccr;
use Elastic\Elasticsearch\Endpoints\Cluster;
use Elastic\Elasticsearch\Endpoints\DanglingIndices;
use Elastic\Elasticsearch\Endpoints\Enrich;
use Elastic\Elasticsearch\Endpoints\Eql;
use Elastic\Elasticsearch\Endpoints\Features;
use Elastic\Elasticsearch\Endpoints\Fleet;
use Elastic\Elasticsearch\Endpoints\Graph;
use Elastic\Elasticsearch\Endpoints\Ilm;
use Elastic\Elasticsearch\Endpoints\Indices;
use Elastic\Elasticsearch\Endpoints\Ingest;
use Elastic\Elasticsearch\Endpoints\License;
use Elastic\Elasticsearch\Endpoints\Logstash;
use Elastic\Elasticsearch\Endpoints\Migration;
use Elastic\Elasticsearch\Endpoints\Ml;
use Elastic\Elasticsearch\Endpoints\Monitoring;
use Elastic\Elasticsearch\Endpoints\Nodes;
use Elastic\Elasticsearch\Endpoints\Rollup;
use Elastic\Elasticsearch\Endpoints\SearchableSnapshots;
use Elastic\Elasticsearch\Endpoints\Security;
use Elastic\Elasticsearch\Endpoints\Shutdown;
use Elastic\Elasticsearch\Endpoints\Slm;
use Elastic\Elasticsearch\Endpoints\Snapshot;
use Elastic\Elasticsearch\Endpoints\Sql;
use Elastic\Elasticsearch\Endpoints\Ssl;
use Elastic\Elasticsearch\Endpoints\Tasks;
use Elastic\Elasticsearch\Endpoints\TextStructure;
use Elastic\Elasticsearch\Endpoints\Transform;
use Elastic\Elasticsearch\Endpoints\Watcher;
use Elastic\Elasticsearch\Endpoints\Xpack;

/**
 * @generated This file is generated, please do not edit
 */
trait NamespaceTrait
{
	/** The endpoint namespace storage */
	protected array $namespace;


	public function asyncSearch(): AsyncSearch
	{
		if (!isset($this->namespace['AsyncSearch'])) {
			$this->namespace['AsyncSearch'] = new AsyncSearch($this);
		}
		return $this->namespace['AsyncSearch'];
	}


	public function autoscaling(): Autoscaling
	{
		if (!isset($this->namespace['Autoscaling'])) {
			$this->namespace['Autoscaling'] = new Autoscaling($this);
		}
		return $this->namespace['Autoscaling'];
	}


	public function cat(): Cat
	{
		if (!isset($this->namespace['Cat'])) {
			$this->namespace['Cat'] = new Cat($this);
		}
		return $this->namespace['Cat'];
	}


	public function ccr(): Ccr
	{
		if (!isset($this->namespace['Ccr'])) {
			$this->namespace['Ccr'] = new Ccr($this);
		}
		return $this->namespace['Ccr'];
	}


	public function cluster(): Cluster
	{
		if (!isset($this->namespace['Cluster'])) {
			$this->namespace['Cluster'] = new Cluster($this);
		}
		return $this->namespace['Cluster'];
	}


	public function danglingIndices(): DanglingIndices
	{
		if (!isset($this->namespace['DanglingIndices'])) {
			$this->namespace['DanglingIndices'] = new DanglingIndices($this);
		}
		return $this->namespace['DanglingIndices'];
	}


	public function enrich(): Enrich
	{
		if (!isset($this->namespace['Enrich'])) {
			$this->namespace['Enrich'] = new Enrich($this);
		}
		return $this->namespace['Enrich'];
	}


	public function eql(): Eql
	{
		if (!isset($this->namespace['Eql'])) {
			$this->namespace['Eql'] = new Eql($this);
		}
		return $this->namespace['Eql'];
	}


	public function features(): Features
	{
		if (!isset($this->namespace['Features'])) {
			$this->namespace['Features'] = new Features($this);
		}
		return $this->namespace['Features'];
	}


	public function fleet(): Fleet
	{
		if (!isset($this->namespace['Fleet'])) {
			$this->namespace['Fleet'] = new Fleet($this);
		}
		return $this->namespace['Fleet'];
	}


	public function graph(): Graph
	{
		if (!isset($this->namespace['Graph'])) {
			$this->namespace['Graph'] = new Graph($this);
		}
		return $this->namespace['Graph'];
	}


	public function ilm(): Ilm
	{
		if (!isset($this->namespace['Ilm'])) {
			$this->namespace['Ilm'] = new Ilm($this);
		}
		return $this->namespace['Ilm'];
	}


	public function indices(): Indices
	{
		if (!isset($this->namespace['Indices'])) {
			$this->namespace['Indices'] = new Indices($this);
		}
		return $this->namespace['Indices'];
	}


	public function ingest(): Ingest
	{
		if (!isset($this->namespace['Ingest'])) {
			$this->namespace['Ingest'] = new Ingest($this);
		}
		return $this->namespace['Ingest'];
	}


	public function license(): License
	{
		if (!isset($this->namespace['License'])) {
			$this->namespace['License'] = new License($this);
		}
		return $this->namespace['License'];
	}


	public function logstash(): Logstash
	{
		if (!isset($this->namespace['Logstash'])) {
			$this->namespace['Logstash'] = new Logstash($this);
		}
		return $this->namespace['Logstash'];
	}


	public function migration(): Migration
	{
		if (!isset($this->namespace['Migration'])) {
			$this->namespace['Migration'] = new Migration($this);
		}
		return $this->namespace['Migration'];
	}


	public function ml(): Ml
	{
		if (!isset($this->namespace['Ml'])) {
			$this->namespace['Ml'] = new Ml($this);
		}
		return $this->namespace['Ml'];
	}


	public function monitoring(): Monitoring
	{
		if (!isset($this->namespace['Monitoring'])) {
			$this->namespace['Monitoring'] = new Monitoring($this);
		}
		return $this->namespace['Monitoring'];
	}


	public function nodes(): Nodes
	{
		if (!isset($this->namespace['Nodes'])) {
			$this->namespace['Nodes'] = new Nodes($this);
		}
		return $this->namespace['Nodes'];
	}


	public function rollup(): Rollup
	{
		if (!isset($this->namespace['Rollup'])) {
			$this->namespace['Rollup'] = new Rollup($this);
		}
		return $this->namespace['Rollup'];
	}


	public function searchableSnapshots(): SearchableSnapshots
	{
		if (!isset($this->namespace['SearchableSnapshots'])) {
			$this->namespace['SearchableSnapshots'] = new SearchableSnapshots($this);
		}
		return $this->namespace['SearchableSnapshots'];
	}


	public function security(): Security
	{
		if (!isset($this->namespace['Security'])) {
			$this->namespace['Security'] = new Security($this);
		}
		return $this->namespace['Security'];
	}


	public function shutdown(): Shutdown
	{
		if (!isset($this->namespace['Shutdown'])) {
			$this->namespace['Shutdown'] = new Shutdown($this);
		}
		return $this->namespace['Shutdown'];
	}


	public function slm(): Slm
	{
		if (!isset($this->namespace['Slm'])) {
			$this->namespace['Slm'] = new Slm($this);
		}
		return $this->namespace['Slm'];
	}


	public function snapshot(): Snapshot
	{
		if (!isset($this->namespace['Snapshot'])) {
			$this->namespace['Snapshot'] = new Snapshot($this);
		}
		return $this->namespace['Snapshot'];
	}


	public function sql(): Sql
	{
		if (!isset($this->namespace['Sql'])) {
			$this->namespace['Sql'] = new Sql($this);
		}
		return $this->namespace['Sql'];
	}


	public function ssl(): Ssl
	{
		if (!isset($this->namespace['Ssl'])) {
			$this->namespace['Ssl'] = new Ssl($this);
		}
		return $this->namespace['Ssl'];
	}


	public function tasks(): Tasks
	{
		if (!isset($this->namespace['Tasks'])) {
			$this->namespace['Tasks'] = new Tasks($this);
		}
		return $this->namespace['Tasks'];
	}


	public function textStructure(): TextStructure
	{
		if (!isset($this->namespace['TextStructure'])) {
			$this->namespace['TextStructure'] = new TextStructure($this);
		}
		return $this->namespace['TextStructure'];
	}


	public function transform(): Transform
	{
		if (!isset($this->namespace['Transform'])) {
			$this->namespace['Transform'] = new Transform($this);
		}
		return $this->namespace['Transform'];
	}


	public function watcher(): Watcher
	{
		if (!isset($this->namespace['Watcher'])) {
			$this->namespace['Watcher'] = new Watcher($this);
		}
		return $this->namespace['Watcher'];
	}


	public function xpack(): Xpack
	{
		if (!isset($this->namespace['Xpack'])) {
			$this->namespace['Xpack'] = new Xpack($this);
		}
		return $this->namespace['Xpack'];
	}
}
