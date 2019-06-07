<?php

namespace GraphicEditor\Calculation;

/**
 * Class Circle
 * @package GraphicEditor\Calculation
 */
abstract class CalculationBase
{
    /**
     * @var int
     */
    protected $width;

    /**
     * @var int
     */
    protected $height;

    /**
     * @var int
     */
    protected $borderSize;

    /**
     * @var int
     */
    protected $color;

    /**
     * CalculationBase constructor.
     * @param int $width
     * @param int $height
     * @param int $borderSize
     * @param int $color
     */
    public function __construct(int $width, int $height, int $borderSize, int $color)
    {
        $this->width = $width;
        $this->height = $height;
        $this->borderSize = $borderSize;
        $this->color = $color;
    }

    /**
     * @param resource $image
     * @return resource
     */
    public abstract function calculate($image);
}
