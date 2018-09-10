<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class MinimumNumberBuilderValidationRule implements Rule
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
        $count = 0;
        foreach($value as $v) {
            if ($v == 1) {
                $count++;
            }
        }
        return $count >= 3;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('builder.minimum_number_of_required_builder');
    }
}
