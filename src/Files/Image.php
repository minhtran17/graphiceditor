<?php

namespace GraphicEditor\Files;

/**
 * Class Image
 * @package GraphicEditor\Files
 */
class Image implements FileInterface
{
    const ALLOWED_TYPE = ['png', 'gif', 'jpeg'];

    private $type;

    public function __construct($type = 'jpeg')
    {
        if (false === array_search($type, self::ALLOWED_TYPE, true)) {
            throw new FileException('Wrong format output file!');
        }
        $this->type = $type;
    }

    /**
     * @inheritdoc
     */
    public function save($image, $to): void
    {
        // Save to local with $to
        call_user_func('image' . $this->type, $image, $to);
        unset($image);
    }
}
