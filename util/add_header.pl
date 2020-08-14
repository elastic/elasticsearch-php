#!/usr/bin/env perl

use strict;
use warnings;
use File::Find;
use File::Basename;
use File::Slurp;
use Cwd qw(abs_path);
use v5.12;

my $root = dirname(abs_path(__FILE__ . '/..'));

my @dir_to_search = (
    $root . '/src',
    $root . '/util',
    $root . '/tests'
);

my $header = <<EOL;
/**
 * Elasticsearch PHP client
 *
 * \@link      https://github.com/elastic/elasticsearch-php/
 * \@copyright Copyright (c) Elasticsearch B.V (https://www.elastic.co)
 * \@license   http://www.apache.org/licenses/LICENSE-2.0 Apache License, Version 2.0
 * \@license   https://www.gnu.org/licenses/lgpl-2.1.html GNU Lesser General Public License, Version 2.1 
 * 
 * Licensed to Elasticsearch B.V under one or more agreements.
 * Elasticsearch B.V licenses this file to you under the Apache 2.0 License or
 * the GNU Lesser General Public License, Version 2.1, at your option.
 * See the LICENSE file in the project root for more information.
 */
EOL

my @suffix = ('.php');
my %hash = map {$_ => 1} @suffix;

say "SEARCH for PHP files...";
find(\&add_header, @dir_to_search);
say "END";

sub add_header { 
    my ($filename, $dirs, $suffix) = fileparse($File::Find::name, @suffix);

    return if !$hash{$suffix};
    
    my $file_content = read_file($File::Find::name);
    if (index($file_content, $header) == -1) {
        printf("\tAdding header to %s\n", $File::Find::name);
        
        my @phpdoc_to_remove = (
            'author',
            'category',
            'package',
            'license',
            'link',
        );

        # Remove previous @phpdocumentor tag
        foreach my $tag ( @phpdoc_to_remove ) {
            $file_content =~ s/\s\*\s\@$tag.*\n//g;
        }
        # Insert the $header at the top of the file
        $file_content =~ s/<\?php/<\?php\n$header/;

        write_file($File::Find::name, $file_content);
    }
}