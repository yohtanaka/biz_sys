<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CsvRequest extends FormRequest
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
            'csvFile' => 'required|file|mimetypes:text/plain|mimes:csv,txt',
        ];
    }

    /**
     * @return array
     */
    public function attributes()
    {
        return [
            'csvFile' => 'ファイル',
        ];
    }

    /**
     * @return array
     */
    public function messages() {
        return [
            'csvFile.file'      => ':attributeが保存できませんでした',
            'csvFile.mimetypes' => ':attributeの形式が異なっています',
            'csvFile.mimes'     => ':attributeの形式が異なっています',
        ];
    }
}
