<?php

trait ExtractableTrait
{
    private $__position = 0;
    private $__objectvars;

    public function __construct() {
        $this->__objectvars = get_object_vars($this);
        $this->__position = key($this->__objectvars);
    }

    public function rewind() {
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

class Test2 implements Iterator
{
    use ExtractableTrait;

    public $a = 10;
    private $b = 30;
}

extract(iterator_to_array(new Test2()));

?>
<input name="<?= $a; ?>" value="<?= $b; ?>" />
