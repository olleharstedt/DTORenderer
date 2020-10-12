<?php

function render(App\RenderableInterface $element = null, App\Filename $filename = null, $renderer = null) {
    static $that = null;
    if ($that === null) {
        $that = $renderer;
        return;
    }
    if ($that !== null && $element === null) {
        throw new RuntimeException('No element given to render()');
    }
    return $that->render($element, $filename);
};
