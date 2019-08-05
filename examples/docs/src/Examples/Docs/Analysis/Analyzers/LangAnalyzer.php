<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Analysis\Analyzers;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: LangAnalyzer
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   analysis/analyzers/lang-analyzer.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class LangAnalyzer extends SimpleExamplesTester {

    /**
     * Tag:  137c62a4443bdd7d5b95a15022a9dc30
     * Line: 80
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL80_137c62a4443bdd7d5b95a15022a9dc30()
    {
        $client = $this->getClient();
        // tag::137c62a4443bdd7d5b95a15022a9dc30[]
        // TODO -- Implement Example
        // PUT /arabic_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "arabic_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_arabic_" \<1>
        //         },
        //         "arabic_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["مثال"] \<2>
        //         },
        //         "arabic_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "arabic"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_arabic": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "decimal_digit",
        //             "arabic_stop",
        //             "arabic_normalization",
        //             "arabic_keywords",
        //             "arabic_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::137c62a4443bdd7d5b95a15022a9dc30[]

        $curl = 'PUT /arabic_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "arabic_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_arabic_" \<1>'
              . '        },'
              . '        "arabic_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["مثال"] \<2>'
              . '        },'
              . '        "arabic_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "arabic"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_arabic": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "decimal_digit",'
              . '            "arabic_stop",'
              . '            "arabic_normalization",'
              . '            "arabic_keywords",'
              . '            "arabic_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f7dc2fed08e57abda2c3e8a14f8eb098
     * Line: 130
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL130_f7dc2fed08e57abda2c3e8a14f8eb098()
    {
        $client = $this->getClient();
        // tag::f7dc2fed08e57abda2c3e8a14f8eb098[]
        // TODO -- Implement Example
        // PUT /armenian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "armenian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_armenian_" \<1>
        //         },
        //         "armenian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["օրինակ"] \<2>
        //         },
        //         "armenian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "armenian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_armenian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "armenian_stop",
        //             "armenian_keywords",
        //             "armenian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f7dc2fed08e57abda2c3e8a14f8eb098[]

        $curl = 'PUT /armenian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "armenian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_armenian_" \<1>'
              . '        },'
              . '        "armenian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["օրինակ"] \<2>'
              . '        },'
              . '        "armenian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "armenian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_armenian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "armenian_stop",'
              . '            "armenian_keywords",'
              . '            "armenian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  01f50acf7998b24969f451e922d145eb
     * Line: 178
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL178_01f50acf7998b24969f451e922d145eb()
    {
        $client = $this->getClient();
        // tag::01f50acf7998b24969f451e922d145eb[]
        // TODO -- Implement Example
        // PUT /basque_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "basque_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_basque_" \<1>
        //         },
        //         "basque_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["Adibidez"] \<2>
        //         },
        //         "basque_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "basque"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_basque": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "basque_stop",
        //             "basque_keywords",
        //             "basque_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::01f50acf7998b24969f451e922d145eb[]

        $curl = 'PUT /basque_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "basque_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_basque_" \<1>'
              . '        },'
              . '        "basque_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["Adibidez"] \<2>'
              . '        },'
              . '        "basque_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "basque"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_basque": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "basque_stop",'
              . '            "basque_keywords",'
              . '            "basque_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  496d35c89dc991a1509f7e8fb93ade45
     * Line: 226
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL226_496d35c89dc991a1509f7e8fb93ade45()
    {
        $client = $this->getClient();
        // tag::496d35c89dc991a1509f7e8fb93ade45[]
        // TODO -- Implement Example
        // PUT /bengali_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "bengali_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_bengali_" \<1>
        //         },
        //         "bengali_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["উদাহরণ"] \<2>
        //         },
        //         "bengali_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "bengali"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_bengali": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "decimal_digit",
        //             "bengali_keywords",
        //             "indic_normalization",
        //             "bengali_normalization",
        //             "bengali_stop",
        //             "bengali_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::496d35c89dc991a1509f7e8fb93ade45[]

        $curl = 'PUT /bengali_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "bengali_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_bengali_" \<1>'
              . '        },'
              . '        "bengali_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["উদাহরণ"] \<2>'
              . '        },'
              . '        "bengali_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "bengali"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_bengali": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "decimal_digit",'
              . '            "bengali_keywords",'
              . '            "indic_normalization",'
              . '            "bengali_normalization",'
              . '            "bengali_stop",'
              . '            "bengali_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  13670d1534125831c2059eebd86d840c
     * Line: 277
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL277_13670d1534125831c2059eebd86d840c()
    {
        $client = $this->getClient();
        // tag::13670d1534125831c2059eebd86d840c[]
        // TODO -- Implement Example
        // PUT /brazilian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "brazilian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_brazilian_" \<1>
        //         },
        //         "brazilian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["exemplo"] \<2>
        //         },
        //         "brazilian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "brazilian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_brazilian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "brazilian_stop",
        //             "brazilian_keywords",
        //             "brazilian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::13670d1534125831c2059eebd86d840c[]

        $curl = 'PUT /brazilian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "brazilian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_brazilian_" \<1>'
              . '        },'
              . '        "brazilian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["exemplo"] \<2>'
              . '        },'
              . '        "brazilian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "brazilian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_brazilian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "brazilian_stop",'
              . '            "brazilian_keywords",'
              . '            "brazilian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d0378fe5e3aad05a2fd2e6e81213374f
     * Line: 325
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL325_d0378fe5e3aad05a2fd2e6e81213374f()
    {
        $client = $this->getClient();
        // tag::d0378fe5e3aad05a2fd2e6e81213374f[]
        // TODO -- Implement Example
        // PUT /bulgarian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "bulgarian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_bulgarian_" \<1>
        //         },
        //         "bulgarian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["пример"] \<2>
        //         },
        //         "bulgarian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "bulgarian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_bulgarian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "bulgarian_stop",
        //             "bulgarian_keywords",
        //             "bulgarian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d0378fe5e3aad05a2fd2e6e81213374f[]

        $curl = 'PUT /bulgarian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "bulgarian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_bulgarian_" \<1>'
              . '        },'
              . '        "bulgarian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["пример"] \<2>'
              . '        },'
              . '        "bulgarian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "bulgarian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_bulgarian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "bulgarian_stop",'
              . '            "bulgarian_keywords",'
              . '            "bulgarian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d5f3be3b9edf0119fa19e5693cfac05a
     * Line: 373
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL373_d5f3be3b9edf0119fa19e5693cfac05a()
    {
        $client = $this->getClient();
        // tag::d5f3be3b9edf0119fa19e5693cfac05a[]
        // TODO -- Implement Example
        // PUT /catalan_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "catalan_elision": {
        //           "type":       "elision",
        //           "articles":   [ "d", "l", "m", "n", "s", "t"],
        //           "articles_case": true
        //         },
        //         "catalan_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_catalan_" \<1>
        //         },
        //         "catalan_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["exemple"] \<2>
        //         },
        //         "catalan_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "catalan"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_catalan": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "catalan_elision",
        //             "lowercase",
        //             "catalan_stop",
        //             "catalan_keywords",
        //             "catalan_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d5f3be3b9edf0119fa19e5693cfac05a[]

        $curl = 'PUT /catalan_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "catalan_elision": {'
              . '          "type":       "elision",'
              . '          "articles":   [ "d", "l", "m", "n", "s", "t"],'
              . '          "articles_case": true'
              . '        },'
              . '        "catalan_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_catalan_" \<1>'
              . '        },'
              . '        "catalan_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["exemple"] \<2>'
              . '        },'
              . '        "catalan_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "catalan"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_catalan": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "catalan_elision",'
              . '            "lowercase",'
              . '            "catalan_stop",'
              . '            "catalan_keywords",'
              . '            "catalan_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d305110a8cabfbebd1e38d85559d1023
     * Line: 430
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL430_d305110a8cabfbebd1e38d85559d1023()
    {
        $client = $this->getClient();
        // tag::d305110a8cabfbebd1e38d85559d1023[]
        // TODO -- Implement Example
        // PUT /cjk_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "english_stop": {
        //           "type":       "stop",
        //           "stopwords":  [ \<1>
        //             "a", "and", "are", "as", "at", "be", "but", "by", "for",
        //             "if", "in", "into", "is", "it", "no", "not", "of", "on",
        //             "or", "s", "such", "t", "that", "the", "their", "then",
        //             "there", "these", "they", "this", "to", "was", "will",
        //             "with", "www"
        //           ]
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_cjk": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "cjk_width",
        //             "lowercase",
        //             "cjk_bigram",
        //             "english_stop"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d305110a8cabfbebd1e38d85559d1023[]

        $curl = 'PUT /cjk_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "english_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  [ \<1>'
              . '            "a", "and", "are", "as", "at", "be", "but", "by", "for",'
              . '            "if", "in", "into", "is", "it", "no", "not", "of", "on",'
              . '            "or", "s", "such", "t", "that", "the", "their", "then",'
              . '            "there", "these", "they", "this", "to", "was", "will",'
              . '            "with", "www"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_cjk": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "cjk_width",'
              . '            "lowercase",'
              . '            "cjk_bigram",'
              . '            "english_stop"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a28111cdd9b5aaea96c779cbfbf38780
     * Line: 476
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL476_a28111cdd9b5aaea96c779cbfbf38780()
    {
        $client = $this->getClient();
        // tag::a28111cdd9b5aaea96c779cbfbf38780[]
        // TODO -- Implement Example
        // PUT /czech_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "czech_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_czech_" \<1>
        //         },
        //         "czech_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["příklad"] \<2>
        //         },
        //         "czech_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "czech"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_czech": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "czech_stop",
        //             "czech_keywords",
        //             "czech_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::a28111cdd9b5aaea96c779cbfbf38780[]

        $curl = 'PUT /czech_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "czech_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_czech_" \<1>'
              . '        },'
              . '        "czech_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["příklad"] \<2>'
              . '        },'
              . '        "czech_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "czech"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_czech": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "czech_stop",'
              . '            "czech_keywords",'
              . '            "czech_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  ed85ed833bec7286a0dfbe64077c5715
     * Line: 524
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL524_ed85ed833bec7286a0dfbe64077c5715()
    {
        $client = $this->getClient();
        // tag::ed85ed833bec7286a0dfbe64077c5715[]
        // TODO -- Implement Example
        // PUT /danish_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "danish_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_danish_" \<1>
        //         },
        //         "danish_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["eksempel"] \<2>
        //         },
        //         "danish_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "danish"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_danish": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "danish_stop",
        //             "danish_keywords",
        //             "danish_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::ed85ed833bec7286a0dfbe64077c5715[]

        $curl = 'PUT /danish_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "danish_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_danish_" \<1>'
              . '        },'
              . '        "danish_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["eksempel"] \<2>'
              . '        },'
              . '        "danish_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "danish"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_danish": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "danish_stop",'
              . '            "danish_keywords",'
              . '            "danish_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  10d8b17e73d31dcd907de67327ed78a2
     * Line: 572
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL572_10d8b17e73d31dcd907de67327ed78a2()
    {
        $client = $this->getClient();
        // tag::10d8b17e73d31dcd907de67327ed78a2[]
        // TODO -- Implement Example
        // PUT /dutch_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "dutch_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_dutch_" \<1>
        //         },
        //         "dutch_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["voorbeeld"] \<2>
        //         },
        //         "dutch_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "dutch"
        //         },
        //         "dutch_override": {
        //           "type":       "stemmer_override",
        //           "rules": [
        //             "fiets=>fiets",
        //             "bromfiets=>bromfiets",
        //             "ei=>eier",
        //             "kind=>kinder"
        //           ]
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_dutch": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "dutch_stop",
        //             "dutch_keywords",
        //             "dutch_override",
        //             "dutch_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::10d8b17e73d31dcd907de67327ed78a2[]

        $curl = 'PUT /dutch_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "dutch_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_dutch_" \<1>'
              . '        },'
              . '        "dutch_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["voorbeeld"] \<2>'
              . '        },'
              . '        "dutch_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "dutch"'
              . '        },'
              . '        "dutch_override": {'
              . '          "type":       "stemmer_override",'
              . '          "rules": ['
              . '            "fiets=>fiets",'
              . '            "bromfiets=>bromfiets",'
              . '            "ei=>eier",'
              . '            "kind=>kinder"'
              . '          ]'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_dutch": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "dutch_stop",'
              . '            "dutch_keywords",'
              . '            "dutch_override",'
              . '            "dutch_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  81c7a392efd505b686eed978fb7d9d17
     * Line: 630
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL630_81c7a392efd505b686eed978fb7d9d17()
    {
        $client = $this->getClient();
        // tag::81c7a392efd505b686eed978fb7d9d17[]
        // TODO -- Implement Example
        // PUT /english_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "english_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_english_" \<1>
        //         },
        //         "english_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["example"] \<2>
        //         },
        //         "english_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "english"
        //         },
        //         "english_possessive_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "possessive_english"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_english": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "english_possessive_stemmer",
        //             "lowercase",
        //             "english_stop",
        //             "english_keywords",
        //             "english_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::81c7a392efd505b686eed978fb7d9d17[]

        $curl = 'PUT /english_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "english_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_english_" \<1>'
              . '        },'
              . '        "english_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["example"] \<2>'
              . '        },'
              . '        "english_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "english"'
              . '        },'
              . '        "english_possessive_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "possessive_english"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_english": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "english_possessive_stemmer",'
              . '            "lowercase",'
              . '            "english_stop",'
              . '            "english_keywords",'
              . '            "english_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  85f0e5e8ab91ceab63c21dbedd9f4037
     * Line: 683
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL683_85f0e5e8ab91ceab63c21dbedd9f4037()
    {
        $client = $this->getClient();
        // tag::85f0e5e8ab91ceab63c21dbedd9f4037[]
        // TODO -- Implement Example
        // PUT /finnish_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "finnish_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_finnish_" \<1>
        //         },
        //         "finnish_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["esimerkki"] \<2>
        //         },
        //         "finnish_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "finnish"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_finnish": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "finnish_stop",
        //             "finnish_keywords",
        //             "finnish_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::85f0e5e8ab91ceab63c21dbedd9f4037[]

        $curl = 'PUT /finnish_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "finnish_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_finnish_" \<1>'
              . '        },'
              . '        "finnish_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["esimerkki"] \<2>'
              . '        },'
              . '        "finnish_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "finnish"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_finnish": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "finnish_stop",'
              . '            "finnish_keywords",'
              . '            "finnish_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  e5498c139ce9053805c8931334ee324e
     * Line: 731
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL731_e5498c139ce9053805c8931334ee324e()
    {
        $client = $this->getClient();
        // tag::e5498c139ce9053805c8931334ee324e[]
        // TODO -- Implement Example
        // PUT /french_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "french_elision": {
        //           "type":         "elision",
        //           "articles_case": true,
        //           "articles": [
        //               "l", "m", "t", "qu", "n", "s",
        //               "j", "d", "c", "jusqu", "quoiqu",
        //               "lorsqu", "puisqu"
        //             ]
        //         },
        //         "french_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_french_" \<1>
        //         },
        //         "french_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["Exemple"] \<2>
        //         },
        //         "french_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "light_french"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_french": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "french_elision",
        //             "lowercase",
        //             "french_stop",
        //             "french_keywords",
        //             "french_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::e5498c139ce9053805c8931334ee324e[]

        $curl = 'PUT /french_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "french_elision": {'
              . '          "type":         "elision",'
              . '          "articles_case": true,'
              . '          "articles": ['
              . '              "l", "m", "t", "qu", "n", "s",'
              . '              "j", "d", "c", "jusqu", "quoiqu",'
              . '              "lorsqu", "puisqu"'
              . '            ]'
              . '        },'
              . '        "french_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_french_" \<1>'
              . '        },'
              . '        "french_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["Exemple"] \<2>'
              . '        },'
              . '        "french_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "light_french"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_french": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "french_elision",'
              . '            "lowercase",'
              . '            "french_stop",'
              . '            "french_keywords",'
              . '            "french_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9606c271921cb800d5ea395b16d6ceaf
     * Line: 789
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL789_9606c271921cb800d5ea395b16d6ceaf()
    {
        $client = $this->getClient();
        // tag::9606c271921cb800d5ea395b16d6ceaf[]
        // TODO -- Implement Example
        // PUT /galician_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "galician_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_galician_" \<1>
        //         },
        //         "galician_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["exemplo"] \<2>
        //         },
        //         "galician_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "galician"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_galician": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "galician_stop",
        //             "galician_keywords",
        //             "galician_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::9606c271921cb800d5ea395b16d6ceaf[]

        $curl = 'PUT /galician_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "galician_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_galician_" \<1>'
              . '        },'
              . '        "galician_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["exemplo"] \<2>'
              . '        },'
              . '        "galician_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "galician"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_galician": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "galician_stop",'
              . '            "galician_keywords",'
              . '            "galician_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  187e8786e0a90f1f6278cf89b670de0a
     * Line: 837
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL837_187e8786e0a90f1f6278cf89b670de0a()
    {
        $client = $this->getClient();
        // tag::187e8786e0a90f1f6278cf89b670de0a[]
        // TODO -- Implement Example
        // PUT /german_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "german_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_german_" \<1>
        //         },
        //         "german_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["Beispiel"] \<2>
        //         },
        //         "german_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "light_german"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_german": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "german_stop",
        //             "german_keywords",
        //             "german_normalization",
        //             "german_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::187e8786e0a90f1f6278cf89b670de0a[]

        $curl = 'PUT /german_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "german_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_german_" \<1>'
              . '        },'
              . '        "german_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["Beispiel"] \<2>'
              . '        },'
              . '        "german_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "light_german"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_german": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "german_stop",'
              . '            "german_keywords",'
              . '            "german_normalization",'
              . '            "german_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1f00e73c144603e97f6c14ab15fa1913
     * Line: 886
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL886_1f00e73c144603e97f6c14ab15fa1913()
    {
        $client = $this->getClient();
        // tag::1f00e73c144603e97f6c14ab15fa1913[]
        // TODO -- Implement Example
        // PUT /greek_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "greek_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_greek_" \<1>
        //         },
        //         "greek_lowercase": {
        //           "type":       "lowercase",
        //           "language":   "greek"
        //         },
        //         "greek_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["παράδειγμα"] \<2>
        //         },
        //         "greek_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "greek"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_greek": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "greek_lowercase",
        //             "greek_stop",
        //             "greek_keywords",
        //             "greek_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::1f00e73c144603e97f6c14ab15fa1913[]

        $curl = 'PUT /greek_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "greek_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_greek_" \<1>'
              . '        },'
              . '        "greek_lowercase": {'
              . '          "type":       "lowercase",'
              . '          "language":   "greek"'
              . '        },'
              . '        "greek_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["παράδειγμα"] \<2>'
              . '        },'
              . '        "greek_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "greek"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_greek": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "greek_lowercase",'
              . '            "greek_stop",'
              . '            "greek_keywords",'
              . '            "greek_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  af00a58d9171d32f6efe52d94e51e526
     * Line: 938
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL938_af00a58d9171d32f6efe52d94e51e526()
    {
        $client = $this->getClient();
        // tag::af00a58d9171d32f6efe52d94e51e526[]
        // TODO -- Implement Example
        // PUT /hindi_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "hindi_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_hindi_" \<1>
        //         },
        //         "hindi_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["उदाहरण"] \<2>
        //         },
        //         "hindi_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "hindi"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_hindi": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "decimal_digit",
        //             "hindi_keywords",
        //             "indic_normalization",
        //             "hindi_normalization",
        //             "hindi_stop",
        //             "hindi_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::af00a58d9171d32f6efe52d94e51e526[]

        $curl = 'PUT /hindi_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "hindi_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_hindi_" \<1>'
              . '        },'
              . '        "hindi_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["उदाहरण"] \<2>'
              . '        },'
              . '        "hindi_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "hindi"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_hindi": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "decimal_digit",'
              . '            "hindi_keywords",'
              . '            "indic_normalization",'
              . '            "hindi_normalization",'
              . '            "hindi_stop",'
              . '            "hindi_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  84108653e9e03b4edacd878ec870df77
     * Line: 989
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL989_84108653e9e03b4edacd878ec870df77()
    {
        $client = $this->getClient();
        // tag::84108653e9e03b4edacd878ec870df77[]
        // TODO -- Implement Example
        // PUT /hungarian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "hungarian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_hungarian_" \<1>
        //         },
        //         "hungarian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["példa"] \<2>
        //         },
        //         "hungarian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "hungarian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_hungarian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "hungarian_stop",
        //             "hungarian_keywords",
        //             "hungarian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::84108653e9e03b4edacd878ec870df77[]

        $curl = 'PUT /hungarian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "hungarian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_hungarian_" \<1>'
              . '        },'
              . '        "hungarian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["példa"] \<2>'
              . '        },'
              . '        "hungarian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "hungarian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_hungarian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "hungarian_stop",'
              . '            "hungarian_keywords",'
              . '            "hungarian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  eb5987b58dae90c3a8a1609410be0570
     * Line: 1038
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1038_eb5987b58dae90c3a8a1609410be0570()
    {
        $client = $this->getClient();
        // tag::eb5987b58dae90c3a8a1609410be0570[]
        // TODO -- Implement Example
        // PUT /indonesian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "indonesian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_indonesian_" \<1>
        //         },
        //         "indonesian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["contoh"] \<2>
        //         },
        //         "indonesian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "indonesian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_indonesian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "indonesian_stop",
        //             "indonesian_keywords",
        //             "indonesian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::eb5987b58dae90c3a8a1609410be0570[]

        $curl = 'PUT /indonesian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "indonesian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_indonesian_" \<1>'
              . '        },'
              . '        "indonesian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["contoh"] \<2>'
              . '        },'
              . '        "indonesian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "indonesian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_indonesian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "indonesian_stop",'
              . '            "indonesian_keywords",'
              . '            "indonesian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  160f39a50847bad0be4be1529a95e4ce
     * Line: 1086
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1086_160f39a50847bad0be4be1529a95e4ce()
    {
        $client = $this->getClient();
        // tag::160f39a50847bad0be4be1529a95e4ce[]
        // TODO -- Implement Example
        // PUT /irish_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "irish_hyphenation": {
        //           "type":       "stop",
        //           "stopwords":  [ "h", "n", "t" ],
        //           "ignore_case": true
        //         },
        //         "irish_elision": {
        //           "type":       "elision",
        //           "articles":   [ "d", "m", "b" ],
        //           "articles_case": true
        //         },
        //         "irish_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_irish_" \<1>
        //         },
        //         "irish_lowercase": {
        //           "type":       "lowercase",
        //           "language":   "irish"
        //         },
        //         "irish_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["sampla"] \<2>
        //         },
        //         "irish_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "irish"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_irish": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "irish_hyphenation",
        //             "irish_elision",
        //             "irish_lowercase",
        //             "irish_stop",
        //             "irish_keywords",
        //             "irish_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::160f39a50847bad0be4be1529a95e4ce[]

        $curl = 'PUT /irish_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "irish_hyphenation": {'
              . '          "type":       "stop",'
              . '          "stopwords":  [ "h", "n", "t" ],'
              . '          "ignore_case": true'
              . '        },'
              . '        "irish_elision": {'
              . '          "type":       "elision",'
              . '          "articles":   [ "d", "m", "b" ],'
              . '          "articles_case": true'
              . '        },'
              . '        "irish_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_irish_" \<1>'
              . '        },'
              . '        "irish_lowercase": {'
              . '          "type":       "lowercase",'
              . '          "language":   "irish"'
              . '        },'
              . '        "irish_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["sampla"] \<2>'
              . '        },'
              . '        "irish_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "irish"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_irish": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "irish_hyphenation",'
              . '            "irish_elision",'
              . '            "irish_lowercase",'
              . '            "irish_stop",'
              . '            "irish_keywords",'
              . '            "irish_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  00e0c964c79fcc1876ab957da2ffce82
     * Line: 1150
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1150_00e0c964c79fcc1876ab957da2ffce82()
    {
        $client = $this->getClient();
        // tag::00e0c964c79fcc1876ab957da2ffce82[]
        // TODO -- Implement Example
        // PUT /italian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "italian_elision": {
        //           "type": "elision",
        //           "articles": [
        //                 "c", "l", "all", "dall", "dell",
        //                 "nell", "sull", "coll", "pell",
        //                 "gl", "agl", "dagl", "degl", "negl",
        //                 "sugl", "un", "m", "t", "s", "v", "d"
        //           ],
        //           "articles_case": true
        //         },
        //         "italian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_italian_" \<1>
        //         },
        //         "italian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["esempio"] \<2>
        //         },
        //         "italian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "light_italian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_italian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "italian_elision",
        //             "lowercase",
        //             "italian_stop",
        //             "italian_keywords",
        //             "italian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::00e0c964c79fcc1876ab957da2ffce82[]

        $curl = 'PUT /italian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "italian_elision": {'
              . '          "type": "elision",'
              . '          "articles": ['
              . '                "c", "l", "all", "dall", "dell",'
              . '                "nell", "sull", "coll", "pell",'
              . '                "gl", "agl", "dagl", "degl", "negl",'
              . '                "sugl", "un", "m", "t", "s", "v", "d"'
              . '          ],'
              . '          "articles_case": true'
              . '        },'
              . '        "italian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_italian_" \<1>'
              . '        },'
              . '        "italian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["esempio"] \<2>'
              . '        },'
              . '        "italian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "light_italian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_italian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "italian_elision",'
              . '            "lowercase",'
              . '            "italian_stop",'
              . '            "italian_keywords",'
              . '            "italian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d983c1ea730eeabac9e914656d7c9be2
     * Line: 1209
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1209_d983c1ea730eeabac9e914656d7c9be2()
    {
        $client = $this->getClient();
        // tag::d983c1ea730eeabac9e914656d7c9be2[]
        // TODO -- Implement Example
        // PUT /latvian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "latvian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_latvian_" \<1>
        //         },
        //         "latvian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["piemērs"] \<2>
        //         },
        //         "latvian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "latvian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_latvian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "latvian_stop",
        //             "latvian_keywords",
        //             "latvian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d983c1ea730eeabac9e914656d7c9be2[]

        $curl = 'PUT /latvian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "latvian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_latvian_" \<1>'
              . '        },'
              . '        "latvian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["piemērs"] \<2>'
              . '        },'
              . '        "latvian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "latvian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_latvian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "latvian_stop",'
              . '            "latvian_keywords",'
              . '            "latvian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  bb067c049331cc850a77b18bdfff81b5
     * Line: 1257
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1257_bb067c049331cc850a77b18bdfff81b5()
    {
        $client = $this->getClient();
        // tag::bb067c049331cc850a77b18bdfff81b5[]
        // TODO -- Implement Example
        // PUT /lithuanian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "lithuanian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_lithuanian_" \<1>
        //         },
        //         "lithuanian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["pavyzdys"] \<2>
        //         },
        //         "lithuanian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "lithuanian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_lithuanian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "lithuanian_stop",
        //             "lithuanian_keywords",
        //             "lithuanian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::bb067c049331cc850a77b18bdfff81b5[]

        $curl = 'PUT /lithuanian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "lithuanian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_lithuanian_" \<1>'
              . '        },'
              . '        "lithuanian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["pavyzdys"] \<2>'
              . '        },'
              . '        "lithuanian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "lithuanian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_lithuanian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "lithuanian_stop",'
              . '            "lithuanian_keywords",'
              . '            "lithuanian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  2731a8577ad734a732d784c5dcb1225d
     * Line: 1305
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1305_2731a8577ad734a732d784c5dcb1225d()
    {
        $client = $this->getClient();
        // tag::2731a8577ad734a732d784c5dcb1225d[]
        // TODO -- Implement Example
        // PUT /norwegian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "norwegian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_norwegian_" \<1>
        //         },
        //         "norwegian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["eksempel"] \<2>
        //         },
        //         "norwegian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "norwegian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_norwegian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "norwegian_stop",
        //             "norwegian_keywords",
        //             "norwegian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::2731a8577ad734a732d784c5dcb1225d[]

        $curl = 'PUT /norwegian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "norwegian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_norwegian_" \<1>'
              . '        },'
              . '        "norwegian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["eksempel"] \<2>'
              . '        },'
              . '        "norwegian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "norwegian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_norwegian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "norwegian_stop",'
              . '            "norwegian_keywords",'
              . '            "norwegian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d1a285aa244ec461d68f13e7078a33c0
     * Line: 1353
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1353_d1a285aa244ec461d68f13e7078a33c0()
    {
        $client = $this->getClient();
        // tag::d1a285aa244ec461d68f13e7078a33c0[]
        // TODO -- Implement Example
        // PUT /persian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "char_filter": {
        //         "zero_width_spaces": {
        //             "type":       "mapping",
        //             "mappings": [ "\\u200C=>\\u0020"] \<1>
        //         }
        //       },
        //       "filter": {
        //         "persian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_persian_" \<2>
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_persian": {
        //           "tokenizer":     "standard",
        //           "char_filter": [ "zero_width_spaces" ],
        //           "filter": [
        //             "lowercase",
        //             "decimal_digit",
        //             "arabic_normalization",
        //             "persian_normalization",
        //             "persian_stop"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d1a285aa244ec461d68f13e7078a33c0[]

        $curl = 'PUT /persian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "char_filter": {'
              . '        "zero_width_spaces": {'
              . '            "type":       "mapping",'
              . '            "mappings": [ "\\u200C=>\\u0020"] \<1>'
              . '        }'
              . '      },'
              . '      "filter": {'
              . '        "persian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_persian_" \<2>'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_persian": {'
              . '          "tokenizer":     "standard",'
              . '          "char_filter": [ "zero_width_spaces" ],'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "decimal_digit",'
              . '            "arabic_normalization",'
              . '            "persian_normalization",'
              . '            "persian_stop"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  584f502cf840134f2db5f39e2483ced1
     * Line: 1399
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1399_584f502cf840134f2db5f39e2483ced1()
    {
        $client = $this->getClient();
        // tag::584f502cf840134f2db5f39e2483ced1[]
        // TODO -- Implement Example
        // PUT /portuguese_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "portuguese_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_portuguese_" \<1>
        //         },
        //         "portuguese_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["exemplo"] \<2>
        //         },
        //         "portuguese_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "light_portuguese"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_portuguese": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "portuguese_stop",
        //             "portuguese_keywords",
        //             "portuguese_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::584f502cf840134f2db5f39e2483ced1[]

        $curl = 'PUT /portuguese_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "portuguese_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_portuguese_" \<1>'
              . '        },'
              . '        "portuguese_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["exemplo"] \<2>'
              . '        },'
              . '        "portuguese_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "light_portuguese"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_portuguese": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "portuguese_stop",'
              . '            "portuguese_keywords",'
              . '            "portuguese_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1ba7afe23a26fe9ac7856d8c5bc1059d
     * Line: 1447
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1447_1ba7afe23a26fe9ac7856d8c5bc1059d()
    {
        $client = $this->getClient();
        // tag::1ba7afe23a26fe9ac7856d8c5bc1059d[]
        // TODO -- Implement Example
        // PUT /romanian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "romanian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_romanian_" \<1>
        //         },
        //         "romanian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["exemplu"] \<2>
        //         },
        //         "romanian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "romanian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_romanian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "romanian_stop",
        //             "romanian_keywords",
        //             "romanian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::1ba7afe23a26fe9ac7856d8c5bc1059d[]

        $curl = 'PUT /romanian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "romanian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_romanian_" \<1>'
              . '        },'
              . '        "romanian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["exemplu"] \<2>'
              . '        },'
              . '        "romanian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "romanian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_romanian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "romanian_stop",'
              . '            "romanian_keywords",'
              . '            "romanian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d260225cf97e068ead2a8a6bb5aefd90
     * Line: 1496
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1496_d260225cf97e068ead2a8a6bb5aefd90()
    {
        $client = $this->getClient();
        // tag::d260225cf97e068ead2a8a6bb5aefd90[]
        // TODO -- Implement Example
        // PUT /russian_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "russian_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_russian_" \<1>
        //         },
        //         "russian_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["пример"] \<2>
        //         },
        //         "russian_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "russian"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_russian": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "russian_stop",
        //             "russian_keywords",
        //             "russian_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d260225cf97e068ead2a8a6bb5aefd90[]

        $curl = 'PUT /russian_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "russian_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_russian_" \<1>'
              . '        },'
              . '        "russian_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["пример"] \<2>'
              . '        },'
              . '        "russian_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "russian"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_russian": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "russian_stop",'
              . '            "russian_keywords",'
              . '            "russian_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  320645d771e952af2a67bb7445c3688d
     * Line: 1544
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1544_320645d771e952af2a67bb7445c3688d()
    {
        $client = $this->getClient();
        // tag::320645d771e952af2a67bb7445c3688d[]
        // TODO -- Implement Example
        // PUT /sorani_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "sorani_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_sorani_" \<1>
        //         },
        //         "sorani_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["mînak"] \<2>
        //         },
        //         "sorani_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "sorani"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_sorani": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "sorani_normalization",
        //             "lowercase",
        //             "decimal_digit",
        //             "sorani_stop",
        //             "sorani_keywords",
        //             "sorani_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::320645d771e952af2a67bb7445c3688d[]

        $curl = 'PUT /sorani_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "sorani_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_sorani_" \<1>'
              . '        },'
              . '        "sorani_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["mînak"] \<2>'
              . '        },'
              . '        "sorani_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "sorani"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_sorani": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "sorani_normalization",'
              . '            "lowercase",'
              . '            "decimal_digit",'
              . '            "sorani_stop",'
              . '            "sorani_keywords",'
              . '            "sorani_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  327466380bcd55361973b4a96c6dccb2
     * Line: 1594
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1594_327466380bcd55361973b4a96c6dccb2()
    {
        $client = $this->getClient();
        // tag::327466380bcd55361973b4a96c6dccb2[]
        // TODO -- Implement Example
        // PUT /spanish_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "spanish_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_spanish_" \<1>
        //         },
        //         "spanish_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["ejemplo"] \<2>
        //         },
        //         "spanish_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "light_spanish"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_spanish": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "spanish_stop",
        //             "spanish_keywords",
        //             "spanish_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::327466380bcd55361973b4a96c6dccb2[]

        $curl = 'PUT /spanish_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "spanish_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_spanish_" \<1>'
              . '        },'
              . '        "spanish_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["ejemplo"] \<2>'
              . '        },'
              . '        "spanish_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "light_spanish"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_spanish": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "spanish_stop",'
              . '            "spanish_keywords",'
              . '            "spanish_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f097c02541056f3c0fc855e7bbeef8a8
     * Line: 1642
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1642_f097c02541056f3c0fc855e7bbeef8a8()
    {
        $client = $this->getClient();
        // tag::f097c02541056f3c0fc855e7bbeef8a8[]
        // TODO -- Implement Example
        // PUT /swedish_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "swedish_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_swedish_" \<1>
        //         },
        //         "swedish_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["exempel"] \<2>
        //         },
        //         "swedish_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "swedish"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_swedish": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "lowercase",
        //             "swedish_stop",
        //             "swedish_keywords",
        //             "swedish_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f097c02541056f3c0fc855e7bbeef8a8[]

        $curl = 'PUT /swedish_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "swedish_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_swedish_" \<1>'
              . '        },'
              . '        "swedish_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["exempel"] \<2>'
              . '        },'
              . '        "swedish_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "swedish"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_swedish": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "swedish_stop",'
              . '            "swedish_keywords",'
              . '            "swedish_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  103296e16b4233926ad1f07360385606
     * Line: 1690
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1690_103296e16b4233926ad1f07360385606()
    {
        $client = $this->getClient();
        // tag::103296e16b4233926ad1f07360385606[]
        // TODO -- Implement Example
        // PUT /turkish_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "turkish_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_turkish_" \<1>
        //         },
        //         "turkish_lowercase": {
        //           "type":       "lowercase",
        //           "language":   "turkish"
        //         },
        //         "turkish_keywords": {
        //           "type":       "keyword_marker",
        //           "keywords":   ["örnek"] \<2>
        //         },
        //         "turkish_stemmer": {
        //           "type":       "stemmer",
        //           "language":   "turkish"
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_turkish": {
        //           "tokenizer":  "standard",
        //           "filter": [
        //             "apostrophe",
        //             "turkish_lowercase",
        //             "turkish_stop",
        //             "turkish_keywords",
        //             "turkish_stemmer"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::103296e16b4233926ad1f07360385606[]

        $curl = 'PUT /turkish_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "turkish_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_turkish_" \<1>'
              . '        },'
              . '        "turkish_lowercase": {'
              . '          "type":       "lowercase",'
              . '          "language":   "turkish"'
              . '        },'
              . '        "turkish_keywords": {'
              . '          "type":       "keyword_marker",'
              . '          "keywords":   ["örnek"] \<2>'
              . '        },'
              . '        "turkish_stemmer": {'
              . '          "type":       "stemmer",'
              . '          "language":   "turkish"'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_turkish": {'
              . '          "tokenizer":  "standard",'
              . '          "filter": ['
              . '            "apostrophe",'
              . '            "turkish_lowercase",'
              . '            "turkish_stop",'
              . '            "turkish_keywords",'
              . '            "turkish_stemmer"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  346f28d82acb5427c304aa574fea0008
     * Line: 1743
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL1743_346f28d82acb5427c304aa574fea0008()
    {
        $client = $this->getClient();
        // tag::346f28d82acb5427c304aa574fea0008[]
        // TODO -- Implement Example
        // PUT /thai_example
        // {
        //   "settings": {
        //     "analysis": {
        //       "filter": {
        //         "thai_stop": {
        //           "type":       "stop",
        //           "stopwords":  "_thai_" \<1>
        //         }
        //       },
        //       "analyzer": {
        //         "rebuilt_thai": {
        //           "tokenizer":  "thai",
        //           "filter": [
        //             "lowercase",
        //             "decimal_digit",
        //             "thai_stop"
        //           ]
        //         }
        //       }
        //     }
        //   }
        // }
        // end::346f28d82acb5427c304aa574fea0008[]

        $curl = 'PUT /thai_example'
              . '{'
              . '  "settings": {'
              . '    "analysis": {'
              . '      "filter": {'
              . '        "thai_stop": {'
              . '          "type":       "stop",'
              . '          "stopwords":  "_thai_" \<1>'
              . '        }'
              . '      },'
              . '      "analyzer": {'
              . '        "rebuilt_thai": {'
              . '          "tokenizer":  "thai",'
              . '          "filter": ['
              . '            "lowercase",'
              . '            "decimal_digit",'
              . '            "thai_stop"'
              . '          ]'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



































}
