<?php

namespace App\Http\Controllers\Pages;

use App\Contracts\Common;
use App\Helpers\HelperFunc;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckLoginMemberRequest;
use App\Http\Requests\RegisterMemberRequest;
use App\Http\Requests\RegisterMemberPasswordRequest;
use App\Models\LimeUser;
use App\Models\User;
use App\Models\Password;
use App\Models\SyoutaiKanri;
use App\Models\Policy;
use App\Queues\EmailQueue;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use App\Events\UpdateMemberIinaviInformation;

class MemberController extends Controller
{


    /**
     * Show form of input information email and passcode of new user,
     *
     * @return \Illuminate\Http\Response
     */
    public function showFormCheckRegister()
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }

        // Check exist of session
        if (Session::has('newMember')) {
            // Delete data session
            Session::forget('newMember');
        }

        return view('member.signin');
    }

    /**
     * Check info of user and create a session of new user
     *
     * @param CheckRegisterMemberRequest $request
     * @return \Illuminate\Http\Response
     */
    public function checkRegister(CheckLoginMemberRequest $request)
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }

        $passcode  =  isset($request) ? $request->passcode : "";

        // Check the length
        if (strlen($passcode) <= 6 || strlen($passcode) > 10) {
            return redirect()->route('member.form.check.register')->with(['flash_level'=>'danger','error_message'=>Lang::get('validate.passcode_incorrect')]);
        }

        // Get 4 characters from the 6th character
        $code = substr($passcode, 6, 10);

        /** LimeUser $existLimeUser */
        $existLimeUser = LimeUser::where('company_cd', $code)->where('e_mail',$request->email)->first();

        if (empty($existLimeUser)) {

            return redirect()->route('member.form.check.register')->with(['flash_level'=>'danger','error_message'=>Lang::get('validate.passcode_incorrect')]);
        }
        // Data respone
        $data = [
            'mail' => $request->email,
        ];

        // Check exist of session
        if (Session::has('newMember')) {
            // Delete data session
            Session::forget('newMember');
        }

        // Store data in the session,
        Session::put('newMember', $data);

        return redirect()->action('Pages\MemberController@showFormRegister');
    }

    /**
     * Screen user registration information
     *
     * @param string $email
     * @return \Illuminate\Http\Response
     */
    public function showFormRegister()
    {
        // Check exist of session
        if (!Session::has('newMember')) {
            return redirect()->route('member.form.check.register');
        }

        // List data province
        $province = Common::listProvince();

        // Get info member from session
        $newMember = Session::get('newMember');

        return view('member.register', compact('province', 'newMember'));
    }

    /**
     * Update info of new user in session
     *
     * @param RegisterMemberRequest $request
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterMemberRequest $request)
    {
        // Check exist of session
        if (!Session::has('newMember')) {
            return redirect()->route('member.form.check.register');
        }

        /** @var LimeUser $limeUser  */
        $limeUser = LimeUser::where('e_mail', $request->mail)->first();

        if(!$limeUser) {
            // Not found lime user
            return redirect()->route('member.form.check.register')->withErrors(['email', 'E00003']);
        }

        // Fill data from request
        $user = new User($request->only('mail', 'sei_local', 'mei_local', 'sei_kana',
                    'idm_denwa_no', 'idm_keitai_tel', 'todouhuken_mei', 'mei_kana',
                    'sikutyouson_mei', 'tyoumei', 'tat_mei'
                ));

        if ($request->has('zip_first') && $request->has('zip_second')) {
            $zip_first = $request->input('zip_first');
            $zip_second = $request->input('zip_second');
        }

        // Data from Session
        $dataSession = Session::get('newMember');


        $infoMember = array_merge($user->toArray(), ['mail' => $dataSession['mail'],'tyoumei'=>HelperFunc::convertKana($request->tyoumei),'tat_mei'=>HelperFunc::convertKana($request->tat_mei)]);

        // Add data to session
        Session::put('newMember', array_merge($infoMember, ['zip_first' => $zip_first, 'zip_second' => $zip_second]));

        return redirect()->action('Pages\MemberController@confirmRegister');

    }

    /**
     * Screen confirm register new member
     *
     * @return \Illuminate\Http\Response
     */
    public function confirmRegister()
    {
        // Check exist of session
        if (!Session::has('newMember')) {
            return redirect()->route('member.form.check.register');
        }

        if (count(Session::get('newMember')) <= 1) {
            return redirect()->route('member.form.register');
        }

        // Get data form session
        $member = Session::get('newMember');
        $limeUser = LimeUser::where('e_mail', $member['mail'])->first();
        $registerPolicy = Policy::getRegisterPolicyLink($limeUser, User::TYPE_LIME_NORMAL);

        return view('member.confirm-register', compact('member', 'registerPolicy'));
    }

    /**
     *
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function successRegisterTemporary(Request $request)
    {

        // Check exist of session
        if (!Session::has('newMember')) {
            return redirect()->route('member.form.check.register');
        }

        // Check whether the user has ticked or not
        if (!$request->has('agree')) {
            return redirect()->back()->withErrors(['agree' => Lang::get('validate.check_agrre.required')]);
        }

        // Get data from session
        $infoMember = Session::get('newMember');

        /** @var LimeUser $limeUser  */
        $limeUser = LimeUser::where('e_mail', $infoMember['mail'])->first();

        if(!$limeUser) {
            // Not found lime user
            return redirect()->route('member.form.check.register')
                    ->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
        }

        $dataUser = User::where('mail', $infoMember['mail'])->first();

        if (!empty($dataUser) && $dataUser->regis_status == User::STT_NOT_REGIST) {

            $user = User::find($dataUser->knr_user_id);

            $user->fill($infoMember);

            $user->knr_user_id = User::CH_LIME . $limeUser->global_id . User::CODE_NEW_MEMBER;
            $user->touroku_cd = 'lixils' . $limeUser->company_cd;
            $user->zip_no = $infoMember['zip_first'] . $infoMember['zip_second'];
            $user->regis_status = User::STT_NOT_REGIST;
            $user->kengine_status = User::NOT_LINKED;
            $user->enavi_status = User::NOT_LINKED;
            $user->lixil_online_status = User::NOT_LINKED;
            $user->renkei_status_1 = User::NOT_LINKED;
            $user->renkei_status_2 = User::NOT_LINKED;
            $user->renkei_status_3 = User::NOT_LINKED;
            $user->genba_zyusyo_flg = User::GENBA_ZYUSYO_LIME;
            $user->syokai_knr_user_id = User::CH_LIME . $limeUser->global_id . User::CODE_NEW_MEMBER;
            $user->syahan_kakeritsu = User::SYAHAN_KEKARITSU_LIME;
            $user->company_cd = $limeUser->company_cd;
            $user->company_mei = isset($limeUser->company_name) ? $limeUser->company_name : null;
            $user->regis_lmt_ymd = Carbon::createFromFormat('Y-m-d', $limeUser->end_date);
            $user->pre_regis_ymd = Carbon::now()->format('Y-m-d');
            $user->regis_ymd = Carbon::now()->format('Y-m-d');
            $user->pre_regis_lmt_ymd =  Carbon::now()->copy()->addDays(User::DATE_LIMMIT)->format('Y-m-d');
            $user->kankei_flg = User::KANKEI_LIME;
            $user->admin_flg = User::USER_ADMIN;
            $user->del_flg = User::USER_DEL_FLG_DEFAULT;
            $user->emp_cd = isset($limeUser->emp_cd) ? $limeUser->emp_cd : '00';

            // create guid of new member
            $guid = HelperFunc::makeUniqueCode(User::class, 'guid', 36);
            $user->guid = $guid;

        } else {
            /** User $user */
            $user = new User();

            // fill data information of user
            $user->fill($infoMember);

            $user->knr_user_id = User::CH_LIME . $limeUser->global_id . User::CODE_NEW_MEMBER;
            $user->touroku_cd = 'lixils' . $limeUser->company_cd;
            $user->zip_no = $infoMember['zip_first'] . $infoMember['zip_second'];
            $user->regis_status = User::STT_NOT_REGIST;
            $user->kengine_status = User::NOT_LINKED;
            $user->enavi_status = User::NOT_LINKED;
            $user->lixil_online_status = User::NOT_LINKED;
            $user->renkei_status_1 = User::NOT_LINKED;
            $user->renkei_status_2 = User::NOT_LINKED;
            $user->renkei_status_3 = User::NOT_LINKED;
            $user->genba_zyusyo_flg = User::GENBA_ZYUSYO_LIME;
            $user->syokai_knr_user_id = User::CH_LIME . $limeUser->global_id . User::CODE_NEW_MEMBER;
            $user->syahan_kakeritsu = User::SYAHAN_KEKARITSU_LIME;
            $user->company_cd = $limeUser->company_cd;
            $user->company_mei = isset($limeUser->company_name) ? $limeUser->company_name : null;
            $user->regis_lmt_ymd = Carbon::createFromFormat('Y-m-d', $limeUser->end_date);
            $user->pre_regis_ymd = Carbon::now()->format('Y-m-d');
            $user->regis_ymd = Carbon::now()->format('Y-m-d');
            $user->pre_regis_lmt_ymd =  Carbon::now()->copy()->addDays(User::DATE_LIMMIT)->format('Y-m-d');
            $user->kankei_flg = User::KANKEI_LIME;
            $user->admin_flg = User::USER_ADMIN;
            $user->del_flg = User::USER_DEL_FLG_DEFAULT;
            $user->emp_cd = isset($limeUser->emp_cd) ? $limeUser->emp_cd : '00';

            // create guid of new member
            $guid = HelperFunc::makeUniqueCode(User::class, 'guid', 36);
            $user->guid = $guid;

        }
        DB::beginTransaction();
        try {
            // Create member
            $user->save();

            if ($limeUser->emp_cd != 50 && $limeUser->emp_cd != 60) {

                $syoutaiKanri = SyoutaiKanri::find($user->knr_user_id);

                if (!$syoutaiKanri) {
                    /** @var SyoutaiKanri $syoutaiKanri */
                    $syoutaiKanri = new SyoutaiKanri();
                    $syoutaiKanri->knr_user_id = $user->knr_user_id;
                }

                // Fill data
                $syoutaiKanri->syoutai_start_ymd = Carbon::now();
                $syoutaiKanri->syoutai_end_ymd = Carbon::now()->copy()->addYear();
                $syoutaiKanri->syoutai_cnt = 0;
                $syoutaiKanri->syoutai_lmt_cnt = SyoutaiKanri::LIMIT_RELEASE;
                $syoutaiKanri->patch_id = 1;

                // Create new record
                $syoutaiKanri->save();
            }

            DB::commit();
        } catch (Exception $ex) {
            throw $ex;
            DB::rollback();
            return redirect()->back()
                    ->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
        }
        $dateend = Carbon::now()->copy()->addDays(User::DATE_LIMMIT)->format('Y-m-d');
        $year = substr($dateend,0,4);
        $month = substr($dateend,5,2);
        $day = substr($dateend,8,2);

         // Send mail
        Mail::to($user->mail)->queue(new EmailQueue(
                    'mails.member.confirm-register',
                    Lang::get('register.Subject mail confirm register'),
                    [
                        'guid' => $guid,
                        'name' => $user->sei_local . ' ' . $user->mei_local,
                        'date_limit' => $year.'年'.$month.'月'.$day.'日',
                    ]
        ));

        // remove session
        Session::forget('newMember');

        // Success
        return redirect()->action('Pages\MemberController@thanksRegistered');
    }

    /**
     * Screen thanks member after register success temporary
     *
     * @return \Illuminate\Http\Response
     */
    public function thanksRegistered()
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }
        // Check exist of session
        if (Session::has('newMember')) {
            // Delete data session
            Session::forget('newMember');
        }

        return view('member.thanks');
    }

    /**
     * Screen register password of member
     *
     * @param string $guid
     * @return \Illuminate\Http\Response
     */
    public function formRegisterPassword($guid)
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }

        $user = User::where('guid', '=', $guid)->first();

        // Not exist user
        if (!$user) {
            $user = null;
            return view('member.password', compact('user'));
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

        return view('member.password', compact('user'));
    }

    /**
     * Register password of member and update info user
     *
     * @param string $guid
     * @param RegisterMemberPasswordRequest $request
     * @return \Illuminate\Http\Response
     */
    public function registerPassword(RegisterMemberPasswordRequest $request)
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }

        $user = User::where('mail', '=', $request->email)->first();

        if (!$user) {
            return view('member.password', compact('user'));
        }

        /** @var Password $password */
        $password = new Password();

        // Fill data
        $password->knr_user_id = $user->knr_user_id;
        $password->pwd = $request->password;
        $password->pwd_upd_date = Carbon::now();
        $password->upd_date = Carbon::now();

        DB::beginTransaction();
        try {
            // Create password for member
            $password->save();

            // Update info member
            $user->regis_status = User::STT_REGISTED;
            $user->guid = '';
            $user->save();

            DB::commit();
        } catch (Exception $ex) {
            throw $ex;
            DB::rollback();
            return redirect()->back()
                    ->withErrors('error_message', Lang::trans('register.An error occurred, please try again'));
        }

        // fire event
        event(new UpdateMemberIinaviInformation(array_merge($user->toArray(), ['password' => md5($request->password)])));

        // Send mail success
        Mail::to($user->mail)->queue(new EmailQueue(
                    'mails.member.success-register',
                    Lang::get('register.Subject mail register success'),
                    ['name' => $user->sei_local . ' ' . $user->mei_local]
                ));

        return redirect()->action('Pages\MemberController@successRegister');
    }

    /**
     * Screen register success
     *
     * @return \Illuminate\Http\Response
     */
    public function successRegister()
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }

        return view('member.success');
    }
}
