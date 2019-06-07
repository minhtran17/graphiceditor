<?php

namespace GraphicEditor\Console;

/**
 * Class Command
 * @package GraphicEditor\Console
 */
abstract class Command
{
    protected function initialize(...$arguments): void
    {
        // Placeholder for init
    }

    public function execute(...$arguments): void
    {
        $this->initialize(...$arguments);
        echo 'BEGIN ' . $this->getName() . "\n";
        $this->executeCommand();
        echo 'END ' . $this->getName() . "\n";
    }

    abstract protected function executeCommand(): void;

    abstract protected function getName(): string;
}
