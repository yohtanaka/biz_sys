<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait FormTrait
{
    /**
     * @return array
     */
    private function putPostData(Request $request)
    {
        $data['value'] = $request->all();
        session()->put('post_data', $data['value']);
        return $data;
    }

    /**
     * @param $value
     * @return array
     */
    private function putOldInput($value)
    {
        if (!session()->has('post_data.edit') && !session()->has('errors')) {
            $values = $value->toArray();
            session()->put('id', $values['id']);
            foreach ($values as $key => $val) {
                session()->put("_old_input.{$key}", $val);
            }
        }
        return $data;
    }
}
