<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\LimeUser;
use Illuminate\Support\Facades\Lang;

class PasswordLoginMemberValidationRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // Check the length
        if (strlen($value) <= 6 || strlen($value) > 10) {
            return false;
        }

        // Get 4 characters from the 6th character
        $code = substr($value, 6, 10);

        /** LimeUser $existLimeUser */
        $existLimeUser = LimeUser::where('company_cd', $code)->first();

        // Check exits of lime user
        if (!$existLimeUser) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return Lang::get('validate.passcode_incorrect');
    }
}
