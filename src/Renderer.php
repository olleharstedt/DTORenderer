<?php

namespace App;

use App\HtmlString;
use App\Filename;
use RuntimeException;

class Renderer
{
    /** @var string */
    private $suffix = '.php';

    public function render(RenderableInterface $element, Filename $filename = null): HtmlString
    {
        if ($filename === null) {
            $filename = $element->getViewfile() . $this->suffix;
        }
        $filename = __DIR__ . '/' . $filename;
        if (!file_exists($filename)) {
            throw new RuntimeException('Found no such file: ' . $filename);
        }
        if (!function_exists('render')) {
            require 'render.php';
            render(null, null, $this);
        }
        ob_start();
        extract(iterator_to_array($element));
        include $filename;
        return new HtmlString(ob_get_clean());
    }
}

