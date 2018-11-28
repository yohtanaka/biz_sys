<?php

namespace App\Library;

trait Search
{
    public function scopeNameIn($query, $string, $input) {
        if (!empty($input)) {
            return $query->where($string, 'like', "%${input}%");
        }
    }

    public function scopeOrNameIn($query, $string, $input) {
        if (!empty($input)) {
            return $query->orWhere($string, 'like', "%${input}%");
        }
    }

    public function scopeNameEqual($query, $string, $input) {
        if (!empty($input)) {
            return $query->where($string, $input);
        }
    }

    public function scopeOrNameEqual($query, $string, $input) {
        if (!empty($input)) {
            return $query->orWhere($string, $input);
        }
    }
}
