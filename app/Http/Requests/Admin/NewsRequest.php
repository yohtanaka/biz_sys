<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\News;

class NewsRequest extends FormRequest
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
            'title'         => 'required|max:255',
            'type'          => 'required|integer',
            'body'          => 'required',
            'display_flag'  => 'required|integer',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return News::$names;
    }
}
