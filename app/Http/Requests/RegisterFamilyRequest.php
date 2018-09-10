<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use App\Rules\FamilyExistValidationRule;

class RegisterFamilyRequest extends FormRequest
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

            'mail'            => ['required', 'email', 'exists:t_syoutai,syoutai_mail', new FamilyExistValidationRule],
            'sei_local'       => ['required', 'max:40', 'regex:/^[a-zA-Z一-龯]*$/'],
            'mei_local'       => ['required', 'max:40', 'regex:/^[a-zA-Z一-龯]*$/'],
            'sei_kana'        => ['required', 'max:100', 'regex:/^([゠ァ-・ヽヾ゛゜ーヿ]+)$/u'],
            'mei_kana'        => ['required', 'max:100', 'regex:/^([゠ァ-・ヽヾ゛゜ーヿ]+)$/u'],
            'idm_denwa_no' => 'required_without:idm_keitai_tel|nullable|numeric|regex:[[0-9]]|digits_between:1,32',
            'idm_keitai_tel' => 'required_without:idm_denwa_no|nullable|numeric|regex:[[0-9]]|digits_between:1,32',
            'zip_first'       => 'required|numeric|digits:3',
            'zip_second'      => 'required|numeric|digits:4',
            'todouhuken_mei'  => ['required', 'max:4', 'regex:/^[ァ-ン一-龯]*$/'],
            'sikutyouson_mei' => ['required', 'max:50', 'regex:/^[ァ-ン一-龯０-９]*$/'],
            'tyoumei'         => ['required', 'max:50','regex:/^[a-zA-Z一-龯0-9０-９\- ]*$/'],
            'tat_mei'         => ['nullable', 'max:50', 'regex:/^[a-zA-Z一-龯0-9０-９\- ]*$/'],
        ];
    }

    /**
     * show messages function validate
     *
     * @return     array  ( description_of_the_return_value )
     */

    public function messages()
    {

        return [
           // Email
            'email.required' => Lang::trans('validate.email_required'),
            'email.email'    => Lang::trans('validate.email_valid'),
            'email.exists'   => Lang::trans('validate.email_valid'),

            // Sei local
            'sei_local.required' => Lang::trans('validate.The name is required'),
            'sei_local.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 40]),
            'sei_local.regex' => Lang::trans('validate.The name must not contain special characters'),

           // Mei local
           'mei_local.required' => Lang::trans('validate.The name is required'),
           'mei_local.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 40]),
           'mei_local.regex' => Lang::trans('validate.The name must not contain special characters'),

           // Sei kana
           'sei_kana.required' => Lang::trans('validate.The name katakana is required'),
           'sei_kana.max' => Lang::trans('validate.The name kana must not contain special characters'),
           'sei_kana.regex' => Lang::trans('validate.The name kana must not contain special characters'),

            // Mei kana
            'mei_kana.required' => Lang::trans('validate.The name katakana is required'),
            'mei_kana.max' => Lang::trans('validate.The name kana must not contain special characters'),
            'mei_kana.regex' => Lang::trans('validate.The name kana must not contain special characters'),


            // Phone number
            'idm_denwa_no.required_without' => Lang::trans('validate.The phone is required'),
            'idm_denwa_no.numeric' => Lang::trans('validate.The phone is incorrect'),
            'idm_denwa_no.digits_between' => Lang::trans('validate.The phone is incorrect'),
            'idm_keitai_tel.required_without' => Lang::trans('validate.The phone is required'),
            'idm_keitai_tel.numeric' => Lang::trans('validate.The cell phone is incorrect'),
            'idm_keitai_tel.digits_between' => Lang::trans('validate.The cell phone is incorrect'),

            // Zip code
            'zip_first.required' => Lang::trans('validate.This zip is required'),
            'zip_first.numeric' => Lang::trans('validate.Zip code field is invalid'),
            'zip_first.digits' => Lang::trans('validate.Zip code field is invalid'),
            'zip_second.required' => Lang::trans('validate.This zip is required'),
            'zip_second.numeric' => Lang::trans('validate.Zip code field is invalid'),
            'zip_second.digits' => Lang::trans('validate.Zip code field is invalid'),

            // Address
            'todouhuken_mei.required' => Lang::trans('validate.The todouhuken_mei is required'),
            'todouhuken_mei.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 50]),
            'todouhuken_mei.regex' => Lang::trans('validate.The todouhuken_mei is only fullwidth'),

            'sikutyouson_mei.required' => Lang::trans('validate.The sikutyouson_mei is required'),
            'sikutyouson_mei.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 50]),
            'sikutyouson_mei.regex' => Lang::trans('validate.The sikutyouson_mei is only fullwidth'),

            'tyoumei.required' => Lang::trans('validate.The tyoumei is required'),
            'tyoumei.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 50]),
            'tyoumei.regex' => Lang::trans('validate.Must not contain special characters'),

            'tat_mei.max' => Lang::trans('validate.Field input not be greater than number characters', ['number' => 50]),
            'tat_mei.regex' => Lang::trans('validate.Must not contain special characters'),

        ];
    }


}
