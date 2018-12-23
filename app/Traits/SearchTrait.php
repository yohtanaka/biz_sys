<?php

namespace App\Traits;

trait SearchTrait
{
    /**
     * @param $query
     * @param $string
     * @param $keyword
     * @return string
     */
    public function scopeNameIn($query, $string, $keyword)
    {
        if ($keyword) return $query->where($string, 'like', "%${keyword}%");
    }

    /**
     * @param $query
     * @param $string
     * @param $keyword
     * @return string
     */
    public function scopeOrNameIn($query, $string, $keyword)
    {
        if ($keyword) return $query->orWhere($string, 'like', "%${keyword}%");
    }

    /**
     * @param $query
     * @param $string
     * @param $keyword
     * @return string
     */
    public function scopeNameEqual($query, $string, $keyword)
    {
        if ($keyword) return $query->where($string, $keyword);
    }

    /**
     * @param $query
     * @param $string
     * @param $keyword
     * @return string
     */
    public function scopeOrNameEqual($query, $string, $keyword)
    {
        if ($keyword) return $query->orWhere($string, $keyword);
    }

    /**
     * @param $query
     * @param $order
     * @return string
     */
    public function scopeChangeOrder($query, $order)
    {
        if ($order == 'desc') return $query->latest('id');
    }
}
