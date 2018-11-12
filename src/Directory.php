<?php

namespace GraphIte;

use AbstractSequentialGraphIterator;

class Directory extends AbstractSequentialGraphIterator {

    function __construct(array $collection) {
        parent::__construct($collection);
    }

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
