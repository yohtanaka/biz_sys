<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Position;

class PositionRequest extends FormRequest
{
    /**
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code' => 'required|integer',
            'name' => 'required|max:255',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return Position::$names;
    }
}
