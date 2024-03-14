<?php

    use Coco\config\Factory;

    require '../vendor/autoload.php';

    //php,json.yaml 还原比较好，其他格式不建议

    $c2 = Factory::fromFile('data/input/php.ini');
    $c1 = Factory::fromFile('data/input/php.php');
    $c3 = Factory::fromFile('data/input/php.json');
    $c4 = Factory::fromFile('data/input/php.xml');
    $c5 = Factory::fromFile('data/input/php.yaml', true);

    echo $c5->stores->file->tag_prefix;
    echo PHP_EOL;

    echo '[php]:' . PHP_EOL;
    print_r($c1);
    echo '[ini]:' . PHP_EOL;
    print_r($c2);
    echo '[json]:' . PHP_EOL;
    print_r($c3);
    echo '[xml]:' . PHP_EOL;
    print_r($c4);
    echo '[yaml]:' . PHP_EOL;
    print_r($c5);


    /*

[php]:
Array
(
    [name] => Array
        (
        )

    [var_session_id] => 123
    [type] => file
    [store] =>
    [store_shop] =>
    [expire] => 1440
    [prefix] =>
    [stores] => Array
        (
            [file] => Array
                (
                    [type] => File
                    [path] =>
                    [prefix] =>
                    [expire] => 0
                    [tag_prefix] => tag:
                    [serialize] => Array
                        (
                        )

                )

        )

)
[ini]:
Array
(
    [stores] => Array
        (
            [file] => Array
                (
                    [type] => File
                    [path] =>
                    [prefix] =>
                    [expire] => 0
                    [tag_prefix] => tag:
                    [serialize] => Array
                )

        )

)
[json]:
Array
(
    [name] => Array
        (
        )

    [var_session_id] => 123
    [type] => file
    [store] =>
    [store_shop] =>
    [expire] => 1440
    [prefix] =>
    [stores] => Array
        (
            [file] => Array
                (
                    [type] => File
                    [path] =>
                    [prefix] =>
                    [expire] => 0
                    [tag_prefix] => tag:
                    [serialize] => Array
                        (
                        )

                )

        )

)
[xml]:
Array
(
    [var_session_id] => 123
    [type] => file
    [store] =>
    [store_shop] =>
    [expire] => 1440
    [prefix] =>
    [stores] => Array
        (
            [file] => Array
                (
                    [type] => File
                    [path] =>
                    [prefix] =>
                    [expire] => 0
                    [tag_prefix] => tag:
                )

        )

)
[yaml]:
Array
(
    [name] => Array
        (
        )

    [var_session_id] => 123
    [type] => file
    [store] =>
    [store_shop] =>
    [expire] => 1440
    [prefix] =>
    [stores] => Array
        (
            [file] => Array
                (
                    [type] => File
                    [path] =>
                    [prefix] =>
                    [expire] => 0
                    [tag_prefix] => tag:
                    [serialize] => Array
                        (
                        )

                )

        )

)


     */