<?php

namespace App;

use App\HtmlString;
use App\Filename;
use RuntimeException;

class Renderer
{
    public function render(RenderableInterface $element, Filename $filename = null): HtmlString
    {
        if ($filename === null) {
            $filename = $element->getViewfile();
        }
        $filename = __DIR__ . '/' . $filename;
        if (!file_exists($filename)) {
            throw new RuntimeException('Found no such file: ' . $filename);
        }
        ob_start();
        extract(iterator_to_array($element));
        $renderer = $this;
        include $filename;
        return new HtmlString(ob_get_clean());
    }
}
