<?php

    namespace Coco\config\Reader;

    use Coco\config\Exception\RuntimeException;

abstract class ReaderAbstract
{
    abstract public function fromFile(string $filename): array;

    abstract public function fromString(string $string): array;

    public function isFileAvailable(string $filename): void
    {
        if (!is_file($filename) || !is_readable($filename)) {
            throw new RuntimeException(sprintf("File '%s' doesn't exist or not readable", $filename));
        }
    }
}
