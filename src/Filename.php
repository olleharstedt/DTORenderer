<?php

namespace App;

final class Filename
{
    /** @var string */
    private $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    public function __toString(): string
    {
        return $this->filename;
    }
}
