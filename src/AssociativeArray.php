<?php

namespace GraphIte;

class AssociativeArray extends AbstractGraphIterator {

    function __construct(array $collection) {
        parent::__construct($collection);
    }

    function isLeafNode($current) {
        if (is_array($current)) {
            return false;
        }

        return true;
    }

    function getChildNodes($current) {
        return $current;
    }

}
