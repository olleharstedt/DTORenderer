<?php

namespace App;

use App\ExtractableTrait;
use App\RenderableInterface;
use RuntimeException;

abstract class BaseRenderable implements RenderableInterface
{
    use ExtractableTrait;

    /** @var string */
    //private $viewfile = null;

    /**
     * @param vec $options
     */
    public function __construct(array $options)
    {
        foreach ($options as $prop => $value) {
            if (!property_exists($this, $prop)) {
                throw new RuntimeException('No such property: ' . $prop);
            } else {
                $this->$prop = $value;
            }
        }
        $this->init();
        if ($this->viewfile === null) {
            throw new RuntimeException('viewfile cannot be null');
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

    /**
     * @return string
     */
    public function getViewfile(): string
    {
        return $this->viewfile;
    }
}
