<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'         => 'required|email|unique:users,email,'.session()->get('id'),
            'password'      => 'required|min:8|max:63',
            'role'          => 'required|integer',
            'code'          => 'required|unique:users,code,'.session()->get('id'),
            'last_name'     => 'required|max:255',
            'first_name'    => 'nullable|max:255',
            'l_n_kana'      => 'nullable|max:255|kana',
            'f_n_kana'      => 'nullable|max:255|kana',
            'gender'        => 'required|integer',
            'birthday'      => 'nullable|date_format:Y-m-d',
            'zip1'          => 'nullable|required_with:zip2|size:3',
            'zip2'          => 'nullable|required_with:zip1|size:4',
            'pref'          => 'nullable|max:255',
            'city'          => 'nullable|max:255',
            'street'        => 'nullable|max:255',
            'building'      => 'nullable|max:255',
            'tel_private'   => 'nullable|phone',
            'tel_work'      => 'nullable|phone',
            'section_code'  => 'required|integer',
            'position_code' => 'required|integer',
        ];
    }

    public function attributes()
    {
        $attributes              = User::$names;
        $attributes['last_name'] = '名前 (苗字)';
        $attributes['zip1']      = '郵便番号1';
        $attributes['zip2']      = '郵便番号2';
        $attributes['pref']      = '都道府県';
        $attributes['city']      = '市区町村';
        return $attributes;
    }
}
