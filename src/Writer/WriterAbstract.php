<?php

    namespace Coco\config\Writer;

abstract class WriterAbstract
{
    abstract public function toString(array $config): string;
}
