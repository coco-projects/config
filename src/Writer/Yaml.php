<?php

    namespace Coco\config\Writer;

class Yaml extends AbstractWriter
{
    public function processConfig(array $config): string
    {
        return \Symfony\Component\Yaml\Yaml::dump($config);
    }
}
