<?php

namespace App\Http\Requests;

class UsersRequest extends AbstractFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @inheritDoc
     */
    public function authorize()
    {
        return true;
    }

    /**
     * @inheritDoc
     */
    public function filters()
    {
        $filters = config('request.filters');

        return [
            'indicator' => $filters['indicator'],
            'email' => $filters['email'],
//            'first_name' => $filters['first_name'],
            'last_name' => $filters['last_name'],
            'username' => $filters['username'],
            'password' => $filters['password'],
            //'country' => $filters['country'],
            'phone' => $filters['phone'],
        ];
    }

    /**
     * @inheritDoc
     */
    public function rules()
    {
        $rules = config('request.rules');

        return [
            //'indicator' => explode('|', $rules['indicator']) + [10 => new \App\Http\Requests\Rules\Qualified], //TODO: serializar
            'email' => $rules['email'],
            'first_name' => $rules['first_name'],
            'last_name' => $rules['last_name'],
            'username' => $rules['username'],
            'password' => $rules['password'],
            'country' => $rules['country'],
            //'phone' => $rules['phone'],
        ];
    }
}