<?php

namespace App\library;

use Illuminate\Http\Request;

class Form
{
    public function beforeCreate()
    {
        $data['edit']    = false;
        $data['confirm'] = false;
        if (!session()->exists('_old_input')) {
            session()->forget('post_data');
        }
        if (session()->has('id')) {
            session()->forget('id');
            session()->forget('_old_input');
        }
        return $data;
    }

    public function beforeConfirm(Request $request)
    {
        if (session()->has('id')) {
            $data['edit'] = true;
            $data['id']   = session()->get('id');
        } else {
            $data['edit'] = false;
        }
        $data['confirm'] = true;
        $data['value']   = $request->all();
        session()->put('post_data', $data['value']);
        return $data;
    }

    public function beforeShow(Request $request)
    {
        $data['edit']    = false;
        $data['confirm'] = 'show';
        return $data;
    }

    public function beforeEdit($value)
    {

        $data['edit']    = true;
        $data['confirm'] = false;
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
