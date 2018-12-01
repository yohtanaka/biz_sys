<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvRequest extends FormRequest
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
            'csvFile' => 'required|file|mimetypes:text/plain|mimes:csv,txt',
        ];
    }

    public function attributes()
    {
        return [
            'csvFile' => 'ファイル',
        ];
    }

    public function messages() {
        return [
            'csvFile.file'      => ':attributeが保存できませんでした',
            'csvFile.mimetypes' => ':attributeの形式が異なっています',
            'csvFile.mimes'     => ':attributeの形式が異なっています',
        ];
    }
}
