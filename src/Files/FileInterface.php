<?php

namespace GraphicEditor\Files;

/**
 * Interface FileInterface
 * @package GraphicEditor\Files
 */
interface FileInterface
{
    /**
     * @param resource $image
     * @param string $to
     */
    public function save($image, $to): void;
}
