<?php

namespace App\Listeners;

use App\Events\LoginIinavi;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Helpers\Api;
use App\Contracts\ApiService;
use App\Contracts\Common;

class LoginIinaviListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LoginIinavi  $event
     * @return void
     */
    public function handle(LoginIinavi $event)
    {
        $param = [
            'clientId'   => ApiService::CLIENT_ID,
            'serverName' => ApiService::SERVER_NAME,
        ];
        $url = ApiService::URL_ACCESS_TOKEN;

        $respone = Api::json('post', $url, $param, [], true);

        if (isset($respone) && count($respone)) {
            if ($respone['status'] == 'OK') {
                $jwt = $respone['jwt'];
            }
        }

        $user = $event->user;

        if (isset($jwt)) {
            $paramLogin = [
                'web_login' => $user['mail'],
                'password'  => $user['password'],
            ];
            $urlLogin = ApiService::URL_LOGIN_IINAVI;

            $login = Api::json('post', $urlLogin, $paramLogin, ['Authorization' => 'Bearer ' . $jwt], true);

            if (isset($login) && count($login)) {
                \Log::info($login);
                return $login;
            } else {
                \Log::info('Error login');
            }
        }
    }

}
