<?php

declare(strict_types = 1);

namespace Elasticsearch\Tests;

class Utility
{
    public static function getHost(): ?string
    {
        switch (getenv('TEST_SUITE')) {
            case 'oss':
                return 'http://localhost:9200';
            case 'xpack':
                return 'https://elastic:changeme@localhost:9200';
        }
        return null;
    }
}
