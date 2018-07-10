<?php

$paths = explode(PATH_SEPARATOR, get_include_path());
$paths = ['C:'];

$directoryIterator = new GraphIte\Directory($paths);

foreach ($directoryIterator as $path) {
    echo $path . "\n";
}
