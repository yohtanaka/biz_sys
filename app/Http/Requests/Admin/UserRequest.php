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
            'role'          => 'required|integer',
            'code'          => 'required|unique:users,code,'.session()->get('id'),
            'last_name'     => 'required|max:255',
            'gender'        => 'required|integer',
            'section_code'  => 'required|integer',
            'position_code' => 'required|integer',
        ];
    }

    public function attributes()
    {
        $attributes              = User::$names;
        $attributes['last_name'] = '名前 (苗字)';
        return $attributes;
    }
}
