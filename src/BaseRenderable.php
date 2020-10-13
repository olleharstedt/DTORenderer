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

    /** @var string */
    protected $viewfolder = 'views';

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
                unset($options[$prop]);
            }
        }
        $this->init();
        if ($this->viewfile === null) {
            // Default to class name as viewfile if not given.
            $parts = explode('\\', static::class);
            $viewfile = strtolower(end($parts));
            // NB: Filetype is added by the renderer.
            $this->viewfile = $this->viewfolder . '/' . $viewfile;
        }
    }

    /**
     * @return string
     */
    public function getViewfile(): string
    {
        return $this->viewfile;
    }
}
