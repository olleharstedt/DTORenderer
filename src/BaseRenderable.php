<?php

namespace App;

use App\ExtractableTrait;
use App\RenderableInterface;
use RuntimeException;

abstract class BaseRenderable implements RenderableInterface
{
    use ExtractableTrait;

    /** @var string */
    protected $viewfile = null;

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
            // Default to class name as viewfile if not given.
            $parts = explode('\\', static::class);
            $viewfile = strtolower(end($parts));
            $this->viewfile = 'views/' . $viewfile . '.php';
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
