<?php

namespace App\Traits;

use App\Models\User;
use App\Models\City;

trait PostUserTrait
{
    private function searchUser($request) {
        $data['name']  = $request->name;
        $data['sc']    = $request->section_code;
        $data['pc']    = $request->position_code;
        $data['order'] = $request->order;
        $data['users'] = User::nameIn('first_name', $data['name'])
                             ->orNameIn('last_name', $data['name'])
                             ->orNameIn('f_n_kana', $data['name'])
                             ->orNameIn('l_n_kana', $data['name'])
                             ->orNameIn('email', $data['name'])
                             ->nameEqual('section_code', $data['sc'])
                             ->nameEqual('position_code', $data['pc'])
                             ->changeOrder($data['order'])
                             ->paginate(10);
        return $data;
    }

    private function formatParams() {
        $data                = session()->get('post_data');
        $data['l_n_kana']    = mb_convert_kana($data['l_n_kana'], 'C');
        $data['f_n_kana']    = mb_convert_kana($data['f_n_kana'], 'C');
        $data['zip']         = $data['zip1'] . '-' . $data['zip2'];
        $data['pref_code']   = City::where('pref_name', 'LIKE', "${data['pref']}%")->first()['pref_code'];
        $data['city_code']   = City::where('pref_name', 'LIKE', "${data['pref']}%")
                                   ->where('city_name', 'LIKE', "${data['city_name']}%")
                                   ->first()['city_code'];
        $data['tel_private'] = str_replace(['-', '‐'], '', $data['tel_private']);
        $data['tel_work']    = str_replace(['-', '‐'], '', $data['tel_work']);
        return $data;
    }

    private function replaceParams($user) {
        session()->put('_old_input.zip1', substr($user['zip'], 0, 3));
        session()->put('_old_input.zip2', substr($user['zip'], -4));
        session()->put('_old_input.pref', City::where('pref_code', $user['pref_code'])->first()['pref_name']);
    }
}
