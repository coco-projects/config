<?php

    namespace Coco\config\Writer;

class Json extends AbstractWriter
{
    public function processConfig(array $config): string
    {
        return json_encode($config, 256);
    }
}
