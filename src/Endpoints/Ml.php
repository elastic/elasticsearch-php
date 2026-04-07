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

use Elastic\Elasticsearch\Exception\ClientResponseException;
use Elastic\Elasticsearch\Exception\MissingParameterException;
use Elastic\Elasticsearch\Exception\ServerResponseException;
use Elastic\Elasticsearch\Response\Elasticsearch;
use Elastic\Transport\Exception\NoNodeAvailableException;
use Http\Promise\Promise;

/**
 * @generated This file is generated, please do not edit
 */
class Ml extends AbstractEndpoint
{
	/**
	 * Clear trained model deployment cache
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-clear-trained-model-deployment-cache
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function clearTrainedModelDeploymentCache(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/deployment/cache/_clear';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.clear_trained_model_deployment_cache');
		return $this->client->sendRequest($request);
	}


	/**
	 * Close anomaly detection jobs
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-close-job
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job to close
	 *     allow_no_match?: bool, // Specifies what to do when the request: contains wildcard expressions and there are no jobs that match; contains the  `_all` string or no identifiers and there are no matches; or contains wildcard expressions and there are only partial matches. By default, it returns an empty jobs array when there are no matches and the subset of results when there are partial matches. If `false`, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     force?: bool, // Use to close a failed job, or to forcefully close a job which has not responded to its initial close request; the request returns without performing the associated actions such as flushing buffers and persisting the model snapshots. If you want the job to be in a consistent state after the close job API returns, do not set to `true`. This parameter should be used only in situations where the job has already failed or where you are not interested in results the job might have recently produced or might produce in the future.
	 *     timeout?: int|string, // Controls the time to wait until a job has closed. (DEFAULT: 30m)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The URL params optionally sent in the body. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function closeJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_close';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['allow_no_match','force','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.close_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a calendar
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-calendar
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to delete
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteCalendar(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['calendar_id'], $params);
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id'], $request, 'ml.delete_calendar');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete events from a calendar
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-calendar-event
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     event_id: string, // (REQUIRED) The ID of the event to remove from the calendar
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteCalendarEvent(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['calendar_id','event_id'], $params);
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']) . '/events/' . $this->encode($params['event_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id', 'event_id'], $request, 'ml.delete_calendar_event');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete anomaly jobs from a calendar
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-calendar-job
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     job_id: string|array<string>, // (REQUIRED) An identifier for the anomaly detection jobs. It can be a job identifier, a group name, or a comma-separated list of jobs or groups.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteCalendarJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['calendar_id','job_id'], $params);
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']) . '/jobs/' . $this->encode($this->convertValue($params['job_id']));
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id', 'job_id'], $request, 'ml.delete_calendar_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a data frame analytics job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to delete
	 *     force?: bool, // If `true`, it deletes a job that is not stopped; this method is quicker than stopping and deleting the job.
	 *     timeout?: int|string, // The time to wait for the job to be deleted. (DEFAULT: 1m)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['force','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.delete_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a datafeed
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-datafeed
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to delete
	 *     force?: bool, // Use to forcefully delete a started datafeed; this method is quicker than stopping and deleting the datafeed.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteDatafeed(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['datafeed_id'], $params);
		$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['force','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.delete_datafeed');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete expired ML data
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-expired-data
	 *
	 * @param array{
	 *     job_id?: string, // The ID of the job(s) to perform expired data hygiene for
	 *     requests_per_second?: int, // The desired requests per second for the deletion processes. The default behavior is no throttling.
	 *     timeout?: int|string, // How long can the underlying delete processes run until they are canceled. (DEFAULT: 8h)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // deleting expired data parameters. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteExpiredData(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['job_id'])) {
			$url = '/_ml/_delete_expired_data/' . $this->encode($params['job_id']);
			$method = 'DELETE';
		} else {
			$url = '/_ml/_delete_expired_data';
			$method = 'DELETE';
		}
		$url = $this->addQueryString($url, $params, ['requests_per_second','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.delete_expired_data');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a filter
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-filter
	 * @group serverless
	 *
	 * @param array{
	 *     filter_id: string, // (REQUIRED) The ID of the filter to delete
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteFilter(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['filter_id'], $params);
		$url = '/_ml/filters/' . $this->encode($params['filter_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['filter_id'], $request, 'ml.delete_filter');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete forecasts from a job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-forecast
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job from which to delete forecasts
	 *     forecast_id?: string, // The ID of the forecast to delete, can be comma delimited list. Leaving blank implies `_all`
	 *     allow_no_forecasts?: bool, // Specifies whether an error occurs when there are no forecasts. In particular, if this parameter is set to `false` and there are no forecasts associated with the job, attempts to delete all forecasts return an error. (DEFAULT: 1)
	 *     timeout?: int|string, // Specifies the period of time to wait for the completion of the delete operation. When this period of time elapses, the API fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteForecast(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['forecast_id'])) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_forecast/' . $this->encode($params['forecast_id']);
			$method = 'DELETE';
		} else {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_forecast';
			$method = 'DELETE';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_forecasts','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'forecast_id'], $request, 'ml.delete_forecast');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete an anomaly detection job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-job
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to delete
	 *     force?: bool, // Use to forcefully delete an opened job; this method is quicker than closing and deleting the job.
	 *     wait_for_completion?: bool, // Specifies whether the request should return immediately or wait until the job deletion completes. (DEFAULT: 1)
	 *     delete_user_annotations?: bool, // Specifies whether annotations that have been added by the user should be deleted along with any auto-generated annotations when the job is reset.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['force','wait_for_completion','delete_user_annotations','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.delete_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a model snapshot
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-model-snapshot
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot to delete
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteModelSnapshot(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/model_snapshots/' . $this->encode($params['snapshot_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'snapshot_id'], $request, 'ml.delete_model_snapshot');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete an unreferenced trained model
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-trained-model
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained model to delete
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     force?: bool, // Forcefully deletes a trained model that is referenced by ingest pipelines or has a started deployment.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteTrainedModel(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['timeout','force','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.delete_trained_model');
		return $this->client->sendRequest($request);
	}


	/**
	 * Delete a trained model alias
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-delete-trained-model-alias
	 * @group serverless
	 *
	 * @param array{
	 *     model_alias: string, // (REQUIRED) The trained model alias to delete
	 *     model_id: string, // (REQUIRED) The trained model where the model alias is assigned
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function deleteTrainedModelAlias(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_alias','model_id'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/model_aliases/' . $this->encode($params['model_alias']);
		$method = 'DELETE';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_alias', 'model_id'], $request, 'ml.delete_trained_model_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Estimate job model memory usage
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-estimate-model-memory
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The analysis config, plus cardinality estimates for fields it references. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function estimateModelMemory(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_ml/anomaly_detectors/_estimate_model_memory';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ml.estimate_model_memory');
		return $this->client->sendRequest($request);
	}


	/**
	 * Evaluate data frame analytics
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-evaluate-data-frame
	 * @group serverless
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The evaluation definition. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function evaluateDataFrame(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_ml/data_frame/_evaluate';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ml.evaluate_data_frame');
		return $this->client->sendRequest($request);
	}


	/**
	 * Explain data frame analytics config
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-explain-data-frame-analytics
	 *
	 * @param array{
	 *     id?: string, // The ID of the data frame analytics to explain
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The data frame analytics config to explain. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function explainDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']) . '/_explain';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ml/data_frame/analytics/_explain';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.explain_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Force buffered data to be processed
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-flush-job
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job to flush
	 *     calc_interim?: bool, // If true, calculates the interim results for the most recent bucket or all buckets within the latency period.
	 *     start?: string, // When used in conjunction with `calc_interim`, specifies the range of buckets on which to calculate interim results.
	 *     end?: string, // When used in conjunction with `calc_interim` and `start`, specifies the range of buckets on which to calculate interim results.
	 *     advance_time?: string, // Specifies to advance to a particular time value. Results are generated and the model is updated for data from the specified time interval.
	 *     skip_time?: string, // Specifies to skip to a particular time value. Results are not generated and the model is not updated for data from the specified time interval.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Flush parameters. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function flushJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_flush';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['calc_interim','start','end','advance_time','skip_time','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.flush_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Predict future behavior of a time series
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-forecast
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to forecast for
	 *     duration?: int|string, // A period of time that indicates how far into the future to forecast. For example, `30d` corresponds to 30 days. The forecast starts at the last record that was processed. (DEFAULT: 1d)
	 *     expires_in?: int|string, // The period of time that forecast results are retained. After a forecast expires, the results are deleted. If set to a value of 0, the forecast is never automatically deleted. (DEFAULT: 14d)
	 *     max_model_memory?: string, // The maximum memory the forecast can use. If the forecast needs to use more than the provided amount, it will spool to disk. Default is 20mb, maximum is 500mb and minimum is 1mb. If set to 40% or more of the job’s configured memory limit, it is automatically reduced to below that amount. (DEFAULT: 20mb)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Query parameters can be specified in the body. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function forecast(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_forecast';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['duration','expires_in','max_model_memory','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.forecast');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly detection job results for buckets
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-buckets
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) ID of the job to get bucket results from
	 *     timestamp?: string, // The timestamp of the desired single bucket result
	 *     expand?: bool, // If true, the output includes anomaly records.
	 *     exclude_interim?: bool, // If `true`, the output excludes interim results.
	 *     from?: int, // Skips the specified number of buckets.
	 *     size?: int, // Specifies the maximum number of buckets to obtain. (DEFAULT: 100)
	 *     start?: string, // Returns buckets with timestamps after this time. `-1` means it is unset and results are not limited to specific timestamps. (DEFAULT: -1)
	 *     end?: string, // Returns buckets with timestamps earlier than this time. `-1` means it is unset and results are not limited to specific timestamps. (DEFAULT: -1)
	 *     anomaly_score?: float, // Returns buckets with anomaly scores greater or equal than this value.
	 *     sort?: string, // Specifies the sort field for the requested buckets. (DEFAULT: timestamp)
	 *     desc?: bool, // If `true`, the buckets are sorted in descending order.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Bucket selection details if not provided in URI. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getBuckets(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['timestamp'])) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/results/buckets/' . $this->encode($params['timestamp']);
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/results/buckets';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['expand','exclude_interim','from','size','start','end','anomaly_score','sort','desc','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'timestamp'], $request, 'ml.get_buckets');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get info about events in calendars
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-calendar-events
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar containing the events
	 *     job_id?: string, // Specifies to get events for a specific anomaly detection job identifier or job group. It must be used with a calendar identifier of `_all` or `*`.
	 *     start?: string, // Specifies to get events with timestamps after this time.
	 *     end?: string, // Specifies to get events with timestamps earlier than this time.
	 *     from?: int, // Skips the specified number of events.
	 *     size?: int, // Specifies the maximum number of events to obtain. (DEFAULT: 100)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getCalendarEvents(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['calendar_id'], $params);
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']) . '/events';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['job_id','start','end','from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id'], $request, 'ml.get_calendar_events');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get calendar configuration info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-calendars
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id?: string, // The ID of the calendar to fetch
	 *     from?: int, // Skips the specified number of calendars. This parameter is supported only when you omit the calendar identifier.
	 *     size?: int, // Specifies the maximum number of calendars to obtain. This parameter is supported only when you omit the calendar identifier. (DEFAULT: 10000)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The from and size parameters optionally sent in the body. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getCalendars(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['calendar_id'])) {
			$url = '/_ml/calendars/' . $this->encode($params['calendar_id']);
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ml/calendars';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id'], $request, 'ml.get_calendars');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly detection job results for categories
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-categories
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job
	 *     category_id?: int, // The identifier of the category definition of interest
	 *     from?: int, // Skips the specified number of categories.
	 *     size?: int, // Specifies the maximum number of categories to obtain. (DEFAULT: 100)
	 *     partition_field_value?: string, // Only return categories for the specified partition.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Category selection details if not provided in URI. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getCategories(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['category_id'])) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/results/categories/' . $this->encode($params['category_id']);
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/results/categories';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['from','size','partition_field_value','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'category_id'], $request, 'ml.get_categories');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data frame analytics job configuration info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id?: string, // The ID of the data frame analytics to fetch
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no data frame analytics jobs that match. 2. Contains the `_all` string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  The default value returns an empty data_frame_analytics array when there are no matches and the subset of results when there are partial matches. If this parameter is `false`, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     from?: int, // Skips the specified number of data frame analytics jobs.
	 *     size?: int, // Specifies the maximum number of data frame analytics jobs to obtain. (DEFAULT: 100)
	 *     exclude_generated?: bool, // Indicates if certain fields should be removed from the configuration on retrieval. This allows the configuration to be in an acceptable format to be retrieved and then added to another cluster.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']);
			$method = 'GET';
		} else {
			$url = '/_ml/data_frame/analytics';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','from','size','exclude_generated','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.get_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get data frame analytics job stats
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-data-frame-analytics-stats
	 * @group serverless
	 *
	 * @param array{
	 *     id?: string, // The ID of the data frame analytics stats to fetch
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no data frame analytics jobs that match. 2. Contains the `_all` string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  The default value returns an empty data_frame_analytics array when there are no matches and the subset of results when there are partial matches. If this parameter is `false`, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     from?: int, // Skips the specified number of data frame analytics jobs.
	 *     size?: int, // Specifies the maximum number of data frame analytics jobs to obtain. (DEFAULT: 100)
	 *     verbose?: bool, // Defines whether the stats response should be verbose.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getDataFrameAnalyticsStats(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_ml/data_frame/analytics/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','from','size','verbose','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.get_data_frame_analytics_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get datafeed stats
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-datafeed-stats
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id?: string|array<string>, // Comma-separated list of datafeed identifiers or wildcard expressions. If you do not specify one of these options, the API returns information about all datafeeds.
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no datafeeds that match. 2. Contains the `_all` string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  The default value is `true`, which returns an empty `datafeeds` array when there are no matches and the subset of results when there are partial matches. If this parameter is `false`, the request returns a `404` status code when there are no matches or only partial matches.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getDatafeedStats(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['datafeed_id'])) {
			$url = '/_ml/datafeeds/' . $this->encode($this->convertValue($params['datafeed_id'])) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_ml/datafeeds/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.get_datafeed_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get datafeeds configuration info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-datafeeds
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id?: string|array<string>, // Identifier for the datafeed. It can be a datafeed identifier or a wildcard expression. If you do not specify one of these options, the API returns information about all datafeeds.
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no datafeeds that match. 2. Contains the `_all` string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  The default value is `true`, which returns an empty `datafeeds` array when there are no matches and the subset of results when there are partial matches. If this parameter is `false`, the request returns a `404` status code when there are no matches or only partial matches.
	 *     exclude_generated?: bool, // Indicates if certain fields should be removed from the configuration on retrieval. This allows the configuration to be in an acceptable format to be retrieved and then added to another cluster.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getDatafeeds(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['datafeed_id'])) {
			$url = '/_ml/datafeeds/' . $this->encode($this->convertValue($params['datafeed_id']));
			$method = 'GET';
		} else {
			$url = '/_ml/datafeeds';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','exclude_generated','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.get_datafeeds');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get filters
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-filters
	 * @group serverless
	 *
	 * @param array{
	 *     filter_id?: string|array<string>, // Comma-separated list of strings that uniquely identify a filter.
	 *     from?: int, // Skips the specified number of filters.
	 *     size?: int, // Specifies the maximum number of filters to obtain. (DEFAULT: 100)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getFilters(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['filter_id'])) {
			$url = '/_ml/filters/' . $this->encode($this->convertValue($params['filter_id']));
			$method = 'GET';
		} else {
			$url = '/_ml/filters';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['filter_id'], $request, 'ml.get_filters');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly detection job results for influencers
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-influencers
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) Identifier for the anomaly detection job
	 *     exclude_interim?: bool, // If true, the output excludes interim results. By default, interim results are included.
	 *     from?: int, // Skips the specified number of influencers.
	 *     size?: int, // Specifies the maximum number of influencers to obtain. (DEFAULT: 100)
	 *     start?: string, // Returns influencers with timestamps after this time. The default value means it is unset and results are not limited to specific timestamps. (DEFAULT: -1)
	 *     end?: string, // Returns influencers with timestamps earlier than this time. The default value means it is unset and results are not limited to specific timestamps. (DEFAULT: -1)
	 *     influencer_score?: float, // Returns influencers with anomaly scores greater than or equal to this value.
	 *     sort?: string, // Specifies the sort field for the requested influencers. By default, the influencers are sorted by the `influencer_score` value.
	 *     desc?: bool, // If true, the results are sorted in descending order.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Influencer selection criteria. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getInfluencers(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/results/influencers';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['exclude_interim','from','size','start','end','influencer_score','sort','desc','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.get_influencers');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly detection job stats
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-job-stats
	 * @group serverless
	 *
	 * @param array{
	 *     job_id?: string, // The ID of the jobs stats to fetch
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no jobs that match. 2. Contains the _all string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  If `true`, the API returns an empty `jobs` array when there are no matches and the subset of results when there are partial matches. If `false`, the API returns a `404` status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getJobStats(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['job_id'])) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_ml/anomaly_detectors/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.get_job_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly detection jobs configuration info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-jobs
	 * @group serverless
	 *
	 * @param array{
	 *     job_id?: string|array<string>, // Comma-separated list of identifiers for the anomaly detection job. It can be a job identifier, a group name, or a wildcard expression. If you do not specify one of these options, the API returns information for all anomaly detection jobs.
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no jobs that match. 2. Contains the _all string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  The default value is `true`, which returns an empty `jobs` array when there are no matches and the subset of results when there are partial matches. If this parameter is `false`, the request returns a `404` status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     exclude_generated?: bool, // Indicates if certain fields should be removed from the configuration on retrieval. This allows the configuration to be in an acceptable format to be retrieved and then added to another cluster.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getJobs(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['job_id'])) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($this->convertValue($params['job_id']));
			$method = 'GET';
		} else {
			$url = '/_ml/anomaly_detectors';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','exclude_generated','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.get_jobs');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get machine learning memory usage info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-memory-stats
	 *
	 * @param array{
	 *     node_id?: string, // Specifies the node or nodes to retrieve stats for.
	 *     master_timeout?: int|string, // Period to wait for a connection to the master node. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     timeout?: int|string, // Period to wait for a response. If no response is received before the timeout expires, the request fails and returns an error. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getMemoryStats(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['node_id'])) {
			$url = '/_ml/memory/' . $this->encode($params['node_id']) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_ml/memory/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['master_timeout','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['node_id'], $request, 'ml.get_memory_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly detection job model snapshot upgrade usage info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-model-snapshot-upgrade-stats
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job. May be a wildcard, comma separated list or `_all`.
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot. May be a wildcard, comma separated list or `_all`.
	 *     allow_no_match?: bool, // Specifies what to do when the request:   -  Contains wildcard expressions and there are no jobs that match.  -  Contains the _all string or no identifiers and there are no matches.  -  Contains wildcard expressions and there are only partial matches.  The default value is true, which returns an empty jobs array when there are no matches and the subset of results when there are partial matches. If this parameter is false, the request returns a 404 status code when there are no matches or only partial matches.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getModelSnapshotUpgradeStats(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/model_snapshots/' . $this->encode($params['snapshot_id']) . '/_upgrade/_stats';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['allow_no_match','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'snapshot_id'], $request, 'ml.get_model_snapshot_upgrade_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get model snapshots info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-model-snapshots
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id?: string, // The ID of the snapshot to fetch
	 *     from?: int, // Skips the specified number of snapshots.
	 *     size?: int, // Specifies the maximum number of snapshots to obtain. (DEFAULT: 100)
	 *     start?: string, // Returns snapshots with timestamps after this time.
	 *     end?: string, // Returns snapshots with timestamps earlier than this time.
	 *     sort?: string, // Specifies the sort field for the requested snapshots. By default, the snapshots are sorted by their timestamp.
	 *     desc?: bool, // If true, the results are sorted in descending order.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Model snapshot selection criteria. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getModelSnapshots(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		if (isset($params['snapshot_id'])) {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/model_snapshots/' . $this->encode($params['snapshot_id']);
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/model_snapshots';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['from','size','start','end','sort','desc','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'snapshot_id'], $request, 'ml.get_model_snapshots');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get overall bucket results
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-overall-buckets
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The job IDs for which to calculate overall bucket results
	 *     top_n?: int, // The number of top anomaly detection job bucket scores to be used in the `overall_score` calculation. (DEFAULT: 1)
	 *     bucket_span?: int|string, // The span of the overall buckets. Must be greater or equal to the largest bucket span of the specified anomaly detection jobs, which is the default value.  By default, an overall bucket has a span equal to the largest bucket span of the specified anomaly detection jobs. To override that behavior, use the optional `bucket_span` parameter.
	 *     overall_score?: float, // Returns overall buckets with overall scores greater than or equal to this value.
	 *     exclude_interim?: bool, // If `true`, the output excludes interim results.
	 *     start?: string, // Returns overall buckets with timestamps after this time.
	 *     end?: string, // Returns overall buckets with timestamps earlier than this time.
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no jobs that match. 2. Contains the `_all` string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  If `true`, the request returns an empty `jobs` array when there are no matches and the subset of results when there are partial matches. If this parameter is `false`, the request returns a `404` status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Overall bucket selection details if not provided in URI. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getOverallBuckets(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/results/overall_buckets';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['top_n','bucket_span','overall_score','exclude_interim','start','end','allow_no_match','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.get_overall_buckets');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get anomaly records for an anomaly detection job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-records
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job
	 *     exclude_interim?: bool, // If `true`, the output excludes interim results.
	 *     from?: int, // Skips the specified number of records.
	 *     size?: int, // Specifies the maximum number of records to obtain. (DEFAULT: 100)
	 *     start?: string, // Returns records with timestamps after this time. The default value means results are not limited to specific timestamps. (DEFAULT: -1)
	 *     end?: string, // Returns records with timestamps earlier than this time. The default value means results are not limited to specific timestamps. (DEFAULT: -1)
	 *     record_score?: float, // Returns records with anomaly scores greater or equal than this value.
	 *     sort?: string, // Specifies the sort field for the requested records. (DEFAULT: record_score)
	 *     desc?: bool, // If true, the results are sorted in descending order.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Record selection criteria. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getRecords(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/results/records';
		$method = empty($params['body']) ? 'GET' : 'POST';

		$url = $this->addQueryString($url, $params, ['exclude_interim','from','size','start','end','record_score','sort','desc','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.get_records');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get trained model configuration info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-trained-models
	 * @group serverless
	 *
	 * @param array{
	 *     model_id?: string|array<string>, // The unique identifier of the trained model or a model alias.  You can get information for multiple trained models in a single API request by using a comma-separated list of model IDs or a wildcard expression.
	 *     allow_no_match?: bool, // Specifies what to do when the request:  - Contains wildcard expressions and there are no models that match. - Contains the _all string or no identifiers and there are no matches. - Contains wildcard expressions and there are only partial matches.  If true, it returns an empty array when there are no matches and the subset of results when there are partial matches. (DEFAULT: 1)
	 *     include?: string, // A comma delimited string of optional fields to include in the response body.
	 *     decompress_definition?: bool, // Specifies whether the included model definition should be returned as a JSON map (true) or in a custom compressed format (false). (DEFAULT: 1)
	 *     from?: int, // Skips the specified number of models.
	 *     size?: int, // Specifies the maximum number of models to obtain. (DEFAULT: 100)
	 *     tags?: string|array<string>, // A comma delimited string of tags. A trained model can have many tags, or none. When supplied, only trained models that contain all the supplied tags are returned.
	 *     exclude_generated?: bool, // Indicates if certain fields should be removed from the configuration on retrieval. This allows the configuration to be in an acceptable format to be retrieved and then added to another cluster.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getTrainedModels(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['model_id'])) {
			$url = '/_ml/trained_models/' . $this->encode($this->convertValue($params['model_id']));
			$method = 'GET';
		} else {
			$url = '/_ml/trained_models';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','include','decompress_definition','from','size','tags','exclude_generated','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.get_trained_models');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get trained models usage info
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-get-trained-models-stats
	 * @group serverless
	 *
	 * @param array{
	 *     model_id?: string|array<string>, // The unique identifier of the trained model or a model alias. It can be a comma-separated list or a wildcard expression.
	 *     allow_no_match?: bool, // Specifies what to do when the request:  - Contains wildcard expressions and there are no models that match. - Contains the _all string or no identifiers and there are no matches. - Contains wildcard expressions and there are only partial matches.  If true, it returns an empty array when there are no matches and the subset of results when there are partial matches. (DEFAULT: 1)
	 *     from?: int, // Skips the specified number of models.
	 *     size?: int, // Specifies the maximum number of models to obtain. (DEFAULT: 100)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function getTrainedModelsStats(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['model_id'])) {
			$url = '/_ml/trained_models/' . $this->encode($this->convertValue($params['model_id'])) . '/_stats';
			$method = 'GET';
		} else {
			$url = '/_ml/trained_models/_stats';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','from','size','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.get_trained_models_stats');
		return $this->client->sendRequest($request);
	}


	/**
	 * Evaluate a trained model
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-infer-trained-model
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     timeout?: int|string, // Controls the amount of time to wait for inference results. (DEFAULT: 10s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The docs to apply inference on and inference configuration overrides. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function inferTrainedModel(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id','body'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/_infer';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.infer_trained_model');
		return $this->client->sendRequest($request);
	}


	/**
	 * Get machine learning information
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-info
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function info(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ml/info';
		$method = 'GET';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ml.info');
		return $this->client->sendRequest($request);
	}


	/**
	 * Open anomaly detection jobs
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-open-job
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to open
	 *     timeout?: int|string, // Controls the time to wait until a job has opened. (DEFAULT: 30m)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Query parameters can be specified in the body. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function openJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_open';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.open_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Add scheduled events to the calendar
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-post-calendar-events
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) A list of events. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function postCalendarEvents(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['calendar_id','body'], $params);
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']) . '/events';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id'], $request, 'ml.post_calendar_events');
		return $this->client->sendRequest($request);
	}


	/**
	 * Send data to an anomaly detection job for analysis
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-post-data
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job receiving the data
	 *     reset_start?: string, // Specifies the start of the bucket resetting range.
	 *     reset_end?: string, // Specifies the end of the bucket resetting range.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data to process. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function postData(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','body'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_data';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['reset_start','reset_end','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => is_string($params['body']) || $this->isAssociativeArray($params['body']) ? 'application/json' : 'application/x-ndjson',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.post_data');
		return $this->client->sendRequest($request);
	}


	/**
	 * Preview features used by data frame analytics
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-preview-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id?: string, // The ID of the data frame analytics to preview
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The data frame analytics config to preview. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function previewDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['id'])) {
			$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']) . '/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ml/data_frame/analytics/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.preview_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Preview a datafeed
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-preview-datafeed
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id?: string, // The ID of the datafeed to preview
	 *     start?: string, // The start time from where the datafeed preview should begin
	 *     end?: string, // The end time when the datafeed preview should stop
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The datafeed config and job config with which to execute the preview. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function previewDatafeed(?array $params = null)
	{
		$params = $params ?? [];
		if (isset($params['datafeed_id'])) {
			$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']) . '/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		} else {
			$url = '/_ml/datafeeds/_preview';
			$method = empty($params['body']) ? 'GET' : 'POST';
		}
		$url = $this->addQueryString($url, $params, ['start','end','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.preview_datafeed');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a calendar
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-calendar
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to create
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The calendar details. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putCalendar(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['calendar_id'], $params);
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id'], $request, 'ml.put_calendar');
		return $this->client->sendRequest($request);
	}


	/**
	 * Add anomaly detection job to calendar
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-calendar-job
	 * @group serverless
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     job_id: string|array<string>, // (REQUIRED) An identifier for the anomaly detection jobs. It can be a job identifier, a group name, or a comma-separated list of jobs or groups.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putCalendarJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['calendar_id','job_id'], $params);
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']) . '/jobs/' . $this->encode($this->convertValue($params['job_id']));
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['calendar_id', 'job_id'], $request, 'ml.put_calendar_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a data frame analytics job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to create
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data frame analytics configuration. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.put_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a datafeed
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-datafeed
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to create
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a concrete (non-wildcarded) index, alias, or data stream that is missing, closed, or otherwise unavailable. If `true`, unavailable concrete targets are silently ignored.
	 *     allow_no_indices?: bool, // A setting that does two separate checks on the index expression. If `false`, the request returns an error (1) if any wildcard expression (including `_all` and `*`) resolves to zero matching indices or (2) if the complete set of resolved indices, aliases or data streams is empty after all expressions are evaluated. If `true`, index expressions that resolve to no indices are allowed and the request returns an empty result. (DEFAULT: 1)
	 *     ignore_throttled?: bool, // If true, concrete, expanded, or aliased indices are ignored when frozen. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values. (DEFAULT: open)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The datafeed config. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putDatafeed(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['datafeed_id','body'], $params);
		$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','ignore_throttled','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.put_datafeed');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a filter
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-filter
	 * @group serverless
	 *
	 * @param array{
	 *     filter_id: string, // (REQUIRED) The ID of the filter to create
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The filter details. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putFilter(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['filter_id','body'], $params);
		$url = '/_ml/filters/' . $this->encode($params['filter_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['filter_id'], $request, 'ml.put_filter');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create an anomaly detection job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-job
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to create
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a concrete (non-wildcarded) index, alias, or data stream that is missing, closed, or otherwise unavailable. If `true`, unavailable concrete targets are silently ignored.
	 *     allow_no_indices?: bool, // A setting that does two separate checks on the index expression. If `false`, the request returns an error (1) if any wildcard expression (including `_all` and `*`) resolves to zero matching indices or (2) if the complete set of resolved indices, aliases or data streams is empty after all expressions are evaluated. If `true`, index expressions that resolve to no indices are allowed and the request returns an empty result. (DEFAULT: 1)
	 *     ignore_throttled?: bool, // If `true`, concrete, expanded or aliased indices are ignored when frozen. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values. (DEFAULT: open)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The job. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','body'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','ignore_throttled','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.put_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a trained model
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-trained-model
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained models to store
	 *     defer_definition_decompression?: bool, // If set to `true` and a `compressed_definition` is provided, the request defers definition decompression and skips relevant validations.
	 *     wait_for_completion?: bool, // Whether to wait for all child operations (e.g. model download) to complete.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The trained model configuration. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModel(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id','body'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['defer_definition_decompression','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.put_trained_model');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create or update a trained model alias
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-trained-model-alias
	 * @group serverless
	 *
	 * @param array{
	 *     model_alias: string, // (REQUIRED) The trained model alias to update
	 *     model_id: string, // (REQUIRED) The trained model where the model alias should be assigned
	 *     reassign?: bool, // Specifies whether the alias gets reassigned to the specified trained model if it is already assigned to a different model. If the alias is already assigned and this parameter is false, the API returns an error.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModelAlias(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_alias','model_id'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/model_aliases/' . $this->encode($params['model_alias']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['reassign','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_alias', 'model_id'], $request, 'ml.put_trained_model_alias');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create part of a trained model definition
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-trained-model-definition-part
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained model for this definition part
	 *     part: int, // (REQUIRED) The part number
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The trained model definition part. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModelDefinitionPart(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id','part','body'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/definition/' . $this->encode($params['part']);
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id', 'part'], $request, 'ml.put_trained_model_definition_part');
		return $this->client->sendRequest($request);
	}


	/**
	 * Create a trained model vocabulary
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-put-trained-model-vocabulary
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained model for this vocabulary
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The trained model vocabulary. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function putTrainedModelVocabulary(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id','body'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/vocabulary';
		$method = 'PUT';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.put_trained_model_vocabulary');
		return $this->client->sendRequest($request);
	}


	/**
	 * Reset an anomaly detection job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-reset-job
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to reset
	 *     wait_for_completion?: bool, // Should this request wait until the operation has completed before returning. (DEFAULT: 1)
	 *     delete_user_annotations?: bool, // Specifies whether annotations that have been added by the user should be deleted along with any auto-generated annotations when the job is reset.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function resetJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_reset';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['wait_for_completion','delete_user_annotations','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.reset_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Revert to a snapshot
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-revert-model-snapshot
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot to revert to
	 *     delete_intervening_results?: bool, // If true, deletes the results in the time period between the latest results and the time of the reverted snapshot. It also resets the model to accept records for this time period. If you choose not to delete intervening results when reverting a snapshot, the job will not accept input data that is older than the current time. If you want to resend data, then delete the intervening results.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // Reversion options. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function revertModelSnapshot(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/model_snapshots/' . $this->encode($params['snapshot_id']) . '/_revert';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['delete_intervening_results','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'snapshot_id'], $request, 'ml.revert_model_snapshot');
		return $this->client->sendRequest($request);
	}


	/**
	 * Set upgrade_mode for ML indices
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-set-upgrade-mode
	 *
	 * @param array{
	 *     enabled?: bool, // When `true`, it enables `upgrade_mode` which temporarily halts all job and datafeed tasks and prohibits new job and datafeed tasks from starting.
	 *     timeout?: int|string, // The time to wait for the request to be completed. (DEFAULT: 30s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function setUpgradeMode(?array $params = null)
	{
		$params = $params ?? [];
		$url = '/_ml/set_upgrade_mode';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['enabled','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ml.set_upgrade_mode');
		return $this->client->sendRequest($request);
	}


	/**
	 * Start a data frame analytics job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-start-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to start
	 *     timeout?: int|string, // Controls the amount of time to wait until the data frame analytics job starts. (DEFAULT: 20s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The start data frame analytics parameters. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function startDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']) . '/_start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.start_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Start datafeeds
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-start-datafeed
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to start
	 *     start?: string, // The time that the datafeed should begin, which can be specified by using the same formats as the `end` parameter. This value is inclusive. If you do not specify a start time and the datafeed is associated with a new anomaly detection job, the analysis starts from the earliest time for which data is available. If you restart a stopped datafeed and specify a start value that is earlier than the timestamp of the latest processed record, the datafeed continues from 1 millisecond after the timestamp of the latest processed record.
	 *     end?: string, // The time that the datafeed should end, which can be specified by using one of the following formats:  * ISO 8601 format with milliseconds, for example `2017-01-22T06:00:00.000Z` * ISO 8601 format without milliseconds, for example `2017-01-22T06:00:00+00:00` * Milliseconds since the epoch, for example `1485061200000`  Date-time arguments using either of the ISO 8601 formats must have a time zone designator, where `Z` is accepted as an abbreviation for UTC time. When a URL is expected (for example, in browsers), the `+` used in time zone designators must be encoded as `%2B`. The end time value is exclusive. If you do not specify an end time, the datafeed runs continuously.
	 *     timeout?: int|string, // Specifies the amount of time to wait until a datafeed starts. (DEFAULT: 20s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The start datafeed parameters. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function startDatafeed(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['datafeed_id'], $params);
		$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']) . '/_start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['start','end','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.start_datafeed');
		return $this->client->sendRequest($request);
	}


	/**
	 * Start a trained model deployment
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-start-trained-model-deployment
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     cache_size?: string, // The inference cache size (in memory outside the JVM heap) per node for the model. The default value is the same size as the `model_size_bytes`. To disable the cache, `0b` can be provided.
	 *     deployment_id?: string, // A unique identifier for the deployment of the model.
	 *     number_of_allocations?: int, // The number of model allocations on each node where the model is deployed. All allocations on a node share the same copy of the model in memory but use a separate set of threads to evaluate the model. Increasing this value generally increases the throughput. If this setting is greater than the number of hardware threads it will automatically be changed to a value less than the number of hardware threads. If adaptive_allocations is enabled, do not set this value, because it’s automatically set. (DEFAULT: 1)
	 *     threads_per_allocation?: int, // Sets the number of threads used by each model allocation during inference. This generally increases the inference speed. The inference process is a compute-bound process; any number greater than the number of available hardware threads on the machine does not increase the inference speed. If this setting is greater than the number of hardware threads it will automatically be changed to a value less than the number of hardware threads. (DEFAULT: 1)
	 *     priority?: string, // The deployment priority
	 *     queue_capacity?: int, // Specifies the number of inference requests that are allowed in the queue. After the number of requests exceeds this value, new requests are rejected with a 429 error. (DEFAULT: 1024)
	 *     timeout?: int|string, // Specifies the amount of time to wait for the model to deploy. (DEFAULT: 20s)
	 *     wait_for?: string, // Specifies the allocation status to wait for before returning. (DEFAULT: started)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The settings for the trained model deployment. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function startTrainedModelDeployment(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/deployment/_start';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['cache_size','deployment_id','number_of_allocations','threads_per_allocation','priority','queue_capacity','timeout','wait_for','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.start_trained_model_deployment');
		return $this->client->sendRequest($request);
	}


	/**
	 * Stop data frame analytics jobs
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-stop-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to stop
	 *     allow_no_match?: bool, // Specifies what to do when the request:  1. Contains wildcard expressions and there are no data frame analytics jobs that match. 2. Contains the _all string or no identifiers and there are no matches. 3. Contains wildcard expressions and there are only partial matches.  The default value is true, which returns an empty data_frame_analytics array when there are no matches and the subset of results when there are partial matches. If this parameter is false, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     force?: bool, // If true, the data frame analytics job is stopped forcefully.
	 *     timeout?: int|string, // Controls the amount of time to wait until the data frame analytics job stops. Defaults to 20 seconds. (DEFAULT: 20s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The stop data frame analytics parameters. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function stopDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id'], $params);
		$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']) . '/_stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['allow_no_match','force','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.stop_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Stop datafeeds
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-stop-datafeed
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to stop
	 *     allow_no_match?: bool, // Specifies what to do when the request:  * Contains wildcard expressions and there are no datafeeds that match. * Contains the `_all` string or no identifiers and there are no matches. * Contains wildcard expressions and there are only partial matches.  If `true`, the API returns an empty datafeeds array when there are no matches and the subset of results when there are partial matches. If `false`, the API returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     force?: bool, // If `true`, the datafeed is stopped forcefully.
	 *     close_job?: bool, // If `true` the job associated with the datafeed is closed.
	 *     timeout?: int|string, // Specifies the amount of time to wait until a datafeed stops. (DEFAULT: 20s)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The URL params optionally sent in the body. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function stopDatafeed(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['datafeed_id'], $params);
		$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']) . '/_stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['allow_no_match','force','close_job','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.stop_datafeed');
		return $this->client->sendRequest($request);
	}


	/**
	 * Stop a trained model deployment
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-stop-trained-model-deployment
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     allow_no_match?: bool, // Specifies what to do when the request: contains wildcard expressions and there are no deployments that match; contains the  `_all` string or no identifiers and there are no matches; or contains wildcard expressions and there are only partial matches. By default, it returns an empty array when there are no matches and the subset of results when there are partial matches. If `false`, the request returns a 404 status code when there are no matches or only partial matches. (DEFAULT: 1)
	 *     force?: bool, // Forcefully stops the deployment, even if it is used by ingest pipelines. You can't use these pipelines until you restart the model deployment.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The stop deployment parameters. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function stopTrainedModelDeployment(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/deployment/_stop';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['allow_no_match','force','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.stop_trained_model_deployment');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update a data frame analytics job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-update-data-frame-analytics
	 * @group serverless
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The data frame analytics settings to update. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateDataFrameAnalytics(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['id','body'], $params);
		$url = '/_ml/data_frame/analytics/' . $this->encode($params['id']) . '/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['id'], $request, 'ml.update_data_frame_analytics');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update a datafeed
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-update-datafeed
	 * @group serverless
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to update
	 *     ignore_unavailable?: bool, // If `false`, the request returns an error if it targets a concrete (non-wildcarded) index, alias, or data stream that is missing, closed, or otherwise unavailable. If `true`, unavailable concrete targets are silently ignored.
	 *     allow_no_indices?: bool, // A setting that does two separate checks on the index expression. If `false`, the request returns an error (1) if any wildcard expression (including `_all` and `*`) resolves to zero matching indices or (2) if the complete set of resolved indices, aliases or data streams is empty after all expressions are evaluated. If `true`, index expressions that resolve to no indices are allowed and the request returns an empty result. (DEFAULT: 1)
	 *     ignore_throttled?: bool, // If `true`, concrete, expanded or aliased indices are ignored when frozen. (DEFAULT: 1)
	 *     expand_wildcards?: string|array<string>, // Type of index that wildcard patterns can match. If the request can target data streams, this argument determines whether wildcard expressions match hidden data streams. Supports comma-separated values. (DEFAULT: open)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The datafeed update settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateDatafeed(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['datafeed_id','body'], $params);
		$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']) . '/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['ignore_unavailable','allow_no_indices','ignore_throttled','expand_wildcards','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.update_datafeed');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update a filter
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-update-filter
	 * @group serverless
	 *
	 * @param array{
	 *     filter_id: string, // (REQUIRED) The ID of the filter to update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The filter update. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateFilter(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['filter_id','body'], $params);
		$url = '/_ml/filters/' . $this->encode($params['filter_id']) . '/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['filter_id'], $request, 'ml.update_filter');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update an anomaly detection job
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-update-job
	 * @group serverless
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to create
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The job update settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateJob(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','body'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.update_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update a snapshot
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-update-model-snapshot
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot to update
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The model snapshot properties to update. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateModelSnapshot(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','snapshot_id','body'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/model_snapshots/' . $this->encode($params['snapshot_id']) . '/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'snapshot_id'], $request, 'ml.update_model_snapshot');
		return $this->client->sendRequest($request);
	}


	/**
	 * Update a trained model deployment
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-update-trained-model-deployment
	 * @group serverless
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     number_of_allocations?: int, // The number of model allocations on each node where the model is deployed. All allocations on a node share the same copy of the model in memory but use a separate set of threads to evaluate the model. Increasing this value generally increases the throughput. If this setting is greater than the number of hardware threads it will automatically be changed to a value less than the number of hardware threads. (DEFAULT: 1)
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body?: string|array<mixed>, // The updated trained model deployment settings. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function updateTrainedModelDeployment(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['model_id'], $params);
		$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/deployment/_update';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['number_of_allocations','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.update_trained_model_deployment');
		return $this->client->sendRequest($request);
	}


	/**
	 * Upgrade a snapshot
	 *
	 * @link https://www.elastic.co/docs/api/doc/elasticsearch/operation/operation-ml-upgrade-job-snapshot
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot
	 *     timeout?: int|string, // Controls the time to wait for the request to complete. (DEFAULT: 30m)
	 *     wait_for_completion?: bool, // When true, the API won’t respond until the upgrade is complete. Otherwise, it responds as soon as the upgrade task is assigned to a node.
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 * } $params
	 *
	 * @throws MissingParameterException if a required parameter is missing
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function upgradeJobSnapshot(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['job_id','snapshot_id'], $params);
		$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']) . '/model_snapshots/' . $this->encode($params['snapshot_id']) . '/_upgrade';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['timeout','wait_for_completion','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id', 'snapshot_id'], $request, 'ml.upgrade_job_snapshot');
		return $this->client->sendRequest($request);
	}


	/**
	 * Validate an anomaly detection job
	 *
	 * @link https://www.elastic.co/guide/en/machine-learning/current/ml-jobs.html
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The job config. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function validate(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_ml/anomaly_detectors/_validate';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ml.validate');
		return $this->client->sendRequest($request);
	}


	/**
	 * Validate an anomaly detection job
	 *
	 *
	 * @param array{
	 *     pretty?: bool, // Pretty format the returned JSON response. (DEFAULT: false)
	 *     human?: bool, // Return human readable values for statistics. (DEFAULT: true)
	 *     error_trace?: bool, // Include the stack trace of returned errors. (DEFAULT: false)
	 *     source?: string, // The URL-encoded request definition. Useful for libraries that do not accept a request body for non-POST requests.
	 *     filter_path?: string|array<string>, // A comma-separated list of filters used to reduce the response.
	 *     body: string|array<mixed>, // (REQUIRED) The detector. If body is a string must be a valid JSON.
	 * } $params
	 *
	 * @throws NoNodeAvailableException if all the hosts are offline
	 * @throws ClientResponseException if the status code of response is 4xx
	 * @throws ServerResponseException if the status code of response is 5xx
	 *
	 * @return Elasticsearch|Promise
	 */
	public function validateDetector(?array $params = null)
	{
		$params = $params ?? [];
		$this->checkRequiredParameters(['body'], $params);
		$url = '/_ml/anomaly_detectors/_validate/detector';
		$method = 'POST';

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, [], $request, 'ml.validate_detector');
		return $this->client->sendRequest($request);
	}
}
