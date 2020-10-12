<?php

require __DIR__ . "/../vendor/autoload.php";

use App\Button;
use App\ButtonGroup;

function render(App\RenderableInterface $element, App\Filename $filename = null)
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
    include $filename;
    return new App\HtmlString(ob_get_clean());
}

$button1 = new Button(['label' => 'Button 1']);
$button2 = new Button(['label' => 'Button 2']);
$buttonGroup = new ButtonGroup(['buttons' => [$button1, $button2]]);
echo render($buttonGroup);
