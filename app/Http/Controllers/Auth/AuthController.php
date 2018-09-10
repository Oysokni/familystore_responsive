<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Notify;
use App\Models\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Helpers\HelperFunc;
use Illuminate\Support\Facades\Mail;
use App\Queues\EmailQueue;
use Carbon\Carbon;

class AuthController extends Controller
{
    /**
     * show login form
     */
    public function login()
    {
        if (auth()->check()) {
            return redirect()->route('page.top_page');
        }
        return view('auth.login', [
            'notifyList' => Notify::getData([
                'type' => [Notify::TYPE_LOGIN],
                'orderby' => 'osirase_start_ymd',
                'order' => 'desc'
            ])
        ]);
    }
    /**
     * login action
     * @param Request $request
     * @return type
     */
    public function postLogin(Request $request)
    {
        $validate = Validator::make($request->only('email', 'password'), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => trans('validate.email_required'),
            'email.email' => trans('validate.email_valid'),
            'password.required' => trans('validate.password_required')
        ]);
        if ($validate->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validate->errors());
        }
        $email = $request->get('email');
        $password = $request->get('password');
        $user = User::where('mail', $email)
                ->where(function ($query) {
                    $query->whereNull('del_flg')
                            ->orWhere('del_flg', User::USER_DEL_FLG_DEFAULT);
                })
                ->where('regis_status', intval(User::STT_REGISTED))
                ->first();
        //check exists user
        if (!$user) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('error_message', trans('auth.email_or_password_invalid'));
        }
        //check regis limit
        if ($user->regis_lmt_ymd) {
            $dateLimit = Carbon::parse($user->regis_lmt_ymd)->setTime(23, 59, 59);
            //less than now
            if ($dateLimit->lt(Carbon::now())) {
                return redirect()
                        ->back()
                        ->withInput()
                        ->with('error_message', trans('auth.account_has_expired'));
            }
        }
        $userPass = $user->password;
        //check too many login attempts
        if ($userPass->login_fail_cnt
                && $userPass->login_fail_cnt >= User::MAX_ATTEMPT - 1) {
            $updateTime = Carbon::parse($userPass->upd_date);
            $timeNow = Carbon::now();
            //check last time attempt
            if ($updateTime->addMinutes(User::TIME_EXPIRED)->gte($timeNow)) {
                $seconds = $updateTime->timestamp - $timeNow->timestamp;
                return redirect()
                    ->back()
                    ->withInput()
                    ->with('error_message', trans('auth.throttle', ['seconds' => $seconds]));
            }
        }
        //check password
        $checkPass = Hash::check($password, $userPass->pwd);
        if ($checkPass) {
            Auth::guard()->login($user);
            $request->session()->regenerate();
            $userPass->login_fail_cnt = null;
            $userPass->save();
            $user->last_login_date = Carbon::now()->format('Y-m-d H:i:s');
            $user->save();

            if (session()->has('userIinavi')) {
                session()->forget('userIinavi');
            }
            session(['userIinavi' => array_merge($user->toArray(), [
                    'password' => md5($password),
                ])
            ]);

            return redirect()
                    ->intended(route('page.top_page'));
        }
        // If the login attempt was unsuccessful we will increment the number of attempts
        $userPass->incrementLoginFail();
        return redirect()
                ->back()
                ->withInput()
                ->with('error_message', trans('auth.email_or_password_invalid'));
    }
    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::guard()->logout();
        $request->session()->invalidate();
        return redirect()
                ->route('auth.login');
    }
    /**
     * render form forget password
     */
    public function forgetPasswd()
    {
        return view('auth.forget-password');
    }
    /**
     * process data forget password
     * @param Request $request
     * @return type
     */
    public function postForgetPasswd(Request $request)
    {
        $validate = Validator::make($request->only('email'), [
            'email' => 'required|email'
        ], [
            'email.required' => trans('validate.email_required'),
            'email.email' => trans('validate.email_valid')
        ]);
        //check validate
        if ($validate->fails()) {
            return redirect()->back()->withInput()->withErrors($validate->errors());
        }
        $email = $request->get('email');
        $user = User::where('mail', $email)
                ->where(function ($query){
                    $query->whereNull('del_flg')
                        ->orWhere('del_flg', User::USER_DEL_FLG_DEFAULT);
                })
                ->first();
        //check exists user
        if (!$user) {
            return redirect()->back()->withInput()->with('error_message',
                    trans('auth.email_sending_incorrect'));
        }
        $userPasswd = $user->password;
        //generate guid
        $guid = HelperFunc::makeUniqueCode(Password::class, 'guid');
        $userPasswd->guid = $guid;
        $userPasswd->mail_send_date = Carbon::now()->format('Y-m-d H:i:s');
        $userPasswd->save();
        //send mail
        Mail::to($email)
                ->queue(new EmailQueue(
                        'mails.auth.forget-password',
                        trans('auth.reset_password_subject'),
                        [
                            'guid' => $guid,
                            'dirName' => $user->sei_local . ' ' . $user->mei_local
                        ]
                    ));
        return view('auth.sent-mail-finish', ['email' => $email]);
    }
    /**
     * render form reset password
     * @param type $guid
     * @return type
     */
    public function resetPasswd($guid)
    {
        $errorMessage = null;
        $view = 'auth.reset-password';
        $userPasswd = Password::where('guid', $guid)
                ->first();
        if (!$userPasswd) {
            $errorMessage = trans('auth.invalid_guid');
            return view($view, compact('errorMessage'));
        }
        $timeUpdate = Carbon::parse($userPasswd->mail_send_date);
        //check if time update less expired
        if ($timeUpdate->lt(Carbon::now()->subHours(User::TIME_RESET_PWD))) {
            $errorMessage = trans('auth.time_reset_password_expired');
            return view($view, compact('errorMessage'));
        }
        $showForm = true;
        $email = $userPasswd->user->mail;
        return view($view, compact('guid', 'email', 'errorMessage'));
    }
    /**
     * process reset new password
     * @param Request $request
     * @return type
     */
    public function postResetPasswd(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'password' => 'required|confirmed',
            'guid' => 'required'
        ], [
            'password.required' => trans('validate.password_required'),
            'password.confirmed' => trans('validate.password_confirmed'),
            'guid.required' => trans('auth.invalid_guid')
        ]);
        if ($validate->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validate->errors());
        }
        $newPass = $request->get('password');
        //check password format
        if (strlen($newPass) < 8 || strlen($newPass) > 20 ||
                !preg_match('/^.*[0-9|'. HelperFunc::SPEC_CHAR .']+[a-zA-Zｧ-ﾝﾞﾟ]*$/', $newPass)) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors(['password' => trans('validate.password_format')]);
        }
        $guid = $request->get('guid');
        $userPasswd = Password::where('guid', $guid)
                ->first();
        //check has guid
        if (!$userPasswd) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('error_message', trans('auth.invalid_guid'));
        }
        $timeUpdate = Carbon::parse($userPasswd->mail_send_date);
        //check if time update less expired
        if ($timeUpdate->lt(Carbon::now()->subHours(User::TIME_RESET_PWD))) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->with('error_message', trans('auth.time_reset_password_expired'));
        }
        $oldPass = $userPasswd->pwd;
        $userPasswd->pwd = $newPass;
        $userPasswd->zen_pwd = $oldPass;
        $userPasswd->pwd_upd_date = Carbon::now()->format('Y-m-d H:i:s');
        $userPasswd->guid = null;
        $userPasswd->mail_send_date = null;
        $userPasswd->save();
        return view('auth.reset-password-finish');
    }
}