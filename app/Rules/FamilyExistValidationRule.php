<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Lang;
use App\Models\User;

class FamilyExistValidationRule implements Rule
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
        $flg = User::USER_DELETED;
        $regis_status = User::STT_REGISTED;
        
        $user = User::where('mail', '=', $value)
                ->where('regis_status', $regis_status)
                ->Where('del_flg', '<>', $flg)
                ->first();

        if (isset($user) && count($user)) {
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
        return Lang::trans('validate.email_exists_family');
    }
}
