<?php
/**
 * Elasticsearch PHP client
 *
 * @link      https://github.com/elastic/elasticsearch-php/
 * @copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * @license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * @license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */


declare(strict_types = 1);

namespace Elasticsearch\Tests\Endpoints;

use Elasticsearch\Endpoints\AbstractEndpoint;

class AbstractEndpointTest extends \PHPUnit\Framework\TestCase
{
    private $endpoint;

    public static function invalidParameters(): array
    {
        return [
            [['invalid' => 10]],
            [['invalid' => 10, 'invalid2' => 'another']],
        ];
    }

    /**
     * @dataProvider invalidParameters
     */
    public function testInvalidParamsCauseErrorsWhenProvidedToSetParams(array $params)
    {
        $this->endpoint->expects($this->once())
            ->method('getParamWhitelist')
            ->willReturn(['one', 'two']);

        $this->expectException(\Elasticsearch\Common\Exceptions\UnexpectedValueException::class);

        $this->endpoint->setParams($params);
    }

    protected function setUp(): void
    {
        $this->endpoint = $this->getMockForAbstractClass(AbstractEndpoint::class);
    }
}
