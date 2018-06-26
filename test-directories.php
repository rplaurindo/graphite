<?php

require_once('./load-paths.php');
require_once('./autoload.php');

use GraphIte\Directory;

$directory = new Directory($srcPath);

foreach ($directory as $path) {
    echo $path . "\n";
}
