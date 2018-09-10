<?php

namespace App\Http\Requests;

use App\Rules\EmloyeeTypeRule;
use App\Rules\NameRule;
use App\Rules\PhoneRule;
use App\Rules\RelationTypeRule;
use App\Rules\ValidateMailBuildingRule;
use App\Rules\MemberExistValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CheckBuildingRequest extends FormRequest
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
            's_sei_kana'          => ['required_unless:syoukai_kbn,01', 'nullable', 'max:100', 'regex:/^([゠ァ-・ヽヾ゛゜ーヿ]+)$/u'],
            's_mei_kana'          => ['required_unless:syoukai_kbn,01', 'nullable', 'max:100', 'regex:/^([゠ァ-・ヽヾ゛゜ーヿ]+)$/u'],
            's_sei_local'         => ['required_unless:syoukai_kbn,01', 'nullable', 'max:40', 'regex:/^[a-zA-Zぁ-ん一-龯]*$/'],
            's_mei_local'         => ['required_unless:syoukai_kbn,01', 'nullable', 'max:40', 'regex:/^[a-zA-Zぁ-ん一-龯]*$/'],
            's_idm_denwa_no'      => ['required_without:s_idm_keitai_tel', 'nullable', 'numeric', 'regex:[[0-9]]', 'digits_between:1,32'],
            's_idm_keitai_tel'    => ['required_without:s_idm_denwa_no', 'nullable', 'numeric', 'regex:[[0-9]]', 'digits_between:1,32'],
            'renraku_kbn_check'   => 'required',
            'syoukai_kbn'         => ['required'],
            's_tat_mei'           => ['nullable', 'max:50', 'regex:/^[a-zA-Z一-龯0-9０-９\- ]*$/'],
            'addr21'              => ['required_unless:syoukai_kbn,01', 'nullable', 'max:50', "regex:/^[ぁ-んァ-ン一-龯]*$/"],
            'strt21'              => ['required_unless:syoukai_kbn,01', 'nullable', 'max:50', "regex:/^[a-zA-Z一-龯0-9０-９\- ]*$/"],
            'bkn_sikutyouson_mei' => ['nullable', 'max:50', "regex:/[、-〿぀-ゟ゠-ヿ一-龯㐀-䶿]*$/"],
            'tyuko_flg'           => 'nullable',
            's_mail'              => ['required_unless:syoukai_kbn,01','nullable', 'email', "regex:/^(?!.*\.{2})([ｧ-ﾝﾞﾟa-zA-Z0-9])([ｧ-ﾝﾞﾟa-zA-Z0-9_.+-])+([ｧ-ﾝﾞﾟa-zA-Z0-9])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/"],
            'zip21'               => ['required_unless:syoukai_kbn,01', 'nullable', 'numeric', "digits:3"],
            'zip22'               => ['required_unless:syoukai_kbn,01', 'nullable', 'numeric', "digits:4"],
            'pref21'              => ['required_unless:syoukai_kbn,01', 'nullable', 'max:4', 'regex:/^[ァ-ン一-龯]*$/'],
            'syain_kbn'           => ['required'],
            'check_test'          => ['required'],
            'check_role'          => ['required'],
            'req_memo'            => 'max:500'
        ];
    }

    /**
     * Set message error
     *
     * @return array
     */
    public function messages()
    {
        return [
            'syozokubusyo_mei.max'              => '100文字以内入力してください。',
            'syozokubusyo_mei.regex'            => 'データ形式が正しくありません。',
            's_sei_kana.max'                    => '200文字以内入力してください。',
            's_sei_kana.regex'                  => '全角カタカナで入力してください',
            's_mei_kana.max'                    => '200文字以内入力してください。',
            's_mei_kana.regex'                  => '全角カタカナで入力してください',
            's_sei_local.max'                   => '100文字以内入力してください。',
            's_sei_local.regex'                 => 'データ形式が正しくありません。',
            's_mei_local.max'                   => '100文字以内入力してください。',
            's_mei_local.regex'                 => 'データ形式が正しくありません。',
            's_idm_keitai_tel.max'              => '32文字以内入力してください。',
            's_idm_keitai_tel.regex'            => 'データ形式が正しくありません。',
            'addr21.max'                        => '50文字以内入力してください。',
            'addr21.regex'                      => 'データ形式が正しくありません。',
            'strt21.max'                        => '50文字以内入力してください。',
            'strt21.regex'                      => trans('validate.Must not contain special characters'),
            's_tat_mei.max'                     => '50文字以内入力してください。',
            's_tat_mei.regex'                   => trans('validate.Must not contain special characters'),
            'bkn_sikutyouson_mei.max'           => '50文字以内入力してください。',
            'bkn_sikutyouson_mei.regex'         => 'データ形式が正しくありません。',
            'tyuko_flg.required'                => '中古住宅紹介希望区分を選択してください。',
            's_mail.email'                      => 'メールアドレスが正しくありません。',
            's_mail.regex'                      => 'データ形式が正しくありません。',
            'zip21.max'                         => '3文字以内入力してください。',
            'zip21.regex'                       => 'データ形式が正しくありません。',
            'zip21.digits'                      => trans('validate.Zip code field is invalid'),
            'zip21.numeric'                     => trans('validate.Zip code field is invalid'),
            'zip22.max'                         => '4文字以内入力してください。',
            'zip22.numeric'                     => trans('validate.Zip code field is invalid'),
            'zip22.digits'                      => trans('validate.Zip code field is invalid'),
            'renraku_kbn_check.required'        => trans('validate.checkbox_reform'),
            'zip21.required_unless'             => trans('validate.This zip is required'),
            'zip22.required_unless'             => trans('validate.This zip is required'),
            'pref21.required_unless'            => trans('validate.The todouhuken_mei is required'),
            'addr21.required_unless'            => trans('validate.The sikutyouson_mei is required'),
            'strt21.required_unless'            => trans('validate.The tyoumei is required'),
            'check_test.required'               => trans('builder.message-checkbox'),
            'check_role.required'               => trans('builder.message-checkbox'),
            'req_memo.max'                      => trans('validate.req_memo_max', ['max' => 500]),
            's_sei_local.required_unless'       => trans('validate.The name is required'),
            's_mei_local.required_unless'       => trans('validate.The name is required'),
            's_sei_kana.required_unless'        => trans('validate.The name katakana is required'),
            's_mei_kana.required_unless'        => trans('validate.The name katakana is required'),
            's_idm_keitai_tel.required_unless'  => trans('validate.The phone is required'),
            's_idm_keitai_tel.numeric'          => trans('validate.The cell phone is incorrect'),
            's_idm_keitai_tel.digits_between'   => trans('validate.The cell phone is incorrect'),
            's_mail.required_unless'            => trans('validate.email_required'),
            's_idm_denwa_no.required_unless'    => trans('validate.The phone is required'),
            's_idm_denwa_no.required_without'   => trans('validate.The phone is required'),
            's_idm_denwa_no.numeric'            => trans('validate.The phone is incorrect'),
            's_idm_denwa_no.digits_between'     => trans('validate.The phone is incorrect'),
            's_idm_keitai_tel.required_without' => trans('validate.The phone is required'),
        ];
    }
}
