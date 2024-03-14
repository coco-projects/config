<?php

    namespace Coco\config\Writer;

class Php extends AbstractWriter
{
    public function processConfig(array $config): string
    {
        return '<?php return ' . var_export($config, true) . ';';
    }
}
