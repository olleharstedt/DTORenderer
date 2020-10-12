<?php

namespace App;

use App\RenderableInterface;
use App\HtmlString;
use App\Renderer;
use RuntimeException;
use SplFixedArray as vec;

class Button implements RenderableInterface
{
    /** @var string */
    private $label;

    /** @var Filename */
    private $viewfile;

    /**
     * @param vec $options
     */
    public function __construct(vec $options)
    {
        foreach ($options as $prop => $value) {
            if (!property_exists(self, $prop)) {
                throw new RuntimeException('No such property: ' . $prop);
            } else {
                $this->$prop = $value;
            }
        }
    }

    /**
     * @param Renderer $renderer
     * @return HtmlString
     */
    public function toHtml(Renderer $renderer): HtmlString
    {
        return new $renderer->render($this, $this->viewfile);
    }
}
