<?php

namespace App;

use App\HtmlString;
use App\Renderer;
use Iterator;
use ArrayAccess;

interface RenderableInterface extends Iterator
{
    public function getViewfile(): string;
}
