<?php

namespace GraphIte;

abstract class AbstractSequentialGraphIterator extends AbstractGraphIterator {

    /*
     * @Override
     */
    protected function putOnNextQueue($collection) {
        foreach ($collection as $value) {
            array_push($this->nextQueue, $value);
        }
    }

}
