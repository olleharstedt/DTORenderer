<?php

require __DIR__ . "/vendor/autoload.php";

use App\Button;
use App\ButtonGroup;
use App\Renderer;

$renderer = new Renderer();
$renderer->suffix = '.php';
// TODO: Further setup, base folder, subfolders, etc.

$button1 = new Button(['label' => 'Button 1']);
$button2 = new Button(['label' => 'Button 2']);
$buttonGroup = new ButtonGroup(['buttons' => [$button1, $button2]]);

echo $renderer->render($buttonGroup);

$renderer->suffix = '.json';

echo $renderer->render($buttonGroup);
