<?php

namespace App\Http\Requests;

class LoginRequest extends AbstractFormRequest
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
     *  Filters to be applied to the input.
     *
     * @return array
     */
    public function filters()
    {
        return [
            'username' => config('request.filters.username'),
            'password' => config('request.filters.password'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => config('request.rules.username'),
            'password' => config('request.rules.password'),
        ];
    }
}
