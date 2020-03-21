<?php

namespace App\Http\Requests\Rules;

use App\Models\UserView;
use Illuminate\Contracts\Validation\Rule;

class Qualified implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return UserView::where('username', $value)
            ->where('user_status', improve(config('auth::parameters.status'))->active)
            ->where('membership_status', improve(config('auth::parameters.membership.status'))->active)
            ->where('graduate', '!=', improve(config('auth::parameters.membership.graduate'))->partner)
            ->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute not found or unqualified.';
    }
}
