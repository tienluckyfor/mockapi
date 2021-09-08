<?php

namespace App\Services;

use Illuminate\Support\Arr;

class ArrService
{
    public function sort($array, $column = 'id', $type = 'asc')
    {
        if ($type == 'asc') {
            array_multisort(array_map(function ($element) use ($column) {
                return @$element[$column];
            }, $array), SORT_ASC, $array);
        }
        if ($type == 'desc') {
            array_multisort(array_map(function ($element) use ($column) {
                return @$element[$column];
            }, $array), SORT_DESC, $array);
        }
        return $array;
    }

    public function firstKeyValue($array)
    {
        list($keys, $values) = Arr::divide($array);
        return [@$keys[0], @$values[0]];
    }
}