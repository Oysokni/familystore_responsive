<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RelationTypeRule implements Rule
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
        return $value != '1';
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'パート社員の住宅購入のお申込みは、現在できません。２０１８年４月以降に制度として実施可能になる予定ですので、それまでお待ち下さい。';
    }
}
