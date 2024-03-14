<?php

    require '../vendor/autoload.php';

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

    /*
Array
(
    [color] => Array
        (
            [favorite] => green
            [t3] => g2
            [0] => blue
            [1] => kkkk2
            [t] => g4
        )

    [0] => 555
    [1] => 3
)
     */