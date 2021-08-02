<?php

namespace App\Services;

class BackupService
{
    public function database($array, $column = 'id', $type = 'asc')
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
}