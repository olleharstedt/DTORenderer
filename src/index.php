<?php

require __DIR__ . "/../vendor/autoload.php";

use SplFixedArray as vec;

$button1 = new App\Button(['label' => 'Button 1']);
$button2 = new App\Button(['label' => 'Button 2']);
$buttonGroup = new App\ButtonGroup(['buttons' => [$button1, $button2]]);
$renderer = new App\Renderer();
echo $renderer->render($buttonGroup);
