<?php

namespace GraphIte;

// Concrete Iterator Generalization
class AssociativeArray extends AbstractGraphIterator {

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
