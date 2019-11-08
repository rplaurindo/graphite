<?php

namespace GraphIte;

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
