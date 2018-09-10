<?php

namespace App\Http\Controllers\RegisterFamily;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFamilyRequest;
use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Queues\EmailQueue;
use App\Models\Syoutai;
use App\Contracts\Common;
use App\Models\User;
use App\Models\Password;
use App\Models\Policy;
use Carbon\Carbon;
use DB;
use App\Helpers\HelperFunc;
use App\Events\UpdateMemberIinaviInformation;

class RegisterFamilyController extends Controller
{
    /**
     * Gets the form register family.
     *
     * @return     <type>  The form register family.
     */
    public function getFormRegisterFamily()
    {
        if (Auth::user()) {

            return redirect()->route('page.index');
        }

        if (!Session::has('newMember')) {
            return redirect('accuracy-family');
        }

        // List data province
        $province = Common::listProvince();

        // Get info member from session
        $newMember = Session::get('newMember');
    	return view('registerfamily.register-family', compact('province', 'newMember'));
    }

    /**
     *
     * @param RegisterFamilyRequest $request
     * @return \Illuminate\Http\Response
     */
    public function registerFamily(RegisterFamilyRequest $request)
    {


        if (!Session::has('newMember')) {
            return redirect('accuracy-family');
        }

        $dataSyoutai = Syoutai::where('syoutai_mail', $request->mail )->first();

        if(!$dataSyoutai) {
            return redirect('accuracy-family')->withErrors(['email', 'E00003']);
        }

        $user = new User($request->only('mail', 'sei_local', 'mei_local', 'sei_kana',
                    'idm_denwa_no', 'idm_keitai_tel', 'todouhuken_mei', 'mei_kana',
                    'sikutyouson_mei', 'tyoumei', 'tat_mei'
                ));


        if ($request->has('zip_first') && $request->has('zip_second')) {
            $zip_first = $request->input('zip_first');
            $zip_second = $request->input('zip_second');
        }

        $dataSession = Session::get('newMember');


        $infoMember = array_merge($user->toArray(), ['mail' => $dataSession['mail'],'tyoumei'=>HelperFunc::convertKana($request->tyoumei),'tat_mei'=>HelperFunc::convertKana($request->tat_mei)]);

        Session::put('newMember', array_merge($infoMember, ['zip_first' => $zip_first, 'zip_second' => $zip_second]));

        return redirect('confirm-register-family');

    }

    /**
     * { function_description }
     */

    public function confirmRegisterFamily()
    {
        if (Auth::user()) {

            return redirect()->route('page.index');
        }

        if (!Session::has('newMember')) {
            return redirect()->route('register_family.accuracy_family');
        }

        $member = Session::get('newMember');
        $dataSyoutai = Syoutai::where('syoutai_mail', $member['mail'])->first();
        $registerPolicy = Policy::getRegisterPolicyLink($dataSyoutai, User::TYPE_FAMILY);

        return view('registerfamily.confirm-information', compact('member', 'registerPolicy'));

    }

   	/**
   	 * Posts a form register family.
   	 */

    public function successRegisterFamily(Request $request)
    {
        $validate = Validator::make($request->only('agree'), [
            'agree' => 'required'
        ], [
            'agree.required' => trans('validate.check_agrre.required'),

        ]);

        if ($validate->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validate->errors());
        }

        if (!Session::has('newMember')) {
            return redirect('confirm-register-family');
        }

        if (!$request->has('agree')) {
            return redirect()->back();
        }

        $infoMember = Session::get('newMember');
        
        $dataSyoutai = Syoutai::where('syoutai_mail', $infoMember['mail'])->first();
        
        $dataUserL = User::where('knr_user_id',$dataSyoutai->knr_user_id)->first();
        if(!$dataSyoutai) {
            return redirect('confirm-register-family')->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
        }
        $id = substr($dataSyoutai->knr_user_id ,1 ,10);
        
        // F＋社員Global-ID+ 連番
        $number =  User::where('knr_user_id','LIKE',"%{$id}%")->whereYear('regis_lmt_ymd',date('Y'))->get();

        $number = count($number);

        $guid = HelperFunc::makeUniqueCode(User::class, 'guid', 36);
        
        $dataUser = User::where('mail',$dataSyoutai->syoutai_mail)->first();
        
        if (!empty($dataUser) && $dataUser->regis_status == User::STT_NOT_REGIST) {
            
            $user = User::find($dataUser->knr_user_id);
           
            $user->fill($infoMember);

            $ip = $request->ip();
           
            $user->zip_no               = $infoMember['zip_first'] . $infoMember['zip_second'];
            $user->regis_status         = User::STT_NOT_REGIST;
            $user->company_mei          = User::COMPANY_MEI_FAMILY;
            $user->kengine_status       = User::NOT_LINKED;
            $user->enavi_status         = User::NOT_LINKED;
            $user->lixil_online_status  = User::NOT_LINKED;
            $user->renkei_status_1      = User::NOT_LINKED;
            $user->renkei_status_2      = User::NOT_LINKED;
            $user->renkei_status_3      = User::NOT_LINKED;
            $user->genba_zyusyo_flg     = User::GENBA_ZYUSYO_FAMILY;
            $user->guid                 = $guid;
            $user->syokai_knr_user_id   = $dataSyoutai->knr_user_id;
            $user->touroku_cd           = $dataSyoutai->syoutai_cd;
            $user->syahan_kakeritsu     = User::SYAHAN_KEKARITSU_FAMILY;
            $user->regis_ymd            = null;
            $user->regis_lmt_ymd        = $dataUserL->regis_lmt_ymd;
            $user->pre_regis_ymd        = Carbon::now()->format('Y-m-d');
            $user->pre_regis_lmt_ymd    = Carbon::now()->copy()->addDays(User::DATE_LIMMIT)->format('Y-m-d');
            $user->kankei_flg           = User::KANKEI_FAMILY;
            $user->admin_flg            = User::USER_ADMIN;
            $user->emp_cd               = User::NOT_LINKED;
            $user->del_flg               = User::USER_DEL_FLG_DEFAULT;
            $user->upd_terminal_ip_addr = $ip;
             
        } else {
            /** User $user */
            $user = new User();

            // fill data information of user
            $user->fill($infoMember);

            $ip = $request->ip();
            $id = User::CH_FAMILY . $id . User::CODE_NEW_MEMBER_FAMILY.$number;
            $user->knr_user_id          = HelperFunc::checkIdUserUnique(User::class,'knr_user_id',$id);
            $user->zip_no               = $infoMember['zip_first'] . $infoMember['zip_second'];
            $user->regis_status         = User::STT_NOT_REGIST;
            $user->company_mei          = User::COMPANY_MEI_FAMILY;
            $user->kengine_status       = User::NOT_LINKED;
            $user->enavi_status         = User::NOT_LINKED;
            $user->lixil_online_status  = User::NOT_LINKED;
            $user->renkei_status_1      = User::NOT_LINKED;
            $user->renkei_status_2      = User::NOT_LINKED;
            $user->renkei_status_3      = User::NOT_LINKED;
            $user->genba_zyusyo_flg     = User::GENBA_ZYUSYO_FAMILY;
            $user->guid                 = $guid;
            $user->syokai_knr_user_id   = $dataSyoutai->knr_user_id;
            $user->touroku_cd           = $dataSyoutai->syoutai_cd;
            $user->syahan_kakeritsu     = User::SYAHAN_KEKARITSU_FAMILY;
            $user->regis_ymd            = null;
            $user->regis_lmt_ymd        = $dataUserL->regis_lmt_ymd;
            $user->pre_regis_ymd        = Carbon::now()->format('Y-m-d');
            $user->pre_regis_lmt_ymd    = Carbon::now()->copy()->addDays(User::DATE_LIMMIT)->format('Y-m-d');
            $user->kankei_flg           = User::KANKEI_FAMILY;
            $user->admin_flg            = User::USER_ADMIN;
            $user->emp_cd               = User::NOT_LINKED;
            $user->del_flg               = User::USER_DEL_FLG_DEFAULT;
            $user->upd_terminal_ip_addr = $ip;
            
        }
        
        DB::beginTransaction();
        try {
            // Create member
            $user->save();

            /** @var Syoutai */
            $dataUpdate = array('syoutai_regis_ymd' => Carbon::now()->format('Y-m-d'));
            $dataSyoutai = Syoutai::where('syoutai_mail',$infoMember['mail'])->update($dataUpdate);

            DB::commit();
        } catch (Exception $ex) {
            throw $ex;
            DB::rollback();
            return redirect()->back()
                    ->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
        }

        // send mail confirm
        $dateend = Carbon::now()->addDays(User::DATE_LIMMIT)->format('Y-m-d');
        $year = substr($dateend,0,4);
        $month = substr($dateend,5,2);
        $day = substr($dateend,8,2);

        Mail::to($infoMember['mail']  )->queue(new EmailQueue(
                    'mails.confirm-register-family',
                    Lang::get('register.sub_register_family'),
                        [
                            'guid'   => $guid,
                            'name' => $user->sei_local . ' ' . $user->mei_local,
                            'date_limit' => $year.'年'.$month.'月'.$day.'日',
                        ]
                ));
        return redirect('thanks-rgister-family');
    }


    /**
     * thanksRegisterFamily()
     *
     * @return  \Illuminate\View\View
     */
    public function thanksRegisterFamily()
    {

        if (Auth::user()) {

            return redirect()->route('page.index');
        }

        if (Session::has('newMember')) {

            Session::forget('newMember');
        }

        return view('registerfamily.thanks');
    }

    /**
     * update password user
     *
     * @param string $guid
     */
    public function updatePassword($guid)
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }
        
        $user = User::where('guid', '=', $guid)->first();

        // Not exist user
        if (!$user) {
            return view('registerfamily.update-password', compact('user'));
        }

        $now = Carbon::now();
        $dateLimit = Carbon::createFromFormat('Y-m-d', $user->pre_regis_lmt_ymd)->setTime(23, 59, 59);
       
        // The registration deadline has expired
        if ($dateLimit->lt($now)) {
            $user->del_flg = User::USER_DELETED;
            
            if (!$user->save()) {
                return redirect()->back()
                        ->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
            } 
            $user = null;
        } else {
            
            $user->regis_ymd = Carbon::now();
            if (!$user->save()) {
                return redirect()->back()
                                ->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
            }
        }

        

        return view('registerfamily.update-password', compact('user','guid'));
    }

    /**
     * Update password
     *
     * @param string $guid
     * @param UpdatePasswordRequest $request
     * @return type
     */
    public function postUpdatePassword($guid, UpdatePasswordRequest $request)
    {
        // update database
        $dataUser = User::where('guid', $guid)->first();

        if (empty($dataUser)) {
            $mail = "";
            return view('registerfamily.update-password', compact('guid', 'mail'));
        }

        $password = new Password();

        $password->knr_user_id = $dataUser->knr_user_id;
        $password->pwd = $request->password;
        $password->pwd_upd_date = Carbon::now()->format('Y-m-d H:i:s');
        $password->upd_date = Carbon::now()->format('Y-m-d H:i:s');

        DB::beginTransaction();
        try {
            // Create password for member
            $password->save();

            // Update info member

            $dataUser->regis_status = User::STT_REGISTED;
            $dataUser->regis_ymd = Carbon::now()->format('Y-m-d');
            $dataUser->guid = null;
            $dataUser->save();

            DB::commit();
        } catch (Exception $ex) {
            throw $ex;
            DB::rollback();
            return redirect()->back()
                    ->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
        }

         // fire event
        event(new UpdateMemberIinaviInformation(array_merge($dataUser->toArray(), ['password' => md5($request->password)])));

        // Send mail success
        Mail::to($dataUser->mail)->queue(new EmailQueue(
                    'mails.success-register-family',
                    Lang::get('register.Subject mail register success'),
                    ['name' => $dataUser->sei_local . ' ' .$dataUser->mei_local]
                ));

        return redirect('success-update-password');

    }

    /**
     * { function_description }
     *
     * @return \Illuminate\View\View
     */
    public function successUpdatePassword()
    {

        return view('registerfamily.success');
    }

}
