<?php

namespace GraphIte;

use AbstractGraphIterator;
use AbstractIteratorAggregate;

// Concrete Iterator Generalization
class AssociativeArray extends AbstractGraphIterator {

    function __construct(AbstractIteratorAggregate $collection) {
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
