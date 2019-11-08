<?php

require 'autoload.php';

// $paths = explode(PATH_SEPARATOR, get_include_path());
$paths = ['C:'];

$abstractIteratorAggregate = new GraphIte\DirectoryAggregate($paths);

$directoryIterator = new GraphIte\Directory($abstractIteratorAggregate);

foreach ($directoryIterator as $path) {
    echo $path . "\n";
}
