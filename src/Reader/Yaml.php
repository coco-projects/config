<?php

    namespace Coco\config\Reader;

    use Coco\config\Exception\RuntimeException;

class Yaml extends ReaderAbstract
{
    public function fromFile(string $filename): array
    {
        $this->isFileAvailable($filename);

        $config = \Symfony\Component\Yaml\Yaml::parseFile($filename);

        if (null === $config) {
            throw new RuntimeException("Error parsing YAML data");
        }

        return $config;
    }

    public function fromString(string $string): array
    {
        if (empty($string)) {
            return [];
        }

        $config = \Symfony\Component\Yaml\Yaml::parse($string);

        if (null === $config) {
            throw new RuntimeException("Error parsing YAML data");
        }

        return $config;
    }
}
