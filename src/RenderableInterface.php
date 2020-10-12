<?php

namespace App;

use App\HtmlString;
use App\Renderer;
use Iterator;

interface RenderableInterface extends Iterator
{
    public function toHtml(Renderer $renderer): HtmlString;
}
