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

    $c = new \Coco\config\Config($array1);

//    $c->addFormString('color.t3', 'hello');
    $c->addFormString( 'color.t2.t1', 'world');

    print_r($c->toArray());
