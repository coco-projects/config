<?php

    namespace Coco\config\Reader;

    use Coco\config\Exception\RuntimeException;

class Php extends ReaderAbstract
{
    public function fromFile(string $filename): array
    {
        $this->isFileAvailable($filename);

        try {
            $config = require $filename;

            if (!is_array($config)) {
                throw new RuntimeException('must return an array');
            }
        } catch (RuntimeException $e) {
            throw new RuntimeException($e->getMessage());
        }

        return $config;
    }

    public function fromString(string $string): array
    {
        return [];
    }
}
