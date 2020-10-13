<?php

namespace App;

use App\HtmlString;
use App\Filename;
use RuntimeException;

class Renderer
{
    /** @var string */
    public $filetype = 'php';

    public function render(RenderableInterface $__element, Filename $__filename = null): HtmlString
    {
        if ($__filename === null) {
            $__filename = $__element->getViewfile() . '.' . $this->filetype;
        }
        $__filename = __DIR__ . '/' . $__filename;
        if (!file_exists($__filename)) {
            throw new RuntimeException('Found no such file: ' . $__filename);
        }
        if (!function_exists('render')) {
            // Import render() function and initialise it with this specific renderer.
            require 'render.php';
        }
        render(null, null, $this);
        ob_start();
        extract(iterator_to_array($__element));
        include $__filename;
        return new HtmlString(ob_get_clean());
    }
}
