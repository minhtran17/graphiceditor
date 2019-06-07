<?php

namespace GraphicEditor\Files;

/**
 * Class Matrix
 * @package GraphicEditor\Files
 */
class Matrix implements FileInterface
{
    /**
     * @inheritdoc
     */
    public function save($image, $to): void
    {
        // Dummy() Save to local with $to
        echo "Dummy exported to matrix!\n";
        unset($image);
    }
}
