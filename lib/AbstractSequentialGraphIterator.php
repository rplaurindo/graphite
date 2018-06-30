<?php

namespace GraphIte;

require_once('AbstractGraphIterator.php');

abstract class AbstractSequentialGraphIterator extends AbstractGraphIterator {

    protected function putOnNextQueue($collection) {
        foreach ($collection as $value) {
            array_push($this->nextQueue, $value);
        }
    }

}
