<?php

namespace App\Traits;

use App\Models\City;

trait PostUserTrait
{
    private function formatParams() {
        $data                = session()->get('post_data');
        $data['l_n_kana']    = mb_convert_kana($data['l_n_kana'], 'C');
        $data['f_n_kana']    = mb_convert_kana($data['f_n_kana'], 'C');
        $data['zip']         = $data['zip1'] . '-' . $data['zip2'];
        $data['pref_code']   = City::where('pref_name', 'LIKE', "${data['pref']}%")->first()['pref_code'];
        $data['city_code']   = City::where('pref_name', 'LIKE', "${data['pref']}%")
                                   ->where('city_name', 'LIKE', "${data['city']}%")->first()['city_code'];
        $data['tel_private'] = str_replace(['-', '‐'], '', $data['tel_private']);
        $data['tel_work']    = str_replace(['-', '‐'], '', $data['tel_work']);
        return $data;
    }
}
