<?php

    namespace Coco\config\Writer;

    use Laminas\Config\Exception;
    use Laminas\Config\Exception\InvalidArgumentException;
    use Laminas\Config\Exception\RuntimeException;
    use Laminas\Stdlib\ArrayUtils;
    use Traversable;

abstract class AbstractWriter extends WriterAbstract
{
    public function toString(array $config): string
    {
        return $this->processConfig($config);
    }


    abstract protected function processConfig(array $config): string;
}
