<?php

    namespace Coco\config\Writer;

    use Matomo\Ini\IniWriter;
    use Matomo\Ini\IniWritingException;

class Ini extends AbstractWriter
{
    /**
     * @throws IniWritingException
     */
    public function processConfig(array $config): string
    {
        $writer = new IniWriter();

        return @$writer->writeToString($config);
    }
}
