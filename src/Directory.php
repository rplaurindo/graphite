<?php

namespace GraphIte;

class Directory extends AbstractGraphIterator {

    function __construct($path) {
        parent::__construct($this->getChildNodes($path));
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
