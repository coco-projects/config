<?php

    namespace Coco\config\Reader;

    use Matomo\Ini\IniReader;

class Ini extends ReaderAbstract
{
    public function fromFile(string $filename): array
    {
        $this->isFileAvailable($filename);

        $reader = new IniReader();

        return $reader->readFile($filename);
    }

    public function fromString(string $string): array
    {
        if (empty($string)) {
            return [];
        }

        $reader = new IniReader();

        return $reader->readString($string);
    }
}
