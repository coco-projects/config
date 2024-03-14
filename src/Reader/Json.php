<?php

    namespace Coco\config\Reader;

    use Coco\config\Exception\RuntimeException;

class Json extends ReaderAbstract
{
    public function fromFile(string $filename): array
    {
        $this->isFileAvailable($filename);

        try {
            $config = json_decode(file_get_contents($filename), true);
        } catch (RuntimeException $e) {
            throw new RuntimeException($e->getMessage());
        }

        return $config;
    }

    public function fromString(string $string): array
    {
        if (empty($string)) {
            return [];
        }

        try {
            $config = json_decode($string, 1);
        } catch (RuntimeException $e) {
            throw new RuntimeException($e->getMessage());
        }

        return $config;
    }
}
