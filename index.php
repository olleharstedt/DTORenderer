<?php

require __DIR__ . "/vendor/autoload.php";

use App\Button;
use App\ButtonGroup;
use App\Renderer;

$renderer = new Renderer();
$renderer->suffix = '.json';

$button1 = new Button(['label' => 'Button 1']);
$button2 = new Button(['label' => 'Button 2']);
$buttonGroup = new ButtonGroup(['buttons' => [$button1, $button2]]);

echo $renderer->render($buttonGroup);
