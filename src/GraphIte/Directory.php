<?php

namespace GraphIte;

// Concrete Iterator Generalization
class Directory extends AbstractSequentialGraphIterator {

    function isLeafNode($current) {
        if (count($this->getChildNodes($current))) {
            return false;
        }

        return true;
    }

    function getChildNodes($current) {
        return glob($current . DIRECTORY_SEPARATOR . '*', GLOB_ONLYDIR);
    }

}
