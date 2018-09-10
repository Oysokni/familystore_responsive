<?php

namespace App\Http\Requests;

use App\Rules\MemberExistValidationRule;
use App\Rules\PasswordLoginMemberValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;

class CheckLoginMemberRequest extends FormRequest
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
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:m_lime_user,e_mail', new MemberExistValidationRule],
            'passcode' => ['required', new PasswordLoginMemberValidationRule],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => Lang::trans('validate.email_required'),
            'email.email' => Lang::trans('validate.email_valid'),
            'email.exists' => Lang::trans('validate.email_valid_exists'),
            'passcode.required' => Lang::trans('validate.passcode_required'),
        ];
    }
}
