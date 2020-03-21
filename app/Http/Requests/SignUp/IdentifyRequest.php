<?php

namespace App\Http\Requests\SignUp;

use Fc9\Auth\Http\Requests\AbstractFormRequest;
use Waavi\Sanitizer\Laravel\SanitizesInput;

class IdentifyRequest extends AbstractFormRequest
{
    use SanitizesInput;

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
            'indicator' => config('request.filters.indicator'),
            'email' => config('request.filters.email'),
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $indicator_rules = explode('|', config('request.rules.indicator_check'));
        $indicator_rules[] = new \Fc9\Auth\Rules\Qualified;

        return [
            'indicator' => $indicator_rules,
            //'indicator' => ['bail', 'required', 'min:5', 'max:16', 'regex:' . $pattern, new Qualified()],
            'agree_to_terms' => config('request.rules.agree_to_terms'),
            'email' => config('request.rules.email'),
        ];
    }
}
