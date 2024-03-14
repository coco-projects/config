<?php

    declare(strict_types = 1);

    namespace Coco\Tests\Unit;

    use Coco\config\Factory;
    use PHPUnit\Framework\TestCase;

final class ConfigTest extends TestCase
{
    public function testA()
    {
        $file   = 'examples/data1/input/php.php';
        $config = Factory::fromFiles([$file]);

        Factory::toFile('examples/data1/input/php.php', $config);
        Factory::toFile('examples/data1/input/php.json', $config);
        Factory::toFile('examples/data1/input/php.yaml', $config);
        Factory::toFile('examples/data1/input/php.xml', $config);

//            Factory::toFile('examples/data1/input/php.ini', $config);
        $this->assertEquals(1, 1);
    }

    public function testB()
    {
        $c1 = Factory::fromFile('examples/data1/input/php.php', true);
        $c2 = Factory::fromFile('examples/data1/input/php.ini', true);
        $c3 = Factory::fromFile('examples/data1/input/php.json', true);
        $c4 = Factory::fromFile('examples/data1/input/php.xml', true);
        $c5 = Factory::fromFile('examples/data1/input/php.yaml', true);

        $c5->stores->file->tag_prefix;
        $c5->stores->file->h = 123;
        $c5->stores->file->v = ['hekko',"a" => "aa",];

        $c5['stores']['file']['h'];
        $c5['stores']['file']['a'] = 123;
        $c5['stores']['file']['b'] = ['hekko',"a" => "aa",];

        $c5->toArray();

        $this->assertEquals(1, 1);
    }

    public function testC()
    {

        $array1 = [
            'color' => [
                'favorite' => 'red',
                "t3"       => "g2",
                'kkkk1',
                'kkkk2',
            ],
            52,
            3,
        ];

        $array2 = [
            'color' => [
                'favorite' => 'green',
                "t"        => "g4",
                'blue',
            ],
            555,
        ];

        $c = new \Coco\config\Config($array1);

        $c1 = $c->merge($array2);
        print_r($c1->toArray());
        $this->assertEquals(1, 1);
    }
}
