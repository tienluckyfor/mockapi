<?php

namespace App\Services;

class StringService
{
    public function duplicate($name){
        $name = preg_replace("#_duplicate_\d+$#mis", '', $name);
        $name = "{$name}_duplicate_".time();
        return $name;
    }
}