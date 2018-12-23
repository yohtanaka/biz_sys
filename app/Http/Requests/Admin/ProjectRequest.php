<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Project;

class ProjectRequest extends FormRequest
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
        return Project::$names;
    }
}
