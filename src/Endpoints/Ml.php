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
	 * Clear the cached results from a trained model deployment
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/clear-trained-model-deployment-cache.html
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
	 * Closes one or more anomaly detection jobs. A job can be opened and closed multiple times throughout its lifecycle.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-close-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job to close
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 *     force?: bool, // True if the job should be forcefully closed
	 *     timeout?: int|string, // Controls the time to wait until a job has closed. Default to 30 minutes
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
	 * Deletes a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-calendar.html
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
	 * Deletes scheduled events from a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-calendar-event.html
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
	 * Deletes anomaly detection jobs from a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-calendar-job.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     job_id: string, // (REQUIRED) The ID of the job to remove from the calendar
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
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']) . '/jobs/' . $this->encode($params['job_id']);
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
	 * Deletes an existing data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to delete
	 *     force?: bool, // True if the job should be forcefully deleted
	 *     timeout?: int|string, // Controls the time to wait until a job is deleted. Defaults to 1 minute
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
	 * Deletes an existing datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to delete
	 *     force?: bool, // True if the datafeed should be forcefully deleted
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
	 * Deletes expired and unused machine learning data.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-expired-data.html
	 *
	 * @param array{
	 *     job_id?: string, // The ID of the job(s) to perform expired data hygiene for
	 *     requests_per_second?: int, // The desired requests per second for the deletion processes.
	 *     timeout?: int|string, // How long can the underlying delete processes run until they are canceled
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
	 * Deletes a filter.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-filter.html
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
	 * Deletes forecasts from a machine learning job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-forecast.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job from which to delete forecasts
	 *     forecast_id?: string, // The ID of the forecast to delete, can be comma delimited list. Leaving blank implies `_all`
	 *     allow_no_forecasts?: bool, // Whether to ignore if `_all` matches no forecasts
	 *     timeout?: int|string, // Controls the time to wait until the forecast(s) are deleted. Default to 30 seconds
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
	 * Deletes an existing anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to delete
	 *     force?: bool, // True if the job should be forcefully deleted
	 *     wait_for_completion?: bool, // Should this request wait until the operation has completed before returning
	 *     delete_user_annotations?: bool, // Should annotations added by the user be deleted
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
	 * Deletes an existing model snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-delete-snapshot.html
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
	 * Deletes an existing trained inference model that is currently not referenced by an ingest pipeline.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-trained-models.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained model to delete
	 *     timeout?: int|string, // Controls the amount of time to wait for the model to be deleted.
	 *     force?: bool, // True if the model should be forcefully deleted
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
	 * Deletes a model alias that refers to the trained model
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/delete-trained-models-aliases.html
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
	 * Estimates the model memory
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-apis.html
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
	 * Evaluates the data frame analytics for an annotated index.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/evaluate-dfanalytics.html
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
	 * Explains a data frame analytics config.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/explain-dfanalytics.html
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
	 * Forces any buffered data to be processed by the job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-flush-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job to flush
	 *     calc_interim?: bool, // Calculates interim results for the most recent bucket or all buckets within the latency period
	 *     start?: string, // When used in conjunction with calc_interim, specifies the range of buckets on which to calculate interim results
	 *     end?: string, // When used in conjunction with calc_interim, specifies the range of buckets on which to calculate interim results
	 *     advance_time?: string, // Advances time to the given value generating results and updating the model for the advanced interval
	 *     skip_time?: string, // Skips time to the given value without generating results or updating the model for the skipped interval
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
	 * Predicts the future behavior of a time series by using its historical behavior.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-forecast.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to forecast for
	 *     duration?: int|string, // The duration of the forecast
	 *     expires_in?: int|string, // The time interval after which the forecast expires. Expired forecasts will be deleted at the first opportunity.
	 *     max_model_memory?: string, // The max memory able to be used by the forecast. Default is 20mb.
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
	 * Retrieves anomaly detection job results for one or more buckets.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-bucket.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) ID of the job to get bucket results from
	 *     timestamp?: string, // The timestamp of the desired single bucket result
	 *     expand?: bool, // Include anomaly records
	 *     exclude_interim?: bool, // Exclude interim results
	 *     from?: int, // skips a number of buckets
	 *     size?: int, // specifies a max number of buckets to get
	 *     start?: string, // Start time filter for buckets
	 *     end?: string, // End time filter for buckets
	 *     anomaly_score?: float, // Filter for the most anomalous buckets
	 *     sort?: string, // Sort buckets by a particular field
	 *     desc?: bool, // Set the sort direction
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
	 * Retrieves information about the scheduled events in calendars.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-calendar-event.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar containing the events
	 *     job_id?: string, // Get events for the job. When this option is used calendar_id must be '_all'
	 *     start?: string, // Get events after this time
	 *     end?: string, // Get events before this time
	 *     from?: int, // Skips a number of events
	 *     size?: int, // Specifies a max number of events to get
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
	 * Retrieves configuration information for calendars.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-calendar.html
	 *
	 * @param array{
	 *     calendar_id?: string, // The ID of the calendar to fetch
	 *     from?: int, // skips a number of calendars
	 *     size?: int, // specifies a max number of calendars to get
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
	 * Retrieves anomaly detection job results for one or more categories.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-category.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job
	 *     category_id?: int, // The identifier of the category definition of interest
	 *     from?: int, // skips a number of categories
	 *     size?: int, // specifies a max number of categories to get
	 *     partition_field_value?: string, // Specifies the partition to retrieve categories for. This is optional, and should never be used for jobs where per-partition categorization is disabled.
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
	 * Retrieves configuration information for data frame analytics jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-dfanalytics.html
	 *
	 * @param array{
	 *     id?: string, // The ID of the data frame analytics to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no data frame analytics. (This includes `_all` string or when no data frame analytics have been specified)
	 *     from?: int, // skips a number of analytics
	 *     size?: int, // specifies a max number of analytics to get
	 *     exclude_generated?: bool, // Omits fields that are illegal to set on data frame analytics PUT
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
	 * Retrieves usage information for data frame analytics jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-dfanalytics-stats.html
	 *
	 * @param array{
	 *     id?: string, // The ID of the data frame analytics stats to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no data frame analytics. (This includes `_all` string or when no data frame analytics have been specified)
	 *     from?: int, // skips a number of analytics
	 *     size?: int, // specifies a max number of analytics to get
	 *     verbose?: bool, // whether the stats response should be verbose
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
	 * Retrieves usage information for datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed-stats.html
	 *
	 * @param array{
	 *     datafeed_id?: string, // The ID of the datafeeds stats to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
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
			$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']) . '/_stats';
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
	 * Retrieves configuration information for datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id?: string, // The ID of the datafeeds to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     exclude_generated?: bool, // Omits fields that are illegal to set on datafeed PUT
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
			$url = '/_ml/datafeeds/' . $this->encode($params['datafeed_id']);
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
	 * Retrieves filters.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-filter.html
	 *
	 * @param array{
	 *     filter_id?: string, // The ID of the filter to fetch
	 *     from?: int, // skips a number of filters
	 *     size?: int, // specifies a max number of filters to get
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
			$url = '/_ml/filters/' . $this->encode($params['filter_id']);
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
	 * Retrieves anomaly detection job results for one or more influencers.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-influencer.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) Identifier for the anomaly detection job
	 *     exclude_interim?: bool, // Exclude interim results
	 *     from?: int, // skips a number of influencers
	 *     size?: int, // specifies a max number of influencers to get
	 *     start?: string, // start timestamp for the requested influencers
	 *     end?: string, // end timestamp for the requested influencers
	 *     influencer_score?: float, // influencer score threshold for the requested influencers
	 *     sort?: string, // sort field for the requested influencers
	 *     desc?: bool, // whether the results should be sorted in decending order
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
	 * Retrieves usage information for anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job-stats.html
	 *
	 * @param array{
	 *     job_id?: string, // The ID of the jobs stats to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
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
	 * Retrieves configuration information for anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job.html
	 *
	 * @param array{
	 *     job_id?: string, // The ID of the jobs to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
	 *     exclude_generated?: bool, // Omits fields that are illegal to set on job PUT
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
			$url = '/_ml/anomaly_detectors/' . $this->encode($params['job_id']);
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
	 * Returns information on how ML is using memory.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-ml-memory.html
	 *
	 * @param array{
	 *     node_id?: string, // Specifies the node or nodes to retrieve stats for.
	 *     master_timeout?: int|string, // Explicit operation timeout for connection to master node
	 *     timeout?: int|string, // Explicit operation timeout
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
	 * Gets stats for anomaly detection job model snapshot upgrades that are in progress.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-job-model-snapshot-upgrade-stats.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job. May be a wildcard, comma separated list or `_all`.
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot. May be a wildcard, comma separated list or `_all`.
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no jobs or no snapshots. (This includes the `_all` string.)
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
	 * Retrieves information about model snapshots.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id?: string, // The ID of the snapshot to fetch
	 *     from?: int, // Skips a number of documents
	 *     size?: int, // The default number of documents returned in queries as a string.
	 *     start?: string, // The filter 'start' query parameter
	 *     end?: string, // The filter 'end' query parameter
	 *     sort?: string, // Name of the field to sort on
	 *     desc?: bool, // True if the results should be sorted in descending order
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
	 * Retrieves overall bucket results that summarize the bucket results of multiple anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-overall-buckets.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The job IDs for which to calculate overall bucket results
	 *     top_n?: int, // The number of top job bucket scores to be used in the overall_score calculation
	 *     bucket_span?: string, // The span of the overall buckets. Defaults to the longest job bucket_span
	 *     overall_score?: float, // Returns overall buckets with overall scores higher than this value
	 *     exclude_interim?: bool, // If true overall buckets that include interim buckets will be excluded
	 *     start?: string, // Returns overall buckets with timestamps after this time
	 *     end?: string, // Returns overall buckets with timestamps earlier than this time
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no jobs. (This includes `_all` string or when no jobs have been specified)
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
	 * Retrieves anomaly records for an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-get-record.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job
	 *     exclude_interim?: bool, // Exclude interim results
	 *     from?: int, // skips a number of records
	 *     size?: int, // specifies a max number of records to get
	 *     start?: string, // Start time filter for records
	 *     end?: string, // End time filter for records
	 *     record_score?: float, // Returns records with anomaly scores greater or equal than this value
	 *     sort?: string, // Sort records by a particular field
	 *     desc?: bool, // Set the sort direction
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
	 * Retrieves configuration information for a trained inference model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-trained-models.html
	 *
	 * @param array{
	 *     model_id?: string, // The ID of the trained models to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified)
	 *     include?: string, // A comma-separate list of fields to optionally include. Valid options are 'definition' and 'total_feature_importance'. Default is none.
	 *     include_model_definition?: bool, // Should the full model definition be included in the results. These definitions can be large. So be cautious when including them. Defaults to false.
	 *     decompress_definition?: bool, // Should the model definition be decompressed into valid JSON or returned in a custom compressed format. Defaults to true.
	 *     from?: int, // skips a number of trained models
	 *     size?: int, // specifies a max number of trained models to get
	 *     tags?: string|array<string>, // A comma-separated list of tags that the model must have.
	 *     exclude_generated?: bool, // Omits fields that are illegal to set on model PUT
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
			$url = '/_ml/trained_models/' . $this->encode($params['model_id']);
			$method = 'GET';
		} else {
			$url = '/_ml/trained_models';
			$method = 'GET';
		}
		$url = $this->addQueryString($url, $params, ['allow_no_match','include','include_model_definition','decompress_definition','from','size','tags','exclude_generated','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['model_id'], $request, 'ml.get_trained_models');
		return $this->client->sendRequest($request);
	}


	/**
	 * Retrieves usage information for trained inference models.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-trained-models-stats.html
	 *
	 * @param array{
	 *     model_id?: string, // The ID of the trained models stats to fetch
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no trained models. (This includes `_all` string or when no trained models have been specified)
	 *     from?: int, // skips a number of trained models
	 *     size?: int, // specifies a max number of trained models to get
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
			$url = '/_ml/trained_models/' . $this->encode($params['model_id']) . '/_stats';
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
	 * Evaluate a trained model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/infer-trained-model.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     timeout?: int|string, // Controls the amount of time to wait for inference results.
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
	 * Returns defaults and limits used by machine learning.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/get-ml-info.html
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
	 * Opens one or more anomaly detection jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-open-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to open
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

		$url = $this->addQueryString($url, $params, ['pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['job_id'], $request, 'ml.open_job');
		return $this->client->sendRequest($request);
	}


	/**
	 * Posts scheduled events in a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-post-calendar-event.html
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
	 * Sends data to an anomaly detection job for analysis.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-post-data.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The name of the job receiving the data
	 *     reset_start?: string, // Optional parameter to specify the start of the bucket resetting range
	 *     reset_end?: string, // Optional parameter to specify the end of the bucket resetting range
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
	 * Previews that will be analyzed given a data frame analytics config.
	 *
	 * @see http://www.elastic.co/guide/en/elasticsearch/reference/current/preview-dfanalytics.html
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
	 * Previews a datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-preview-datafeed.html
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
	 * Instantiates a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-calendar.html
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
	 * Adds an anomaly detection job to a calendar.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-calendar-job.html
	 *
	 * @param array{
	 *     calendar_id: string, // (REQUIRED) The ID of the calendar to modify
	 *     job_id: string, // (REQUIRED) The ID of the job to add to the calendar
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
		$url = '/_ml/calendars/' . $this->encode($params['calendar_id']) . '/jobs/' . $this->encode($params['job_id']);
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
	 * Instantiates a data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-dfanalytics.html
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
	 * Instantiates a datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to create
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if the source indices expressions resolves to no concrete indices (default: true)
	 *     ignore_throttled?: bool, // Ignore indices that are marked as throttled (default: true)
	 *     expand_wildcards?: string, // Whether source index expressions should get expanded to open or closed indices (default: open)
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
	 * Instantiates a filter.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-filter.html
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
	 * Instantiates an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-put-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to create
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false). Only set if datafeed_config is provided.
	 *     allow_no_indices?: bool, // Ignore if the source indices expressions resolves to no concrete indices (default: true). Only set if datafeed_config is provided.
	 *     ignore_throttled?: bool, // Ignore indices that are marked as throttled (default: true). Only set if datafeed_config is provided.
	 *     expand_wildcards?: string, // Whether source index expressions should get expanded to open or closed indices (default: open). Only set if datafeed_config is provided.
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
	 * Creates an inference trained model.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-models.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The ID of the trained models to store
	 *     defer_definition_decompression?: bool, // If set to `true` and a `compressed_definition` is provided, the request defers definition decompression and skips relevant validations.
	 *     wait_for_completion?: bool, // Whether to wait for all child operations(e.g. model download) to complete, before returning or not. Default to false
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
	 * Creates a new model alias (or reassigns an existing one) to refer to the trained model
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-models-aliases.html
	 *
	 * @param array{
	 *     model_alias: string, // (REQUIRED) The trained model alias to update
	 *     model_id: string, // (REQUIRED) The trained model where the model alias should be assigned
	 *     reassign?: bool, // If the model_alias already exists and points to a separate model_id, this parameter must be true. Defaults to false.
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
	 * Creates part of a trained model definition
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-model-definition-part.html
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
	 * Creates a trained model vocabulary
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/put-trained-model-vocabulary.html
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
	 * Resets an existing anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-reset-job.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to reset
	 *     wait_for_completion?: bool, // Should this request wait until the operation has completed before returning
	 *     delete_user_annotations?: bool, // Should annotations added by the user be deleted
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
	 * Reverts to a specific snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-revert-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job to fetch
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot to revert to
	 *     delete_intervening_results?: bool, // Should we reset the results back to the time of the snapshot?
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
	 * Sets a cluster wide upgrade_mode setting that prepares machine learning indices for an upgrade.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-set-upgrade-mode.html
	 *
	 * @param array{
	 *     enabled?: bool, // Whether to enable upgrade_mode ML setting or not. Defaults to false.
	 *     timeout?: int|string, // Controls the time to wait before action times out. Defaults to 30 seconds
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
	 * Starts a data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/start-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to start
	 *     timeout?: int|string, // Controls the time to wait until the task has started. Defaults to 20 seconds
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
	 * Starts one or more datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-start-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to start
	 *     start?: string, // The start time from where the datafeed should begin
	 *     end?: string, // The end time when the datafeed should stop. When not set, the datafeed continues in real time
	 *     timeout?: int|string, // Controls the time to wait until a datafeed has started. Default to 20 seconds
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
	 * Start a trained model deployment.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/start-trained-model-deployment.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     cache_size?: string, // A byte-size value for configuring the inference cache size. For example, 20mb.
	 *     deployment_id?: string, // The Id of the new deployment. Defaults to the model_id if not set.
	 *     number_of_allocations?: int, // The total number of allocations this model is assigned across machine learning nodes.
	 *     threads_per_allocation?: int, // The number of threads used by each model allocation during inference.
	 *     priority?: string, // The deployment priority.
	 *     queue_capacity?: int, // Controls how many inference requests are allowed in the queue at a time.
	 *     timeout?: int|string, // Controls the amount of time to wait for the model to deploy.
	 *     wait_for?: string, // The allocation status for which to wait
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
	 * Stops one or more data frame analytics jobs.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/stop-dfanalytics.html
	 *
	 * @param array{
	 *     id: string, // (REQUIRED) The ID of the data frame analytics to stop
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no data frame analytics. (This includes `_all` string or when no data frame analytics have been specified)
	 *     force?: bool, // True if the data frame analytics should be forcefully stopped
	 *     timeout?: int|string, // Controls the time to wait until the task has stopped. Defaults to 20 seconds
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
	 * Stops one or more datafeeds.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-stop-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to stop
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     allow_no_datafeeds?: bool, // Whether to ignore if a wildcard expression matches no datafeeds. (This includes `_all` string or when no datafeeds have been specified)
	 *     force?: bool, // True if the datafeed should be forcefully stopped.
	 *     timeout?: int|string, // Controls the time to wait until a datafeed has stopped. Default to 20 seconds
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

		$url = $this->addQueryString($url, $params, ['allow_no_match','allow_no_datafeeds','force','timeout','pretty','human','error_trace','source','filter_path']);
		$headers = [
			'Accept' => 'application/json',
			'Content-Type' => 'application/json',
		];
		$request = $this->createRequest($method, $url, $headers, $params['body'] ?? null);
		$request = $this->addOtelAttributes($params, ['datafeed_id'], $request, 'ml.stop_datafeed');
		return $this->client->sendRequest($request);
	}


	/**
	 * Stop a trained model deployment.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/master/stop-trained-model-deployment.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     allow_no_match?: bool, // Whether to ignore if a wildcard expression matches no deployments. (This includes `_all` string or when no deployments have been specified)
	 *     force?: bool, // True if the deployment should be forcefully stopped
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
	 * Updates certain properties of a data frame analytics job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-dfanalytics.html
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
	 * Updates certain properties of a datafeed.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-datafeed.html
	 *
	 * @param array{
	 *     datafeed_id: string, // (REQUIRED) The ID of the datafeed to update
	 *     ignore_unavailable?: bool, // Ignore unavailable indexes (default: false)
	 *     allow_no_indices?: bool, // Ignore if the source indices expressions resolves to no concrete indices (default: true)
	 *     ignore_throttled?: bool, // Ignore indices that are marked as throttled (default: true)
	 *     expand_wildcards?: string, // Whether source index expressions should get expanded to open or closed indices (default: open)
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
	 * Updates the description of a filter, adds items, or removes items.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-filter.html
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
	 * Updates certain properties of an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-job.html
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
	 * Updates certain properties of a snapshot.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-update-snapshot.html
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
	 * Updates certain properties of trained model deployment.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/update-trained-model-deployment.html
	 *
	 * @param array{
	 *     model_id: string, // (REQUIRED) The unique identifier of the trained model.
	 *     number_of_allocations?: int, // Update the model deployment to this number of allocations.
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
	 * Upgrades a given job snapshot to the current major version.
	 *
	 * @see https://www.elastic.co/guide/en/elasticsearch/reference/current/ml-upgrade-job-model-snapshot.html
	 *
	 * @param array{
	 *     job_id: string, // (REQUIRED) The ID of the job
	 *     snapshot_id: string, // (REQUIRED) The ID of the snapshot
	 *     timeout?: int|string, // How long should the API wait for the job to be opened and the old snapshot to be loaded.
	 *     wait_for_completion?: bool, // Should the request wait until the task is complete before responding to the caller. Default is false.
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
	 * Validates an anomaly detection job.
	 *
	 * @see https://www.elastic.co/guide/en/machine-learning/current/ml-jobs.html
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
	 * Validates an anomaly detection detector.
	 *
	 * @see https://www.elastic.co/guide/en/machine-learning/current/ml-jobs.html
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
