<?php

namespace App;

use App\HtmlString;
use App\Filename;
use RuntimeException;

class Renderer
{
    public function render(RenderableInterface $elem, Filename $filename): HtmlString
    {
        if (!file_exists($filename)) {
            throw new RuntimeException('Found no such file: ' . $filename);
        }
        extract(iterator_to_array($elem));
        include $filename;
    }
}
