<?php

namespace App\Listeners;

use App\Events\UpdateMemberIinaviInformation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Helpers\Api;
use App\Helpers\HelperFunc;
use App\Contracts\ApiService;
use App\Contracts\Common;

class UpdateMemberIinaviInformationListener
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
     * @param  UpdateMemberIinaviInformation  $event
     * @return void
     */
    public function handle(UpdateMemberIinaviInformation $event)
    {
        $province = Common::listProvince();

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
        $phoneNumber = $user['idm_denwa_no'] != '' ? $user['idm_denwa_no'] : $user['idm_keitai_tel'];
        $state = array_search($user['todouhuken_mei'], array_keys($province)) + 1;

        if (isset($jwt)) {
            // Call Api
            $infor = [
                'web_login'       => $user['mail'],
                'password'        => $user['password'],
                'last_name'       => $user['sei_local'],
                'first_name'      => $user['mei_local'],
                'last_pronun'     => $user['sei_kana'],
                'first_pronun'    => $user['mei_kana'],
                'company_name'    => $user['company_mei'],
                'phone'           => HelperFunc::formatPhoneNumber($phoneNumber),
                'zip'             => $user['zip_no'],
                'state'           => $state < 10 ? '0' . $state : (string) $state,
                'city'            => $user['sikutyouson_mei'],
                'address'         => $user['tyoumei'],
                'building'        => $user['tat_mei'],
                'knr_user_id'     => $user['knr_user_id'],
                'info_permission' => 0,
                'work'            => 99,
            ];

            \Log::info($infor);
            $urlUpdateInfor = ApiService::URL_UPDATE_MEMBER;
            $updateInfor = Api::json('post', $urlUpdateInfor, $infor, ['Authorization' => 'Bearer ' . $jwt], true);

            if (isset($updateInfor) && count($updateInfor)) {
                if ($updateInfor['status'] == 'OK') {
                    \Log::info($updateInfor);
                } else {
                    \Log::info($user['mail'] . '-' . \Carbon\Carbon::now(), $updateInfor);
                }
                return $updateInfor;
            } else {
                \Log::info('Error member');
            }
        }
    }

}
