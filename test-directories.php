<?php

//require_once('./load-paths.php');
//require_once('./autoloader.php');

use GraphIte\Directory;

$paths = explode(PATH_SEPARATOR, get_include_path());
$paths = ['C:'];

$directoryIterator = new Directory($paths);

foreach ($directoryIterator as $path) {
    echo $path . "\n";
}
