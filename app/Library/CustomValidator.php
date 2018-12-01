<?php

namespace App\Library;

use Illuminate\Validation\Validator;

class CustomValidator extends Validator
{
    /**
     * @param $attribute
     * @param $value
     * @param $parameters
     * @return int
     */
    public function validateKana($attribute, $value, $parameters)
    {
        return preg_match("/^[ぁ-んァ-ヶー]+$/u", $value);
    }

    public function validatePhone($attribute, $value, $parameters)
    {
        return preg_match("/^0[0-9]{1,3}-?[0-9]{2,4}-?[0-9]{3,4}$/", $value);
    }
}
