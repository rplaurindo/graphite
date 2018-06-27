<?php

namespace GraphIte;

use Iterator;
use ArrayObject;

abstract class AbstractGraphIterator implements Iterator {

    private $queue;
    private $nextQueue;
    private $i;
    private $lastIndex;
    private $keys;
    private $ordered2Stop;

    function __construct(array $collection) {
        $this->ordered2Stop = false;
        $this->queue = $collection;
        $this->nextQueue = array();
    }

    abstract function isLeafNode($current);
    abstract function getChildNodes($current);

    function key() {
        return $this->keys[$this->i];
    }

    function rewind() {
        $this->keys = array_keys($this->queue);
        if (!$this->ordered2Stop) {
            $this->i = 0;
            $this->lastIndex = count($this->keys) - 1;
        }
    }

    function valid() {
        return $this->i <= $this->lastIndex;
    }

    function current() {

        if ($this->valid()) {
            $current = $this->queue[$this->key()];
        } else {
            $current = $this->last();
        }

        if (!$this->isLeafNode($current)) {
            $this->putOnNextQueue($this->getChildNodes($current));
        }

        return $current;
    }

    function next() {
        $this->i++;

        if (!$this->valid()) {
            if (!$this->ordered2Stop && $this->hasNextQueue()) {
                $this->rewind();
            }
        } else {
            $key = $this->keys[$this->i];
            $item = $this->queue[$key];
            return $item;
        }
    }

    function stopAtNext() {
        $this->ordered2Stop = true;
        $this->i = $this->lastIndex + 1;
    }

    private function putOnNextQueue($collection) {
        // when the key name imports
        if ($this->is_associative_array($collection)) {
            $keys = array_keys($collection);
            foreach ($keys as $key) {
                $this->nextQueue[$key] = $collection[$key];
            }
        } else {
            foreach ($collection as $value) {
                array_push($this->nextQueue, $value);
            }
        }
    }

    private function last() {
        return $this->queue[$this->keys[$this->lastIndex]];
    }

    private function hasNextQueue() {
        $nextQueue = new ArrayObject($this->nextQueue);
        $nextQueueCopy = $nextQueue->getArrayCopy();
        if (count($nextQueueCopy)) {
            $this->queue = $nextQueueCopy;
            $this->nextQueue = array();
            return true;
        }

        $this->queue = array();

        return false;
    }

    private function is_associative_array(array $array) {
        return substr(json_encode($array), 0, 1) == '{';
    }

}
