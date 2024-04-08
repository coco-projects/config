<?php

    namespace Coco\config;

class Factory
{
    protected static array $ReaderExtensions = [
        'ini'  => \Coco\config\Reader\Ini::class,
        'json' => \Coco\config\Reader\Json::class,
        'xml'  => \Coco\config\Reader\Xml::class,
        'yaml' => \Coco\config\Reader\Yaml::class,
        'php'  => \Coco\config\Reader\Php::class,

    ];

    protected static array $writerExtensions = [
        'ini'  => \Coco\config\Writer\Ini::class,
        'json' => \Coco\config\Writer\Json::class,
        'xml'  => \Coco\config\Writer\Xml::class,
        'yaml' => \Coco\config\Writer\Yaml::class,
        'php'  => \Coco\config\Writer\Php::class,
    ];

    public static function fromFile(string $filename, $returnConfigObject = false)
    {
        $pathinfo = pathinfo($filename);

        if (!isset($pathinfo['extension'])) {
            throw new Exception\RuntimeException(sprintf('Filename "%s" is missing an extension and cannot be auto-detected', $filename));
        }

        $extension = strtolower($pathinfo['extension']);

        if (isset(static::$ReaderExtensions[$extension])) {
            $reader = new static::$ReaderExtensions[$extension];

            $config = $reader->fromFile($filename);
        } else {
            throw new Exception\RuntimeException(sprintf('Unsupported config file extension: .%s', $pathinfo['extension']));
        }

        return ($returnConfigObject) ? new Config($config) : $config;
    }

    public static function fromFiles(array $files, $returnConfigObject = false): Config|array
    {
        $config = [];

        foreach ($files as $file) {
            $c = static::fromFile($file);

            $config = Utils::arrayMerge($config, $c);
        }

        return ($returnConfigObject) ? new Config($config) : $config;
    }

    public static function toFile(string $filename, array $config): bool
    {
        $pathinfo  = pathinfo($filename);
        $extension = strtolower($pathinfo['extension']);

        $directory = dirname($filename);

        if (!is_dir($directory)) {
            throw new Exception\RuntimeException("Directory '{$directory}' does not exists!");
        }

        if (!is_writable($directory)) {
            throw new Exception\RuntimeException("Cannot write in directory '{$directory}'");
        }

        if (!isset(static::$writerExtensions[$extension])) {
            throw new Exception\RuntimeException("Unsupported config file extension: '.{$extension}' for writing.");
        }

        $writer = new static::$writerExtensions[$extension];

        $content = $writer->processConfig($config);

        return file_put_contents($filename, $content) !== false;
    }
}
