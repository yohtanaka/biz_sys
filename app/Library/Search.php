<?php

namespace App\Library;

trait Search
{
    public function scopeNameIn($query, $string, $keyword) {
        if ($keyword) {
            return $query->where($string, 'like', "%${keyword}%");
        }
    }

    public function scopeOrNameIn($query, $string, $keyword) {
        if ($keyword) {
            return $query->orWhere($string, 'like', "%${keyword}%");
        }
    }

    public function scopeNameEqual($query, $string, $keyword) {
        if ($keyword) {
            return $query->where($string, $keyword);
        }
    }

    public function scopeOrNameEqual($query, $string, $keyword) {
        if ($keyword) {
            return $query->orWhere($string, $keyword);
        }
    }
}
