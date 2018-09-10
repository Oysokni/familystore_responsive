<?php

use App\Seeder\BaseSeeder;
use App\Models\User;
use App\Helpers\HelperFunc;
use App\Models\SyoutaiKanri;

class UserSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->checkSeeder()) {
            return;
        }
        
        $users = [
            [
                'knr_user_id'         => 'L1000000003000000',
                'emp_cd'              => '20',
                'mail'                => 'hasegawa@marinax.co.jp',
                'admin_flg'           => 1,
                'kankei_flg'          => '00',
                'sei_local'           => '長谷川',
                'mei_local'           => '洋志',
                'sei_kana'            => 'カナ姓03',
                'mei_kana'            => 'カナ姓03',
                'syahan_kakeritsu'    => 4,
                'company_cd'          => 'ct03',
                'company_mei'         => '会社名03',
                'zip_no'              => 1500021,
                'todouhuken_mei'      => '東京都',
                'sikutyouson_mei'     => '渋谷区',
                'tyoumei'             => '恵比寿西',
                'idm_denwa_no'        => '012345678',
                'idm_keitai_tel'      => '012345678',
                'pre_regis_ymd'       => '2017-10-16',
                'pre_regis_lmt_ymd'   => '2017-10-17',
                'regis_ymd'           => '2017-10-16',
                'regis_lmt_ymd'       => '2018-01-01',
                'syokai_knr_user_id'  => 'L1000000003000000',
                'touroku_cd'          => 'lixilsct03',
                'regis_status'        => '02',
                'kengine_status'      => '00',
                'enavi_status'        => '00',
                'lixil_online_status' => '00',
                'renkei_status_1'     => '00',
                'renkei_status_2'     => '00',
                'renkei_status_3'     => '00',
                'genba_zyusyo_flg'    => 1,
                'guid'                => HelperFunc::makeUniqueCode(User::class, 'guid', 36),
                'del_flg'             => 0
            ]
        ];

        $passwords = [
            [
                'knr_user_id' => 'L1000000003000000',
                'pwd' => 'abcd1234',
                'pwd_upd_date' => '2017-10-16 19:06:01',
                'upd_date' => '2017-10-23 19:44:33'
            ]
        ];
        
        $mSyoutaiKanris = [
            [
                'knr_user_id' => 'L1000000003000000',
                'syoutai_start_ymd' => '2017-10-17',
                'syoutai_end_ymd' => '2018-10-17',
                'syoutai_cnt' => 0,
                'syoutai_lmt_cnt' => 5,
                'upd_date' => '2017-10-19 00:00:00',
                'patch_id' => '1'
            ]
        ];

        DB::beginTransaction();
        try {
            foreach ($users as $idx => $user) {
                $isExists = User::where('knr_user_id', $user['knr_user_id'])
                        ->first();
                if ($isExists) {
                    continue;
                }
                $user = User::create($user);
                $user->password()->create($passwords[$idx]);
            }
            foreach ($mSyoutaiKanris as $idx => $mSyoutaiKanri) {
                $mSyoutaiKanri = SyoutaiKanri::create($mSyoutaiKanri);
            }
            $this->insertSeeder();
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
