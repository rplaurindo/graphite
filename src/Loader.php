<?php

require_once('Directory.php');

use GraphIte\Directory;

class Loader {

    private $className;

    function __construct($className) {
        $this->className = $className;
    }

    function load() {
        $paths = explode(PATH_SEPARATOR, get_include_path());
        $directoryIterator = new Directory($paths);

        foreach ($directoryIterator as $path) {

            $namespacedPath =  str_replace('\\', DIRECTORY_SEPARATOR, $this->className)  . '.php';
            $absolutePath = $path . DIRECTORY_SEPARATOR . $namespacedPath;
            if (file_exists($absolutePath)) {
                include $namespacedPath;
                break;
            } else {
                $fileName = basename($this->className)  . '.php';
                $absolutePath = $path . DIRECTORY_SEPARATOR . $fileName;

                if (file_exists($absolutePath)) {
                    include $absolutePath;
                    break;
                }
            }
        }
    }

}
