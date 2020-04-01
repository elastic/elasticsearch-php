<?php
declare(strict_types = 1);

namespace Elasticsearch\Endpoints\Ml;

use Elasticsearch\Common\Exceptions\InvalidArgumentException;
use Elasticsearch\Endpoints\AbstractEndpoint;
use Elasticsearch\Serializers\SerializerInterface;
use Traversable;

/**
 * Class FindFileStructure
 * Elasticsearch API name ml.find_file_structure
 * Generated running $ php util/GenerateEndpoints.php 7.7
 *
 * @category Elasticsearch
 * @package  Elasticsearch\Endpoints\Ml
 * @author   Enrico Zimuel <enrico.zimuel@elastic.co>
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 */
class FindFileStructure extends AbstractEndpoint
{

    public function __construct(SerializerInterface $serializer)
    {
        $this->serializer = $serializer;
    }

    public function getURI(): string
    {

        return "/_ml/find_file_structure";
    }

    public function getParamWhitelist(): array
    {
        return [
            'lines_to_sample',
            'line_merge_size_limit',
            'timeout',
            'charset',
            'format',
            'has_header_row',
            'column_names',
            'delimiter',
            'quote',
            'should_trim_fields',
            'grok_pattern',
            'timestamp_field',
            'timestamp_format',
            'explain'
        ];
    }

    public function getMethod(): string
    {
        return 'POST';
    }
    
    public function setBody($body): FindFileStructure
    {
        if (isset($body) !== true) {
            return $this;
        }
        if (is_array($body) === true || $body instanceof Traversable) {
            foreach ($body as $item) {
                $this->body .= $this->serializer->serialize($item) . "\n";
            }
        } elseif (is_string($body)) {
            $this->body = $body;
            if (substr($body, -1) != "\n") {
                $this->body .= "\n";
            }
        } else {
            throw new InvalidArgumentException("Body must be an array, traversable object or string");
        }
        return $this;
    }
}
