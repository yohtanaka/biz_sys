<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'email'        => 'required|unique:users,email,' . session()->get('id'),
            'last_name'    => 'required',
            'section_code' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'email'        => 'メールアドレス',
            'last_name'    => '名前 (苗字)',
            'section_code' => '部署',
        ];
    }
}