<?php

namespace GraphIte;

use AbstractIteratorAggregate;

class DirectoryAggregate extends AbstractIteratorAggregate {

    function __construct(array $collection) {
        parent::__construct($collection);
    }

    function createIterator() {
        return new Directory($this);
    }

}
