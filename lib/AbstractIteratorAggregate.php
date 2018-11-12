<?php

abstract class AbstractIteratorAggregate {

    private $collection;

    function __construct(array $collection) {
//        PHP makes a copy instead a object reference, how is it done with string
        $this->collection = $collection;
    }

    abstract function createIterator();

    function getRealCollectionCopy() {
        return $this->collection;
    }

}
