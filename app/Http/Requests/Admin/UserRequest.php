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
            'email'        => 'required|unique:users,email,' . session()->get('id'),
            'last_name'    => 'required',
            'section_code' => 'required',
        ];
    }

    public function attributes()
    {
        $attributes              = User::$names;
        $attributes['last_name'] = '名前 (苗字)';
        return $attributes;
    }
}
