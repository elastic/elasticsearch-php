<?php declare(strict_types = 1);

// Licensed to Elasticsearch B.V under one or more agreements.
// Elasticsearch B.V licenses this file to you under the Apache 2.0 License.
// See the LICENSE file in the project root for more information

namespace Elasticsearch\Examples\Docs\Ml\Anomaly-detection\Apis;

use Elasticsearch\Examples\Docs\Testers\SimpleExamplesTester;

/**
 *
 * Class: FindFileStructure
 *
 * Date: 2019-08-06 06:59:54
 *
 * @source   ml/anomaly-detection/apis/find-file-structure.asciidoc
 * @category Elasticsearch\Examples\Docs
 * @license  http://www.apache.org/licenses/LICENSE-2.0 Apache2
 * @link     http://elastic.co
 *
 */
class FindFileStructure extends SimpleExamplesTester {

    /**
     * Tag:  7a145f2c4ad1c3c9fea24afeadb847ef
     * Line: 226
     * Date: 2019-08-06 06:59:54
     */
    public function testExampleL226_7a145f2c4ad1c3c9fea24afeadb847ef()
    {
        $client = $this->getClient();
        // tag::7a145f2c4ad1c3c9fea24afeadb847ef[]
        // TODO -- Implement Example
        // POST _ml/find_file_structure
        // {"name": "Leviathan Wakes", "author": "James S.A. Corey", "release_date": "2011-06-02", "page_count": 561}
        // {"name": "Hyperion", "author": "Dan Simmons", "release_date": "1989-05-26", "page_count": 482}
        // {"name": "Dune", "author": "Frank Herbert", "release_date": "1965-06-01", "page_count": 604}
        // {"name": "Dune Messiah", "author": "Frank Herbert", "release_date": "1969-10-15", "page_count": 331}
        // {"name": "Children of Dune", "author": "Frank Herbert", "release_date": "1976-04-21", "page_count": 408}
        // {"name": "God Emperor of Dune", "author": "Frank Herbert", "release_date": "1981-05-28", "page_count": 454}
        // {"name": "Consider Phlebas", "author": "Iain M. Banks", "release_date": "1987-04-23", "page_count": 471}
        // {"name": "Pandora\'s Star", "author": "Peter F. Hamilton", "release_date": "2004-03-02", "page_count": 768}
        // {"name": "Revelation Space", "author": "Alastair Reynolds", "release_date": "2000-03-15", "page_count": 585}
        // {"name": "A Fire Upon the Deep", "author": "Vernor Vinge", "release_date": "1992-06-01", "page_count": 613}
        // {"name": "Ender\'s Game", "author": "Orson Scott Card", "release_date": "1985-06-01", "page_count": 324}
        // {"name": "1984", "author": "George Orwell", "release_date": "1985-06-01", "page_count": 328}
        // {"name": "Fahrenheit 451", "author": "Ray Bradbury", "release_date": "1953-10-15", "page_count": 227}
        // {"name": "Brave New World", "author": "Aldous Huxley", "release_date": "1932-06-01", "page_count": 268}
        // {"name": "Foundation", "author": "Isaac Asimov", "release_date": "1951-06-01", "page_count": 224}
        // {"name": "The Giver", "author": "Lois Lowry", "release_date": "1993-04-26", "page_count": 208}
        // {"name": "Slaughterhouse-Five", "author": "Kurt Vonnegut", "release_date": "1969-06-01", "page_count": 275}
        // {"name": "The Hitchhiker\'s Guide to the Galaxy", "author": "Douglas Adams", "release_date": "1979-10-12", "page_count": 180}
        // {"name": "Snow Crash", "author": "Neal Stephenson", "release_date": "1992-06-01", "page_count": 470}
        // {"name": "Neuromancer", "author": "William Gibson", "release_date": "1984-07-01", "page_count": 271}
        // {"name": "The Handmaid\'s Tale", "author": "Margaret Atwood", "release_date": "1985-06-01", "page_count": 311}
        // {"name": "Starship Troopers", "author": "Robert A. Heinlein", "release_date": "1959-12-01", "page_count": 335}
        // {"name": "The Left Hand of Darkness", "author": "Ursula K. Le Guin", "release_date": "1969-06-01", "page_count": 304}
        // {"name": "The Moon is a Harsh Mistress", "author": "Robert A. Heinlein", "release_date": "1966-04-01", "page_count": 288}
        // end::7a145f2c4ad1c3c9fea24afeadb847ef[]

        $curl = 'POST _ml/find_file_structure'
              . '{"name": "Leviathan Wakes", "author": "James S.A. Corey", "release_date": "2011-06-02", "page_count": 561}'
              . '{"name": "Hyperion", "author": "Dan Simmons", "release_date": "1989-05-26", "page_count": 482}'
              . '{"name": "Dune", "author": "Frank Herbert", "release_date": "1965-06-01", "page_count": 604}'
              . '{"name": "Dune Messiah", "author": "Frank Herbert", "release_date": "1969-10-15", "page_count": 331}'
              . '{"name": "Children of Dune", "author": "Frank Herbert", "release_date": "1976-04-21", "page_count": 408}'
              . '{"name": "God Emperor of Dune", "author": "Frank Herbert", "release_date": "1981-05-28", "page_count": 454}'
              . '{"name": "Consider Phlebas", "author": "Iain M. Banks", "release_date": "1987-04-23", "page_count": 471}'
              . '{"name": "Pandora\'s Star", "author": "Peter F. Hamilton", "release_date": "2004-03-02", "page_count": 768}'
              . '{"name": "Revelation Space", "author": "Alastair Reynolds", "release_date": "2000-03-15", "page_count": 585}'
              . '{"name": "A Fire Upon the Deep", "author": "Vernor Vinge", "release_date": "1992-06-01", "page_count": 613}'
              . '{"name": "Ender\'s Game", "author": "Orson Scott Card", "release_date": "1985-06-01", "page_count": 324}'
              . '{"name": "1984", "author": "George Orwell", "release_date": "1985-06-01", "page_count": 328}'
              . '{"name": "Fahrenheit 451", "author": "Ray Bradbury", "release_date": "1953-10-15", "page_count": 227}'
              . '{"name": "Brave New World", "author": "Aldous Huxley", "release_date": "1932-06-01", "page_count": 268}'
              . '{"name": "Foundation", "author": "Isaac Asimov", "release_date": "1951-06-01", "page_count": 224}'
              . '{"name": "The Giver", "author": "Lois Lowry", "release_date": "1993-04-26", "page_count": 208}'
              . '{"name": "Slaughterhouse-Five", "author": "Kurt Vonnegut", "release_date": "1969-06-01", "page_count": 275}'
              . '{"name": "The Hitchhiker\'s Guide to the Galaxy", "author": "Douglas Adams", "release_date": "1979-10-12", "page_count": 180}'
              . '{"name": "Snow Crash", "author": "Neal Stephenson", "release_date": "1992-06-01", "page_count": 470}'
              . '{"name": "Neuromancer", "author": "William Gibson", "release_date": "1984-07-01", "page_count": 271}'
              . '{"name": "The Handmaid\'s Tale", "author": "Margaret Atwood", "release_date": "1985-06-01", "page_count": 311}'
              . '{"name": "Starship Troopers", "author": "Robert A. Heinlein", "release_date": "1959-12-01", "page_count": 335}'
              . '{"name": "The Left Hand of Darkness", "author": "Ursula K. Le Guin", "release_date": "1969-06-01", "page_count": 304}'
              . '{"name": "The Moon is a Harsh Mistress", "author": "Robert A. Heinlein", "release_date": "1966-04-01", "page_count": 288}';

        // TODO -- make assertion
    }

// %__METHOD__%


}
