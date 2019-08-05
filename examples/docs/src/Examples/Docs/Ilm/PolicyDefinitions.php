<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ilm;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: PolicyDefinitions
 *
 * Date: 2019-08-05 08:49:19
 *
 * @source   ilm/policy-definitions.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class PolicyDefinitions extends SimpleExamplesTester {

    /**
     * Tag:  b53e3314eb39b667a9ba87fb3a286e6b
     * Line: 34
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL34_b53e3314eb39b667a9ba87fb3a286e6b()
    {
        $client = $this->getClient();
        // tag::b53e3314eb39b667a9ba87fb3a286e6b[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "min_age": "1d",
        //         "actions": {
        //           "allocate": {
        //             "number_of_replicas": 1
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "30d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::b53e3314eb39b667a9ba87fb3a286e6b[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "min_age": "1d",'
              . '        "actions": {'
              . '          "allocate": {'
              . '            "number_of_replicas": 1'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "30d",'
              . '        "actions": {'
              . '          "delete": {}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  1116c769f39f0c7fe86ec2a4871efcd5
     * Line: 152
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL152_1116c769f39f0c7fe86ec2a4871efcd5()
    {
        $client = $this->getClient();
        // tag::1116c769f39f0c7fe86ec2a4871efcd5[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "actions": {
        //           "allocate" : {
        //             "number_of_replicas" : 2
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::1116c769f39f0c7fe86ec2a4871efcd5[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "actions": {'
              . '          "allocate" : {'
              . '            "number_of_replicas" : 2'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0518c673094fb18ecb491a3b78af4695
     * Line: 175
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL175_0518c673094fb18ecb491a3b78af4695()
    {
        $client = $this->getClient();
        // tag::0518c673094fb18ecb491a3b78af4695[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "actions": {
        //           "allocate" : {
        //             "include" : {
        //               "box_type": "hot,warm"
        //             }
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::0518c673094fb18ecb491a3b78af4695[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "actions": {'
              . '          "allocate" : {'
              . '            "include" : {'
              . '              "box_type": "hot,warm"'
              . '            }'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  9d461ae140ddc018efd2650559800cd1
     * Line: 201
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL201_9d461ae140ddc018efd2650559800cd1()
    {
        $client = $this->getClient();
        // tag::9d461ae140ddc018efd2650559800cd1[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "actions": {
        //           "allocate" : {
        //             "number_of_replicas": 1,
        //             "require" : {
        //               "box_type": "cold"
        //             }
        //         }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::9d461ae140ddc018efd2650559800cd1[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "actions": {'
              . '          "allocate" : {'
              . '            "number_of_replicas": 1,'
              . '            "require" : {'
              . '              "box_type": "cold"'
              . '            }'
              . '        }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  053497b6960f80fd7b005b7c6d54358f
     * Line: 232
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL232_053497b6960f80fd7b005b7c6d54358f()
    {
        $client = $this->getClient();
        // tag::053497b6960f80fd7b005b7c6d54358f[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "delete": {
        //         "actions": {
        //           "delete" : { }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::053497b6960f80fd7b005b7c6d54358f[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "delete": {'
              . '        "actions": {'
              . '          "delete" : { }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  eb5486d2fe4283475bf9e0e09280be16
     * Line: 271
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL271_eb5486d2fe4283475bf9e0e09280be16()
    {
        $client = $this->getClient();
        // tag::eb5486d2fe4283475bf9e0e09280be16[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "actions": {
        //           "forcemerge" : {
        //             "max_num_segments": 1
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::eb5486d2fe4283475bf9e0e09280be16[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "actions": {'
              . '          "forcemerge" : {'
              . '            "max_num_segments": 1'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  0345fbd95c4516a89ac5ad261a16be8f
     * Line: 298
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL298_0345fbd95c4516a89ac5ad261a16be8f()
    {
        $client = $this->getClient();
        // tag::0345fbd95c4516a89ac5ad261a16be8f[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "cold": {
        //         "actions": {
        //           "freeze" : { }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::0345fbd95c4516a89ac5ad261a16be8f[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "cold": {'
              . '        "actions": {'
              . '          "freeze" : { }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  fc9a1b1173690a911725cff3912e9755
     * Line: 333
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL333_fc9a1b1173690a911725cff3912e9755()
    {
        $client = $this->getClient();
        // tag::fc9a1b1173690a911725cff3912e9755[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "actions": {
        //           "readonly" : { }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::fc9a1b1173690a911725cff3912e9755[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "actions": {'
              . '          "readonly" : { }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  5b83cb589ac2afd5e1f7aba091823974
     * Line: 372
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL372_5b83cb589ac2afd5e1f7aba091823974()
    {
        $client = $this->getClient();
        // tag::5b83cb589ac2afd5e1f7aba091823974[]
        // TODO -- Implement Example
        // PUT my_index
        // {
        //   "settings": {
        //     "index.lifecycle.name": "my_policy",
        //     "index.lifecycle.rollover_alias": "my_data"
        //   },
        //   "aliases": {
        //     "my_data": {
        //       "is_write_index": true
        //     }
        //   }
        // }
        // end::5b83cb589ac2afd5e1f7aba091823974[]

        $curl = 'PUT my_index'
              . '{'
              . '  "settings": {'
              . '    "index.lifecycle.name": "my_policy",'
              . '    "index.lifecycle.rollover_alias": "my_data"'
              . '  },'
              . '  "aliases": {'
              . '    "my_data": {'
              . '      "is_write_index": true'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  19211ccf772f1dee7b500c21f4a9a805
     * Line: 417
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL417_19211ccf772f1dee7b500c21f4a9a805()
    {
        $client = $this->getClient();
        // tag::19211ccf772f1dee7b500c21f4a9a805[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover" : {
        //             "max_size": "100GB"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::19211ccf772f1dee7b500c21f4a9a805[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover" : {'
              . '            "max_size": "100GB"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  cfd4b34f35e531a20739a3b308d57134
     * Line: 441
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL441_cfd4b34f35e531a20739a3b308d57134()
    {
        $client = $this->getClient();
        // tag::cfd4b34f35e531a20739a3b308d57134[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover" : {
        //             "max_docs": 100000000
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::cfd4b34f35e531a20739a3b308d57134[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover" : {'
              . '            "max_docs": 100000000'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d4a41fb74b41b41a0ee114a2311f2815
     * Line: 465
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL465_d4a41fb74b41b41a0ee114a2311f2815()
    {
        $client = $this->getClient();
        // tag::d4a41fb74b41b41a0ee114a2311f2815[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover" : {
        //             "max_age": "7d"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d4a41fb74b41b41a0ee114a2311f2815[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover" : {'
              . '            "max_age": "7d"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  8940f2b911220acc9afef6360b6c13c4
     * Line: 490
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL490_8940f2b911220acc9afef6360b6c13c4()
    {
        $client = $this->getClient();
        // tag::8940f2b911220acc9afef6360b6c13c4[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover" : {
        //             "max_age": "7d",
        //             "max_size": "100GB"
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::8940f2b911220acc9afef6360b6c13c4[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover" : {'
              . '            "max_age": "7d",'
              . '            "max_size": "100GB"'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f6c79fa1c01bb4539d0cba0bd62c1ce0
     * Line: 517
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL517_f6c79fa1c01bb4539d0cba0bd62c1ce0()
    {
        $client = $this->getClient();
        // tag::f6c79fa1c01bb4539d0cba0bd62c1ce0[]
        // TODO -- Implement Example
        // PUT /_ilm/policy/rollover_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover": {
        //             "max_size": "50G"
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "1d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f6c79fa1c01bb4539d0cba0bd62c1ce0[]

        $curl = 'PUT /_ilm/policy/rollover_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover": {'
              . '            "max_size": "50G"'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "1d",'
              . '        "actions": {'
              . '          "delete": {}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  149a0eea54cdf6ea3052af6dba2d2a63
     * Line: 569
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL569_149a0eea54cdf6ea3052af6dba2d2a63()
    {
        $client = $this->getClient();
        // tag::149a0eea54cdf6ea3052af6dba2d2a63[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "actions": {
        //           "set_priority" : {
        //             "priority": 50
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::149a0eea54cdf6ea3052af6dba2d2a63[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "actions": {'
              . '          "set_priority" : {'
              . '            "priority": 50'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  f3b4ddce8ff21fc1a76a7c0d9c36650e
     * Line: 622
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL622_f3b4ddce8ff21fc1a76a7c0d9c36650e()
    {
        $client = $this->getClient();
        // tag::f3b4ddce8ff21fc1a76a7c0d9c36650e[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "warm": {
        //         "actions": {
        //           "shrink" : {
        //             "number_of_shards": 1
        //           }
        //         }
        //       }
        //     }
        //   }
        // }
        // end::f3b4ddce8ff21fc1a76a7c0d9c36650e[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "warm": {'
              . '        "actions": {'
              . '          "shrink" : {'
              . '            "number_of_shards": 1'
              . '          }'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  a5a58e8ad66afe831bc295500e3e8739
     * Line: 678
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL678_a5a58e8ad66afe831bc295500e3e8739()
    {
        $client = $this->getClient();
        // tag::a5a58e8ad66afe831bc295500e3e8739[]
        // TODO -- Implement Example
        // PUT _ilm/policy/my_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "unfollow" : {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::a5a58e8ad66afe831bc295500e3e8739[]

        $curl = 'PUT _ilm/policy/my_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "unfollow" : {}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

    /**
     * Tag:  d14a2a6c2a8b084495b8a64708226650
     * Line: 704
     * Date: 2019-08-05 08:49:19
     */
    public function testExampleL704_d14a2a6c2a8b084495b8a64708226650()
    {
        $client = $this->getClient();
        // tag::d14a2a6c2a8b084495b8a64708226650[]
        // TODO -- Implement Example
        // PUT _ilm/policy/full_policy
        // {
        //   "policy": {
        //     "phases": {
        //       "hot": {
        //         "actions": {
        //           "rollover": {
        //             "max_age": "7d",
        //             "max_size": "50G"
        //           }
        //         }
        //       },
        //       "warm": {
        //         "min_age": "30d",
        //         "actions": {
        //           "forcemerge": {
        //             "max_num_segments": 1
        //           },
        //           "shrink": {
        //             "number_of_shards": 1
        //           },
        //           "allocate": {
        //             "number_of_replicas": 2
        //           }
        //         }
        //       },
        //       "cold": {
        //         "min_age": "60d",
        //         "actions": {
        //           "allocate": {
        //             "require": {
        //               "type": "cold"
        //             }
        //           }
        //         }
        //       },
        //       "delete": {
        //         "min_age": "90d",
        //         "actions": {
        //           "delete": {}
        //         }
        //       }
        //     }
        //   }
        // }
        // end::d14a2a6c2a8b084495b8a64708226650[]

        $curl = 'PUT _ilm/policy/full_policy'
              . '{'
              . '  "policy": {'
              . '    "phases": {'
              . '      "hot": {'
              . '        "actions": {'
              . '          "rollover": {'
              . '            "max_age": "7d",'
              . '            "max_size": "50G"'
              . '          }'
              . '        }'
              . '      },'
              . '      "warm": {'
              . '        "min_age": "30d",'
              . '        "actions": {'
              . '          "forcemerge": {'
              . '            "max_num_segments": 1'
              . '          },'
              . '          "shrink": {'
              . '            "number_of_shards": 1'
              . '          },'
              . '          "allocate": {'
              . '            "number_of_replicas": 2'
              . '          }'
              . '        }'
              . '      },'
              . '      "cold": {'
              . '        "min_age": "60d",'
              . '        "actions": {'
              . '          "allocate": {'
              . '            "require": {'
              . '              "type": "cold"'
              . '            }'
              . '          }'
              . '        }'
              . '      },'
              . '      "delete": {'
              . '        "min_age": "90d",'
              . '        "actions": {'
              . '          "delete": {}'
              . '        }'
              . '      }'
              . '    }'
              . '  }'
              . '}';

        // TODO -- make assertion
    }

// %__METHOD__%



















}
