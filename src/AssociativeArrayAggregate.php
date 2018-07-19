<?php

namespace GraphIte;

class AssociativeArrayAggregate extends AbstractIteratorAggregate {

    function __construct(array $collection) {
        parent::__construct($collection);
    }

    function createIterator() {
        return new AssociativeArray($this);
    }

}
