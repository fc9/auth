<?php

namespace App\Http\Requests;

class RegisterRequest extends AbstractFormRequest
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
        $filters = config('request.filters');

        return [
            'indicator' => $filters['indicator'],
            'email' => $filters['email'],
            'first_name' => $filters['first_name'],
            'last_name' => $filters['last_name'],
            'username' => $filters['username'],
            'password' => $filters['password'],
            //'country' => $filters['country'],
            'phone' => $filters['phone'],
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = config('request.rules');

        return [
            'indicator' => explode('|', $rules['indicator_register']) + [10 => new \App\Http\Requests\Rules\Qualified], //TODO: serializar
            'email' => $rules['email'],
            'first_name' => $rules['first_name'],
            'last_name' => $rules['last_name'],
            'username' => $rules['username_register'],
            'password' => $rules['password'],
            'country' => $rules['country_code'],
            'phone' => $rules['phone'],
        ];
    }
}
