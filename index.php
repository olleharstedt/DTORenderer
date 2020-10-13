<?php

require __DIR__ . "/vendor/autoload.php";

use App\Button;
use App\ButtonGroup;
use App\Renderer;

// Default viewfile for a class is classname, but can be changed by setting the $viewfile property
$button1 = new Button(['label' => 'Button 1']);
$button2 = new Button(['label' => 'Button 2']);
$buttonGroup = new ButtonGroup(['buttons' => [$button1, $button2]]);

// Default view folder is views/
$renderer = new Renderer();
// Check for viewfiles that end with .php
$renderer->filetype = 'php';
echo $renderer->render($buttonGroup);

// Switch to .json viewfiles
$renderer->filetype = 'json';
echo $renderer->render($buttonGroup);
