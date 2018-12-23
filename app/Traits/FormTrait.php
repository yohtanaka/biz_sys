<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FormTrait
{
    /**
     * @return array
     */
    private function beforeCreate()
    {
        $data['edit'] = false;
        $data['show'] = false;
        if (!session()->exists('_old_input')) {
            session()->forget('post_data');
        }
        if (session()->has('id')) {
            session()->forget('id');
            session()->forget('_old_input');
        }
        return $data;
    }

    /**
     * @return array
     */
    private function beforeConfirm(Request $request)
    {
        if (session()->has('id')) {
            $data['edit'] = true;
            $data['id']   = session()->get('id');
        } else {
            $data['edit'] = false;
        }
        $data['show']  = 'confirm';
        $data['value'] = $request->all();
        session()->put('post_data', $data['value']);
        return $data;
    }

    /**
     * @param \Illuminate\Http\Request  $request
     * @return array
     */
    private function beforeShow(Request $request)
    {
        $data['edit'] = false;
        $data['show'] = 'show';
        return $data;
    }

    /**
     * @param array $value
     * @return array
     */
    private function beforeEdit($value)
    {

        $data['edit'] = true;
        $data['show'] = false;
        if (!session()->exists('_old_input')) {
            session()->forget('post_data');
        }
        if (session()->has('post_data.edit') || session()->has('errors')) {
            return $data;
        }
        $values = $value->toArray();
        session()->put('id', $values['id']);
        foreach ($values as $key => $val) {
            session()->put("_old_input.{$key}", $val);
        }
        return $data;
    }
}
