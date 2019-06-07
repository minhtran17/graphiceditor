<?php

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('GraphicEditor', '.\src', $class_name);
    $class_name = str_replace('\\', '/', $class_name);
    include $class_name . '.php';
});

$consoleName = $argv[1];

switch ($consoleName) {
    case 'geometric:draw':
        $command = new GraphicEditor\Console\Command\Geometric\Draw();
        $command->execute(array_pop($argv));
        break;
    default:
        echo "Undefined command\n";
        break;
}
