<?php

namespace App;

/**
 * Use this to be able to extract private properties from a DTO.
 * Private properties are needed for immutability.
 */
trait ExtractableTrait
{
    private $__position = 0;
    private $__objectvars;

    public function init() {
        $this->__objectvars = get_object_vars($this);
        $this->__position = key($this->__objectvars);
    }

    public function rewind() {
        $this->__objectvars = null;
        $this->__position = null;
        $this->init();
    }

    public function current() {
        return $this->__objectvars[$this->__position];
    }

    public function key() {
        return $this->__position;
    }

    public function next() {
        $this->__position = key($this->__objectvars);
        next($this->__objectvars);
        if ($this->__position === '__position') {
            $this->next();
        }
    }

    public function valid() {
        return isset($this->__objectvars[$this->__position]);
    }
}
