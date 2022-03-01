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

namespace Elastic\Elasticsearch\Endpoints;

use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Elasticsearch\Traits\EndpointTrait;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Ml extends AbstractEndpoint
{
	use EndpointTrait;

	/**
	 * Closes one or more anomaly detection jobs. A job can be opened and closed multiple times throughout its lifecycle.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-close-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job to close
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 *     force: boolean, // True if the job should be forcefully closed
	 *     timeout: time, // Controls the time to wait until a job has closed. Default to 30 minutes
	 *     body: array, //  The URL params optionally sent in the body
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function closeJob(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/_close";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-calendar.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to delete
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteCalendar(array $params = [])
	{
		$this->checkRequiredParameters(['calendar_id'], $params);
		$url = "/_ml/calendars/{$params['calendar_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes scheduled events from a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-calendar-event.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     event_id: string, // (REQUIRED) The ID of the event to remove from the calendar
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteCalendarEvent(array $params = [])
	{
		$this->checkRequiredParameters(['calendar_id','event_id'], $params);
		$url = "/_ml/calendars/{$params['calendar_id']}/events/{$params['event_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes anomaly detection jobs from a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-calendar-job.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     job_id: string, // (REQUIRED) The ID of the job to remove from the calendar
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteCalendarJob(array $params = [])
	{
		$this->checkRequiredParameters(['calendar_id','job_id'], $params);
		$url = "/_ml/calendars/{$params['calendar_id']}/jobs/{$params['job_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes an existing data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to delete
	 *     force: boolean, // True if the job should be forcefully deleted
	 *     timeout: time, // Controls the time to wait until a job is deleted. Defaults to 1 minute
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteDataFrameAnalytics(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = "/_ml/data_frame/analytics/{$params['id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes an existing datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to delete
	 *     force: boolean, // True if the datafeed should be forcefully deleted
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteDatafeed(array $params = [])
	{
		$this->checkRequiredParameters(['datafeed_id'], $params);
		$url = "/_ml/datafeeds/{$params['datafeed_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes expired and unused machine learning data.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-expired-data.html
	 *
	 * @param array{
	 *     job_id: string, //  The ID of the job(s) to perform expired data hygiene for
	 *     requests_per_second: number, // The desired requests per second for the deletion processes.
	 *     timeout: time, // How long can the underlying delete processes run until they are canceled
	 *     body: array, //  deleting expired data parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteExpiredData(array $params = [])
	{
		if (isset($params['job_id'])) {
			$url = "/_ml/_delete_expired_data/{$params['job_id']}";
			$method = 'DELETE';
		} else {
			$url = "/_ml/_delete_expired_data";
			$method = 'DELETE';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes a filter.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-filter.html
	 *
	 * @param array{
	 *     filter_id: string, // (REQUIRED) The ID of the filter to delete
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteFilter(array $params = [])
	{
		$this->checkRequiredParameters(['filter_id'], $params);
		$url = "/_ml/filters/{$params['filter_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes forecasts from a machine learning job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-forecast.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job from which to delete forecasts
	 *     forecast_id: string, //  The ID of the forecast to delete, can be comma delimited list. Leaving blank implies `_all`
	 *     allow_no_forecasts: boolean, // Whether to ignore if `_all` matches no forecasts
	 *     timeout: time, // Controls the time to wait until the forecast(s) are deleted. Default to 30 seconds
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteForecast(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['forecast_id'])) {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/_forecast/{$params['forecast_id']}";
			$method = 'DELETE';
		} else {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/_forecast";
			$method = 'DELETE';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes an existing anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to delete
	 *     force: boolean, // True if the job should be forcefully deleted
	 *     wait_for_completion: boolean, // Should this request wait until the operation has completed before returning
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteJob(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes an existing model snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot to delete
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteModelSnapshot(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/model_snapshots/{$params['snapshot_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes an existing trained inference model that is currently not referenced by an ingest pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-trained-models.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained model to delete
	 *     timeout: time, // Controls the amount of time to wait for the model to be deleted.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteTrainedModel(array $params = [])
	{
		$this->checkRequiredParameters(['model_id'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Deletes a model alias that refers to the trained model
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-trained-models-aliases.html
	 *
	 * @param array{
	 *     model_alias: string, // (REQUIRED) The trained model alias to delete
	 *     model_id: string, // (REQUIRED) The trained model where the model alias is assigned
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function deleteTrainedModelAlias(array $params = [])
	{
		$this->checkRequiredParameters(['model_alias','model_id'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}/model_aliases/{$params['model_alias']}";
		$method = 'DELETE';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Estimates the model memory
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-apis.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The analysis config, plus cardinality estimates for fields it references
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function estimateModelMemory(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_ml/anomaly_detectors/_estimate_model_memory";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Evaluates the data frame analytics for an annotated index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/evaluate-dfanalytics.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The evaluation definition
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function evaluateDataFrame(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_ml/data_frame/_evaluate";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Explains a data frame analytics config.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/explain-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, //  The ID of the data frame analytics to explain
	 *     body: array, //  The data frame analytics config to explain
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function explainDataFrameAnalytics(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_ml/data_frame/analytics/{$params['id']}/_explain";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/data_frame/analytics/_explain";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Forces any buffered data to be processed by the job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-flush-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job to flush
	 *     calc_interim: boolean, // Calculates interim results for the most recent bucket or all buckets within the latency period
	 *     start: string, // When used in conjunction with calc_interim, specifies the range of buckets on which to calculate interim results
	 *     end: string, // When used in conjunction with calc_interim, specifies the range of buckets on which to calculate interim results
	 *     advance_time: string, // Advances time to the given value generating results and updating the model for the advanced interval
	 *     skip_time: string, // Skips time to the given value without generating results or updating the model for the skipped interval
	 *     body: array, //  Flush parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function flushJob(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/_flush";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Predicts the future behavior of a time series by using its historical behavior.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-forecast.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to forecast for
	 *     duration: time, // The duration of the forecast
	 *     expires_in: time, // The time interval after which the forecast expires. Expired forecasts will be deleted at the first opportunity.
	 *     max_model_memory: string, // The max memory able to be used by the forecast. Default is 20mb.
	 *     body: array, //  Query parameters can be specified in the body
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function forecast(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/_forecast";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves anomaly detection job results for one or more buckets.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-bucket.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) ID of the job to get bucket results from
	 *     timestamp: string, //  The timestamp of the desired single bucket result
	 *     expand: boolean, // Include anomaly records
	 *     exclude_interim: boolean, // Exclude interim results
	 *     from: int, // skips a number of buckets
	 *     size: int, // specifies a max number of buckets to get
	 *     start: string, // Start time filter for buckets
	 *     end: string, // End time filter for buckets
	 *     anomaly_score: double, // Filter for the most anomalous buckets
	 *     sort: string, // Sort buckets by a particular field
	 *     desc: boolean, // Set the sort direction
	 *     body: array, //  Bucket selection details if not provided in URI
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getBuckets(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['timestamp'])) {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/results/buckets/{$params['timestamp']}";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/results/buckets";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information about the scheduled events in calendars.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-calendar-event.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar containing the events
	 *     job_id: string, // Get events for the job. When this option is used calendar_id must be '_all'
	 *     start: string, // Get events after this time
	 *     end: date, // Get events before this time
	 *     from: int, // Skips a number of events
	 *     size: int, // Specifies a max number of events to get
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getCalendarEvents(array $params = [])
	{
		$this->checkRequiredParameters(['calendar_id'], $params);
		$url = "/_ml/calendars/{$params['calendar_id']}/events";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves configuration information for calendars.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-calendar.html
	 *
	 * @param array{
	 *     calendar_id: string, //  The ID of the calendar to fetch
	 *     from: int, // skips a number of calendars
	 *     size: int, // specifies a max number of calendars to get
	 *     body: array, //  The from and size parameters optionally sent in the body
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getCalendars(array $params = [])
	{
		if (isset($params['calendar_id'])) {
			$url = "/_ml/calendars/{$params['calendar_id']}";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/calendars";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves anomaly detection job results for one or more categories.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-category.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job
	 *     category_id: long, //  The identifier of the category definition of interest
	 *     from: int, // skips a number of categories
	 *     size: int, // specifies a max number of categories to get
	 *     partition_field_value: string, // Specifies the partition to retrieve categories for. This is optional, and should never be used for jobs where per-partition categorization is disabled.
	 *     body: array, //  Category selection details if not provided in URI
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getCategories(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['category_id'])) {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/results/categories/{$params['category_id']}";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/results/categories/";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves configuration information for data frame analytics jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, //  The ID of the data frame analytics to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no data frame analytics. (This includes `_all` string or when no data frame analytics have been specified)
	 *     from: int, // skips a number of analytics
	 *     size: int, // specifies a max number of analytics to get
	 *     exclude_generated: boolean, // Omits fields that are illegal to set on data frame analytics PUT
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getDataFrameAnalytics(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_ml/data_frame/analytics/{$params['id']}";
			$method = 'GET';
		} else {
			$url = "/_ml/data_frame/analytics";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves usage information for data frame analytics jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-dfanalytics-stats.html
	 *
	 * @param array{
	 *     id: string, //  The ID of the data frame analytics stats to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no data frame analytics. (This includes `_all` string or when no data frame analytics have been specified)
	 *     from: int, // skips a number of analytics
	 *     size: int, // specifies a max number of analytics to get
	 *     verbose: boolean, // whether the stats response should be verbose
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getDataFrameAnalyticsStats(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_ml/data_frame/analytics/{$params['id']}/_stats";
			$method = 'GET';
		} else {
			$url = "/_ml/data_frame/analytics/_stats";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves usage information for datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed-stats.html
	 *
	 * @param array{
	 *     datafeed_id: string, //  The ID of the datafeeds stats to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getDatafeedStats(array $params = [])
	{
		if (isset($params['datafeed_id'])) {
			$url = "/_ml/datafeeds/{$params['datafeed_id']}/_stats";
			$method = 'GET';
		} else {
			$url = "/_ml/datafeeds/_stats";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves configuration information for datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, //  The ID of the datafeeds to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     exclude_generated: boolean, // Omits fields that are illegal to set on datafeed PUT
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getDatafeeds(array $params = [])
	{
		if (isset($params['datafeed_id'])) {
			$url = "/_ml/datafeeds/{$params['datafeed_id']}";
			$method = 'GET';
		} else {
			$url = "/_ml/datafeeds";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves filters.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-filter.html
	 *
	 * @param array{
	 *     filter_id: string, //  The ID of the filter to fetch
	 *     from: int, // skips a number of filters
	 *     size: int, // specifies a max number of filters to get
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getFilters(array $params = [])
	{
		if (isset($params['filter_id'])) {
			$url = "/_ml/filters/{$params['filter_id']}";
			$method = 'GET';
		} else {
			$url = "/_ml/filters";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves anomaly detection job results for one or more influencers.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-influencer.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) Identifier for the anomaly detection job
	 *     exclude_interim: boolean, // Exclude interim results
	 *     from: int, // skips a number of influencers
	 *     size: int, // specifies a max number of influencers to get
	 *     start: string, // start timestamp for the requested influencers
	 *     end: string, // end timestamp for the requested influencers
	 *     influencer_score: double, // influencer score threshold for the requested influencers
	 *     sort: string, // sort field for the requested influencers
	 *     desc: boolean, // whether the results should be sorted in decending order
	 *     body: array, //  Influencer selection criteria
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getInfluencers(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/results/influencers";
		$method = empty($params['body']) ? 'GET' : 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves usage information for anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job-stats.html
	 *
	 * @param array{
	 *     job_id: string, //  The ID of the jobs stats to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getJobStats(array $params = [])
	{
		if (isset($params['job_id'])) {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/_stats";
			$method = 'GET';
		} else {
			$url = "/_ml/anomaly_detectors/_stats";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves configuration information for anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job.html
	 *
	 * @param array{
	 *     job_id: string, //  The ID of the jobs to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 *     exclude_generated: boolean, // Omits fields that are illegal to set on job PUT
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getJobs(array $params = [])
	{
		if (isset($params['job_id'])) {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}";
			$method = 'GET';
		} else {
			$url = "/_ml/anomaly_detectors";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Gets stats for anomaly detection job model snapshot upgrades that are in progress.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job-model-snapshot-upgrade-stats.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job. May be a wildcard, comma separated list or `_all`.
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot. May be a wildcard, comma separated list or `_all`.
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no jobs or no snapshots. (This includes the `_all` string.)
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getModelSnapshotUpgradeStats(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/model_snapshots/{$params['snapshot_id']}/_upgrade/_stats";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves information about model snapshots.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, //  The ID of the snapshot to fetch
	 *     from: int, // Skips a number of documents
	 *     size: int, // The default number of documents returned in queries as a string.
	 *     start: date, // The filter 'start' query parameter
	 *     end: date, // The filter 'end' query parameter
	 *     sort: string, // Name of the field to sort on
	 *     desc: boolean, // True if the results should be sorted in descending order
	 *     body: array, //  Model snapshot selection criteria
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getModelSnapshots(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['snapshot_id'])) {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/model_snapshots/{$params['snapshot_id']}";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/anomaly_detectors/{$params['job_id']}/model_snapshots";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves overall bucket results that summarize the bucket results of multiple anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-overall-buckets.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The job IDs for which to calculate overall bucket results
	 *     top_n: int, // The number of top job bucket scores to be used in the overall_score calculation
	 *     bucket_span: string, // The span of the overall buckets. Defaults to the longest job bucket_span
	 *     overall_score: double, // Returns overall buckets with overall scores higher than this value
	 *     exclude_interim: boolean, // If true overall buckets that include interim buckets will be excluded
	 *     start: string, // Returns overall buckets with timestamps after this time
	 *     end: string, // Returns overall buckets with timestamps earlier than this time
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 *     body: array, //  Overall bucket selection details if not provided in URI
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getOverallBuckets(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/results/overall_buckets";
		$method = empty($params['body']) ? 'GET' : 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves anomaly records for an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-record.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job
	 *     exclude_interim: boolean, // Exclude interim results
	 *     from: int, // skips a number of records
	 *     size: int, // specifies a max number of records to get
	 *     start: string, // Start time filter for records
	 *     end: string, // End time filter for records
	 *     record_score: double, // Returns records with anomaly scores greater or equal than this value
	 *     sort: string, // Sort records by a particular field
	 *     desc: boolean, // Set the sort direction
	 *     body: array, //  Record selection criteria
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getRecords(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/results/records";
		$method = empty($params['body']) ? 'GET' : 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves configuration information for a trained inference model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-trained-models.html
	 *
	 * @param array{
	 *     model_id: string, //  The ID of the trained models to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified)
	 *     include: string, // A comma-separate list of fields to optionally include. Valid options are 'definition' and 'total_feature_importance'. Default is none.
	 *     include_model_definition: boolean, // Should the full model definition be included in the results. These definitions can be large. So be cautious when including them. Defaults to false.
	 *     decompress_definition: boolean, // Should the model definition be decompressed into valid JSON or returned in a custom compressed format. Defaults to true.
	 *     from: int, // skips a number of trained models
	 *     size: int, // specifies a max number of trained models to get
	 *     tags: list, // A comma-separated list of tags that the model must have.
	 *     exclude_generated: boolean, // Omits fields that are illegal to set on model PUT
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getTrainedModels(array $params = [])
	{
		if (isset($params['model_id'])) {
			$url = "/_ml/trained_models/{$params['model_id']}";
			$method = 'GET';
		} else {
			$url = "/_ml/trained_models";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Retrieves usage information for trained inference models.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-trained-models-stats.html
	 *
	 * @param array{
	 *     model_id: string, //  The ID of the trained models stats to fetch
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified)
	 *     from: int, // skips a number of trained models
	 *     size: int, // specifies a max number of trained models to get
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function getTrainedModelsStats(array $params = [])
	{
		if (isset($params['model_id'])) {
			$url = "/_ml/trained_models/{$params['model_id']}/_stats";
			$method = 'GET';
		} else {
			$url = "/_ml/trained_models/_stats";
			$method = 'GET';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Evaluate a trained model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/infer-trained-model-deployment.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     timeout: time, // Controls the amount of time to wait for inference results.
	 *     body: array, // (REQUIRED) The docs to apply inference on
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function inferTrainedModelDeployment(array $params = [])
	{
		$this->checkRequiredParameters(['model_id','body'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}/deployment/_infer";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Returns defaults and limits used by machine learning.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-ml-info.html
	 */
	public function info(array $params = [])
	{
		$url = "/_ml/info";
		$method = 'GET';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Opens one or more anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-open-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to open
	 *     body: array, //  Query parameters can be specified in the body
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function openJob(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/_open";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Posts scheduled events in a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-post-calendar-event.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     body: array, // (REQUIRED) A list of events
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function postCalendarEvents(array $params = [])
	{
		$this->checkRequiredParameters(['calendar_id','body'], $params);
		$url = "/_ml/calendars/{$params['calendar_id']}/events";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Sends data to an anomaly detection job for analysis.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-post-data.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job receiving the data
	 *     reset_start: string, // Optional parameter to specify the start of the bucket resetting range
	 *     reset_end: string, // Optional parameter to specify the end of the bucket resetting range
	 *     body: array, // (REQUIRED) The data to process
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function postData(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','body'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/_data";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Previews that will be analyzed given a data frame analytics config.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/preview-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, //  The ID of the data frame analytics to preview
	 *     body: array, //  The data frame analytics config to preview
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function previewDataFrameAnalytics(array $params = [])
	{
		if (isset($params['id'])) {
			$url = "/_ml/data_frame/analytics/{$params['id']}/_preview";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/data_frame/analytics/_preview";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Previews a datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-preview-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, //  The ID of the datafeed to preview
	 *     body: array, //  The datafeed config and job config with which to execute the preview
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function previewDatafeed(array $params = [])
	{
		if (isset($params['datafeed_id'])) {
			$url = "/_ml/datafeeds/{$params['datafeed_id']}/_preview";
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = "/_ml/datafeeds/_preview";
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Instantiates a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-calendar.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to create
	 *     body: array, //  The calendar details
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putCalendar(array $params = [])
	{
		$this->checkRequiredParameters(['calendar_id'], $params);
		$url = "/_ml/calendars/{$params['calendar_id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Adds an anomaly detection job to a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-calendar-job.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     job_id: string, // (REQUIRED) The ID of the job to add to the calendar
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putCalendarJob(array $params = [])
	{
		$this->checkRequiredParameters(['calendar_id','job_id'], $params);
		$url = "/_ml/calendars/{$params['calendar_id']}/jobs/{$params['job_id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Instantiates a data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to create
	 *     body: array, // (REQUIRED) The data frame analytics configuration
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putDataFrameAnalytics(array $params = [])
	{
		$this->checkRequiredParameters(['id','body'], $params);
		$url = "/_ml/data_frame/analytics/{$params['id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Instantiates a datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to create
	 *     ignore_unavailable: boolean, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices: boolean, // Ignore if the source indices expressions resolves to no concrete indices (default: true)
	 *     ignore_throttled: boolean, // Ignore indices that are marked as throttled (default: true)
	 *     expand_wildcards: enum, // Whether source index expressions should get expanded to open or closed indices (default: open)
	 *     body: array, // (REQUIRED) The datafeed config
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putDatafeed(array $params = [])
	{
		$this->checkRequiredParameters(['datafeed_id','body'], $params);
		$url = "/_ml/datafeeds/{$params['datafeed_id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Instantiates a filter.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-filter.html
	 *
	 * @param array{
	 *     filter_id: string, // (REQUIRED) The ID of the filter to create
	 *     body: array, // (REQUIRED) The filter details
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putFilter(array $params = [])
	{
		$this->checkRequiredParameters(['filter_id','body'], $params);
		$url = "/_ml/filters/{$params['filter_id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Instantiates an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to create
	 *     ignore_unavailable: boolean, // Ignore unavailable indexes (default: false). Only set if datafeed_config is provided.
	 *     allow_no_indices: boolean, // Ignore if the source indices expressions resolves to no concrete indices (default: true). Only set if datafeed_config is provided.
	 *     ignore_throttled: boolean, // Ignore indices that are marked as throttled (default: true). Only set if datafeed_config is provided.
	 *     expand_wildcards: enum, // Whether source index expressions should get expanded to open or closed indices (default: open). Only set if datafeed_config is provided.
	 *     body: array, // (REQUIRED) The job
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putJob(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','body'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates an inference trained model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-models.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained models to store
	 *     defer_definition_decompression: boolean, // If set to `true` and a `compressed_definition` is provided, the request defers definition decompression and skips relevant validations.
	 *     body: array, // (REQUIRED) The trained model configuration
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModel(array $params = [])
	{
		$this->checkRequiredParameters(['model_id','body'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a new model alias (or reassigns an existing one) to refer to the trained model
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-models-aliases.html
	 *
	 * @param array{
	 *     model_alias: string, // (REQUIRED) The trained model alias to update
	 *     model_id: string, // (REQUIRED) The trained model where the model alias should be assigned
	 *     reassign: boolean, // If the model_alias already exists and points to a separate model_id, this parameter must be true. Defaults to false.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModelAlias(array $params = [])
	{
		$this->checkRequiredParameters(['model_alias','model_id'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}/model_aliases/{$params['model_alias']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates part of a trained model definition
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-model-definition-part.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained model for this definition part
	 *     part: int, // (REQUIRED) The part number
	 *     body: array, // (REQUIRED) The trained model definition part
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModelDefinitionPart(array $params = [])
	{
		$this->checkRequiredParameters(['model_id','part','body'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}/definition/{$params['part']}";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Creates a trained model vocabulary
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-model-vocabulary.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained model for this vocabulary
	 *     body: array, // (REQUIRED) The trained model vocabulary
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModelVocabulary(array $params = [])
	{
		$this->checkRequiredParameters(['model_id','body'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}/vocabulary";
		$method = 'PUT';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Resets an existing anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-reset-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to reset
	 *     wait_for_completion: boolean, // Should this request wait until the operation has completed before returning
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function resetJob(array $params = [])
	{
		$this->checkRequiredParameters(['job_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/_reset";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Reverts to a specific snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-revert-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot to revert to
	 *     delete_intervening_results: boolean, // Should we reset the results back to the time of the snapshot?
	 *     body: array, //  Reversion options
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function revertModelSnapshot(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/model_snapshots/{$params['snapshot_id']}/_revert";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Sets a cluster wide upgrade_mode setting that prepares machine learning indices for an upgrade.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-set-upgrade-mode.html
	 *
	 * @param array{
	 *     enabled: boolean, // Whether to enable upgrade_mode ML setting or not. Defaults to false.
	 *     timeout: time, // Controls the time to wait before action times out. Defaults to 30 seconds
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function setUpgradeMode(array $params = [])
	{
		$url = "/_ml/set_upgrade_mode";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Starts a data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/start-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to start
	 *     timeout: time, // Controls the time to wait until the task has started. Defaults to 20 seconds
	 *     body: array, //  The start data frame analytics parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function startDataFrameAnalytics(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = "/_ml/data_frame/analytics/{$params['id']}/_start";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Starts one or more datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-start-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to start
	 *     start: string, // The start time from where the datafeed should begin
	 *     end: string, // The end time when the datafeed should stop. When not set, the datafeed continues in real time
	 *     timeout: time, // Controls the time to wait until a datafeed has started. Default to 20 seconds
	 *     body: array, //  The start datafeed parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function startDatafeed(array $params = [])
	{
		$this->checkRequiredParameters(['datafeed_id'], $params);
		$url = "/_ml/datafeeds/{$params['datafeed_id']}/_start";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Start a trained model deployment.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/start-trained-model-deployment.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     timeout: time, // Controls the amount of time to wait for the model to deploy.
	 *     wait_for: string, // The allocation status for which to wait
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function startTrainedModelDeployment(array $params = [])
	{
		$this->checkRequiredParameters(['model_id'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}/deployment/_start";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Stops one or more data frame analytics jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/stop-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to stop
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no data frame analytics. (This includes `_all` string or when no data frame analytics have been specified)
	 *     force: boolean, // True if the data frame analytics should be forcefully stopped
	 *     timeout: time, // Controls the time to wait until the task has stopped. Defaults to 20 seconds
	 *     body: array, //  The stop data frame analytics parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function stopDataFrameAnalytics(array $params = [])
	{
		$this->checkRequiredParameters(['id'], $params);
		$url = "/_ml/data_frame/analytics/{$params['id']}/_stop";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Stops one or more datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-stop-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to stop
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     allow_no_datafeeds: boolean, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     force: boolean, // True if the datafeed should be forcefully stopped.
	 *     timeout: time, // Controls the time to wait until a datafeed has stopped. Default to 20 seconds
	 *     body: array, //  The URL params optionally sent in the body
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function stopDatafeed(array $params = [])
	{
		$this->checkRequiredParameters(['datafeed_id'], $params);
		$url = "/_ml/datafeeds/{$params['datafeed_id']}/_stop";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Stop a trained model deployment.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/stop-trained-model-deployment.html
	 * @internal This API is EXPERIMENTAL and may be changed or removed completely in a future release
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     allow_no_match: boolean, // Whether to ignore if a wildcard expression matches no deployments. (This includes `_all` string or when no deployments have been specified)
	 *     force: boolean, // True if the deployment should be forcefully stopped
	 *     body: array, //  The stop deployment parameters
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function stopTrainedModelDeployment(array $params = [])
	{
		$this->checkRequiredParameters(['model_id'], $params);
		$url = "/_ml/trained_models/{$params['model_id']}/deployment/_stop";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Updates certain properties of a data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to update
	 *     body: array, // (REQUIRED) The data frame analytics settings to update
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function updateDataFrameAnalytics(array $params = [])
	{
		$this->checkRequiredParameters(['id','body'], $params);
		$url = "/_ml/data_frame/analytics/{$params['id']}/_update";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Updates certain properties of a datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to update
	 *     ignore_unavailable: boolean, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices: boolean, // Ignore if the source indices expressions resolves to no concrete indices (default: true)
	 *     ignore_throttled: boolean, // Ignore indices that are marked as throttled (default: true)
	 *     expand_wildcards: enum, // Whether source index expressions should get expanded to open or closed indices (default: open)
	 *     body: array, // (REQUIRED) The datafeed update settings
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function updateDatafeed(array $params = [])
	{
		$this->checkRequiredParameters(['datafeed_id','body'], $params);
		$url = "/_ml/datafeeds/{$params['datafeed_id']}/_update";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Updates the description of a filter, adds items, or removes items.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-filter.html
	 *
	 * @param array{
	 *     filter_id: string, // (REQUIRED) The ID of the filter to update
	 *     body: array, // (REQUIRED) The filter update
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function updateFilter(array $params = [])
	{
		$this->checkRequiredParameters(['filter_id','body'], $params);
		$url = "/_ml/filters/{$params['filter_id']}/_update";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Updates certain properties of an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to create
	 *     body: array, // (REQUIRED) The job update settings
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function updateJob(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','body'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/_update";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Updates certain properties of a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot to update
	 *     body: array, // (REQUIRED) The model snapshot properties to update
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function updateModelSnapshot(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','snapshot_id','body'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/model_snapshots/{$params['snapshot_id']}/_update";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Upgrades a given job snapshot to the current major version.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-upgrade-job-model-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot
	 *     timeout: time, // How long should the API wait for the job to be opened and the old snapshot to be loaded.
	 *     wait_for_completion: boolean, // Should the request wait until the task is complete before responding to the caller. Default is false.
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function upgradeJobSnapshot(array $params = [])
	{
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = "/_ml/anomaly_detectors/{$params['job_id']}/model_snapshots/{$params['snapshot_id']}/_upgrade";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Validates an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/machine-learning/current/ml-jobs.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The job config
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function validate(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_ml/anomaly_detectors/_validate";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}


	/**
	 * Validates an anomaly detection detector.
	 *
	 * @see https://www.elastic.co/guide/en/machine-learning/current/ml-jobs.html
	 *
	 * @param array{
	 *     body: array, // (REQUIRED) The detector
	 * } $params
	 * @throws MissingParameterException if a required parameter is missing
	 * @return Elasticsearch|Promise
	 */
	public function validateDetector(array $params = [])
	{
		$this->checkRequiredParameters(['body'], $params);
		$url = "/_ml/anomaly_detectors/_validate/detector";
		$method = 'POST';

		return $this->client->sendRequest($this->createRequest($method, $url, $params['body'] ?? []));
	}
}
