<?php

namespace App\Http\Controllers\Iinavi;

use App\Contracts\ApiService;
use App\Helpers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Events\UpdateMemberIinaviInformation;
use App\Events\LoginIinavi;

class IinaviController extends Controller
{
    /**
     * Screen login iinavi
     *
     * @return \Illuminate\View\View
     */
    public function loginIinavi()
    {
        if (session()->has('iinavi')) {
            $isLogin = 1;
            return view('cart.includes.login-iinavi', compact('isLogin'));
        }
        // Call Api
        $param = [
            'clientId'   => ApiService::CLIENT_ID,
            'serverName' => 'lffs.lixil.jp',
        ];
        $url = ApiService::URL_ACCESS_TOKEN;

        $respone = Api::json('post', $url, $param, [], true);

        if (isset($respone) && count($respone)) {
            if ($respone['status'] == 'OK') {
                if (session()->has('access_token')) {
                    session()->forget('access_token');
                }
                session(['access_token' => $respone['jwt']]);
            }
            $success = 1;
        } else {
            $success = 0;
        }

        return view('cart.includes.login-iinavi', compact('success'));
    }

    /**
     * Login iinavi with ajax
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function postLoginIinavi(Request $request)
    {
        if ($request->ajax()) {

            // Validations data
            $validate = Validator::make($request->only('email', 'password'), [
                    'email'    => 'required|email',
                    'password' => 'required'
                    ], [
                    'email.required'    => trans('validate.email_required'),
                    'email.email'       => trans('validate.email_valid'),
                    'password.required' => trans('validate.password_required')
            ]);

            if ($validate->fails()) {
                //Error : Validate fail
                return response()->json([
                        'success' => 0,
                        'errors'  => $validate->getMessageBag()->toArray()
                ]);
            }

            // Call Api
            $param = [
                'web_login' => $request->input('email'),
                'password' => md5($request->input('password')),
            ];

            $url = ApiService::URL_LOGIN_IINAVI;
            $token = session()->get('access_token');

            $login = Api::json('post', $url, $param, ['Authorization' => 'Bearer '.$token], true);

            if (isset($login) && count($login)) {
                if ($login['status'] == 'OK') {
                    if (session()->has('iinavi')) {
                        session()->forget('iinavi');
                    } else {
                        session([
                            'iinavi' => [
                                'status'  => $login['status'],
                                'user_id' => $login['user_id'],
                                'message' => '連携に成功しました。'
                            ]
                        ]);
                    }
                } else {
                    return response()->json([
                            'success' => 0,
                            'errors'  => [
                                'server' => ['メールアドレスまたはパスワードが正しくありません。'],
                            ],
                    ]);
                }
            } else {
                return response()->json([
                        'success' => 1,
                ]);
            }

            // Success
            return response()->json([
                    'success' => 1,
            ]);
        }

        return response()->json([
                'success' => 0,
        ]);
    }

    /**
     * Modal confirm
     *
     * @return \Illuminate\View\View
     */
    public function showModalConfrim()
    {
        $confirm = 1;
        return view('iinavi.update', compact('confirm'));
    }


    /**
     * Update information of use iinavi
     *
     * @return \Illuminate\View\View
     */
    public function updateIinavi()
    {
        if (session()->has('userIinavi')) {
            $user = session()->get('userIinavi');
            $update = event(new UpdateMemberIinaviInformation($user));
            \Log::info($update);
            if ($update[0]['status'] == 'OK') {
                $success = 1;
            } else {
                $success = 0;
            }
            session()->forget('userIinavi');
        }

        \Log::info($success);
        return view('iinavi.update', compact('success'));
    }

    /**
     * Delete Session
     */
    public function deleteSession()
    {
        if (session()->has('userIinavi')) {
            session()->forget('userIinavi');
        }
    }

    public function checkIinavi()
    {
        $url = route('iinavi.update.infor');
        if (session()->has('userIinavi')) {
            $userIinavi = session()->get('userIinavi');

            $loginIinavi = event(new LoginIinavi(['mail' => $userIinavi['mail'], 'password' => $userIinavi['password']]));
            \Log::info($loginIinavi);

            if ($loginIinavi[0]['status'] == 'ERR') {
                return response()->json([
                        'success' => 0,
                        'url'     => $url,
                ]);
            } else {
                return response()->json([
                        'success' => 1,
                ]);
            }
        } else {
            return response()->json([
                    'success' => 1,
            ]);
        }
    }

}
