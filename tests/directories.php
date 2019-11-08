<?php

require 'autoload.php';

// $paths = explode(PATH_SEPARATOR, get_include_path());
$paths = ['C:'];

$abstractIteratorAggregate = new GraphIte\DirectoryAggregate($paths);

foreach ($abstractIteratorAggregate->createIterator() as $path) {
    echo $path . "\n";
}
