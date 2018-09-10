<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;


class CodeInviteRequest extends FormRequest
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
            //
            
            
            'syoutai_cd'        => ['required'],
            'syoutai_sei'       => ['required', 'max:40', 'regex:/^[a-zA-Z一-龯]*$/'],
            'syoutai_mei'       => ['required', 'max:40', 'regex:/^[a-zA-Z一-龯]*$/'],
            'syoutai_mail'      => ['required','email'],
            'kankei_flg'        => ['required']
        ];
    }
    
    
    public function messages()
    {

        return [

            'syoutai_cd.required' => Lang::trans('codeinvite.syoutai_cd_required'),
            
            // syoutai_sei
            'syoutai_sei.required' => Lang::trans('validate.The name is required'),
            'syoutai_sei.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 40]),
            'syoutai_sei.regex' => Lang::trans('validate.The name must not contain special characters'),

            // syoutai_mei
            'syoutai_mei.required' => Lang::trans('validate.The name is required'),
            'syoutai_mei.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 40]),
            'syoutai_mei.regex' => Lang::trans('validate.The name must not contain special characters'),
            
            // syoutai_mail
            
            'syoutai_mail.required' => Lang::trans('validate.email_required'),
            'syoutai_mail.email'    => Lang::trans('validate.email_valid'),
            
            //kankei_flg
            'kankei_flg.required'        => Lang::trans('codeinvite.kankei_flg_required'),
            
        ];
    }
}
