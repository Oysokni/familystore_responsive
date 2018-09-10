<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use App\Rules\FamilyExistValidationRule;

class AccuracyFamilyRequest extends FormRequest
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
            'syoutai_mail' => ['required', 'email', 'exists:t_syoutai,syoutai_mail', new FamilyExistValidationRule],
            'syoutai_cd'   => ['required']
            
        ];
    }

    public function messages()
    {

        return [

            'syoutai_mail.required' => Lang::trans('validate.email_required'),
            'syoutai_mail.email'    => Lang::trans('validate.email_valid'),
            'syoutai_mail.exists'   => Lang::trans('validate.email_exists_family'),
            'syoutai_cd.required'   => Lang::trans('validate.syoutai_cd_required'),
            
        ];
    }
}
