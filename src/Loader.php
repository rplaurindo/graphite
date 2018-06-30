<?php

require_once('Directory.php');

use GraphIte\Directory;

class Loader {

    private $className;
    private $namespacedPath;
    private $paths;
    private $directoryIterator;

    function __construct($className) {
        $this->className = $className;
        $this->paths = explode(PATH_SEPARATOR, get_include_path());
        $this->namespacedPath =  str_replace('\\', DIRECTORY_SEPARATOR, $className)  . '.php';
        $this->directoryIterator = new Directory($this->paths);
    }

    function load() {
        foreach ($this->directoryIterator as $path) {

            $absolutePath = $path . DIRECTORY_SEPARATOR . $this->namespacedPath;
            if (file_exists($absolutePath)) {
                include $this->namespacedPath;
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
