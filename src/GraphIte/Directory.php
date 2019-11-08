<?php

namespace GraphIte;

// Concrete Iterator Generalization
class Directory extends AbstractSequentialGraphIterator {

    function isLeafNode($directoryPath) {
        if (count($this->getChildNodes($directoryPath))) {
            return false;
        }

        return true;
    }

    function getChildNodes($directoryPath) {
        return glob($directoryPath . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR);
    }
    
    static function getFileNames($directoryPath) {
        $fileNames = [];
        $contents = scandir($directoryPath);
        
        foreach($contents as $content) {
            if(is_file($directoryPath . DIRECTORY_SEPARATOR . $content)) {
                array_push($fileNames, $content);
            }
        }
        
        return $fileNames;
    }

}
