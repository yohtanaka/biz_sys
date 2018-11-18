<?php

namespace App\library;

use Illuminate\Http\Request;

class Form
{
    public function beforeCreate(Request $request)
    {
        $data['edit']    = false;
        $data['confirm'] = false;
        if ($request->session()->has('id')) {
            $request->session()->forget('id');
            $request->session()->forget('_old_input');
        }
        if (!$request->session()->exists('_old_input')) {
            $request->session()->forget('post_data');
        }
        return $data;
    }

    public function beforeConfirm(Request $request)
    {
        if ($request->session()->has('id')) {
            $data['edit'] = true;
            $data['id']   = $request->session()->get('id');
        } else {
            $data['edit'] = false;
        }
        $data['confirm'] = true;
        $data['value']   = $request->all();
        $request->session()->put('post_data', $data['value']);
        return $data;
    }

    public function beforeEdit(Request $request, $value)
    {

        $data['edit']    = true;
        $data['confirm'] = false;
        if (!$request->session()->exists('_old_input')) {
            $request->session()->forget('post_data');
        }
        if ($request->session()->has('post_data.edit') || $request->session()->has('errors')) {
            return $data;
        }
        $values = $value->toArray();
        $request->session()->put('id', $values['id']);
        foreach ($values as $key => $val) {
            $request->session()->put("_old_input.{$key}", $val);
        }
        return $data;
    }
}
