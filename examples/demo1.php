<?php

    use Coco\config\Factory;

    require '../vendor/autoload.php';

    $file = 'data/input/php.php';

    $config = Factory::fromFiles([$file]);
    print_r($config);

    Factory::toFile('data/input/php.php', $config);
    Factory::toFile('data/input/php.json', $config);
//    Factory::toFile('data/input/php.ini', $config);
    Factory::toFile('data/input/php.yaml', $config);
    Factory::toFile('data/input/php.xml', $config);
