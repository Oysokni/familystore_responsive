<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use App\Helpers\HelperFunc;

class RegisterMemberPasswordRequest extends FormRequest
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
            'password' => ['required','min:8','max:20', 'regex:/^.*[0-9|'. HelperFunc::SPEC_CHAR .']+[a-zA-Zｧ-ﾝﾞﾟ]*$/', 'confirmed'],
            'password_confirmation'=> 'required',
        ];
    }

    public function messages()
    {
        return [
            'password.required' => Lang::trans('validate.password_required'),
            'password.min' => Lang::trans('validate.password_min'),
            'password.max' => Lang::trans('validate.password_max'),
            'password.confirmed' => Lang::trans('validate.password_confirmed'),
            'password.regex' => Lang::trans('validate.password_valid'),
            'password_confirmation.required' => Lang::trans('validate.password_required'),
        ];
    }
}
