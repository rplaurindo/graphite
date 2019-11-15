<?php

namespace Services;

use GraphIte\AssociativeArrayAggregate;

class RecursiveIteratorService {

    private $iterator;

    function __construct(array $collection) {
        $aggregator = new AssociativeArrayAggregate($collection);
        $this->iterator = $aggregator->createIterator();
    }

    function printIteration() {
//        $this->iterator->stopAtNext();
        foreach ($this->iterator as $key => $value) {
//            break;
//            $this->iterator->stopAtNext();
            echo 'key: ' . $key . "<br/>";
            echo 'value: ' . json_encode($value) . "<br/>";
//            break;
        }
    }

}
