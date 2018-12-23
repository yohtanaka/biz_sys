<?php

namespace App\Traits;

trait SearchTrait
{
    /**
     * @param $query
     * @param string $string
     * @param string $keyword
     * @return $query
     */
    public function scopeNameIn($query, $string, $keyword)
    {
        if ($keyword) return $query->where($string, 'like', "%${keyword}%");
    }

    /**
     * @param $query
     * @param string $string
     * @param string $keyword
     * @return $query
     */
    public function scopeOrNameIn($query, $string, $keyword)
    {
        if ($keyword) return $query->orWhere($string, 'like', "%${keyword}%");
    }

    /**
     * @param $query
     * @param string $string
     * @param string $keyword
     * @return $query
     */
    public function scopeNameEqual($query, $string, $keyword)
    {
        if ($keyword) return $query->where($string, $keyword);
    }

    /**
     * @param $query
     * @param string $string
     * @param string $keyword
     * @return $query
     */
    public function scopeOrNameEqual($query, $string, $keyword)
    {
        if ($keyword) return $query->orWhere($string, $keyword);
    }

    /**
     * @param $query
     * @param string $order
     * @return $query
     */
    public function scopeChangeOrder($query, $order)
    {
        if ($order == 'desc') return $query->latest('id');
    }
}
