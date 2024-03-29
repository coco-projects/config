<?php

    namespace Coco\config\Writer;

    use Coco\config\Exception\RuntimeException;
    use XMLWriter;

class Xml extends AbstractWriter
{
    public function processConfig(array $config): string
    {
        $writer = new XMLWriter();
        $writer->openMemory();
        $writer->setIndent(true);
        $writer->setIndentString(str_repeat(' ', 4));

        $writer->startDocument('1.0', 'UTF-8');
        $writer->startElement('config');

        foreach ($config as $sectionName => $data) {
            if (!is_array($data)) {
                $writer->writeElement($sectionName, (string)$data);
            } else {
                $this->addBranch($sectionName, $data, $writer);
            }
        }

        $writer->endElement();
        $writer->endDocument();

        return $writer->outputMemory();
    }


    protected function addBranch($branchName, array $config, XMLWriter $writer): void
    {
        $branchType = null;

        foreach ($config as $key => $value) {
            if ($branchType === null) {
                if (is_numeric($key)) {
                    $branchType = 'numeric';
                } else {
                    $writer->startElement($branchName);
                    $branchType = 'string';
                }
            } elseif ($branchType !== (is_numeric($key) ? 'numeric' : 'string')) {
                throw new RuntimeException('Mixing of string and numeric keys is not allowed');
            }

            if ($branchType === 'numeric') {
                if (is_array($value)) {
                    $this->addBranch($branchName, $value, $writer);
                } else {
                    $writer->writeElement($branchName, (string)$value);
                }
            } else {
                if (is_array($value)) {
                    $this->addBranch($key, $value, $writer);
                } else {
                    $writer->writeElement($key, (string)$value);
                }
            }
        }

        if ($branchType === 'string') {
            $writer->endElement();
        }
    }
}
