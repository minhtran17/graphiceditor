<?php

namespace GraphicEditor\Console\Command\Geometric;

use GraphicEditor\Calculation\CalculationBase;
use GraphicEditor\Console\Command;
use GraphicEditor\Files\FileInterface;
use GraphicEditor\Files\Image;

/**
 * Class Draw
 * @package GraphicEditor\Console\Command\Geometric\Draw
 */
class Draw extends Command
{
    /**
     * @var string
     */
    private $jsonFile;

    /**@inheritdoc
     */
    protected function getName(): string
    {
        return 'Gemetric:Draw';
    }

    /**
     * @inheritdoc
     */
    protected function initialize(...$arguments): void
    {
        parent::initialize($arguments);

        $this->jsonFile = array_pop($arguments);
    }

    /**
     * @inheritdoc
     */
    protected function executeCommand(): void
    {
        $configs = $this->loadJson($this->jsonFile);

        foreach ($configs as $config) {
            /** @var CalculationBase $calculator */
            $class = '\GraphicEditor\Calculation\\' . lcfirst($config['type']);
            $calculator = new $class(
                $config['params']['width'],
                $config['params']['height'],
                $config['params']['borderSize'],
                $config['params']['color']
            );
            $image = imagecreatetruecolor($config['params']['width'], $config['params']['height']);
            $image = $calculator->calculate($image);

            switch ($config['params']['outputType']) {
                case 'image':
                    $imgType = pathinfo($config['params']['outputTo'], PATHINFO_EXTENSION);
                    $output = new Image($imgType);
                    break;

                default:
                    $class = '\GraphicEditor\Files\\' . $config['params']['outputType'];

                    if (!class_exists($class)) {
                        throw new \Exception('Wrong config json');
                    }
                    $output = new $class();
                    break;
            }

            $this->save($output, $image, $config['params']['outputTo']);
        }
    }

    /**
     * @param FileInterface $output
     * @param $image
     * @param $to
     */
    private function save(FileInterface $output, $image, $to)
    {
        $output->save($image, $to);
        unset($image);
    }

    /**
     * @param $path
     * @return array
     */
    private function loadJson($path): array
    {
        $json = str_replace("\n", '', file_get_contents($path));

        return json_decode($json,true);
    }
}
