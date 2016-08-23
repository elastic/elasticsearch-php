<?php

namespace Elasticsearch\Common\Exceptions;

use Http\Client\Exception\HttpException as BaseHttpException;

class HttpException extends BaseHttpException implements ElasticsearchException
{
}
