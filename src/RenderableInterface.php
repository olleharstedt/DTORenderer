<?php

namespace App;

use App\HtmlString;
use App\Renderer;
use Iterator;
use ArrayAccess;

interface RenderableInterface extends Iterator
{
    public function toHtml(Renderer $renderer): HtmlString;
    public function getViewfile(): string;
}
