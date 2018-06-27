<?php

require_once('./load-paths.php');
require_once('./autoload.php');

use GraphIte\Directory;

$paths = explode(PATH_SEPARATOR, get_include_path());

$paths = new Directory($paths);

foreach ($paths as $path) {
    echo $path . "\n";
}
