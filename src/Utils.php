<?php

    namespace Coco\config;

class Utils
{
    public static function arrayMerge($array1, $array2)
    {
        foreach ($array2 as $key => $value) {
            if (is_array($value) && isset($array1[$key]) && is_array($array1[$key])) {
                $array1[$key] = static::arrayMerge($array1[$key], $value);
            } else {
                $array1[$key] = $value;
            }
        }

        return $array1;
    }
}
