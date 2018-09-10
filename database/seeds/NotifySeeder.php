<?php

use App\Seeder\BaseSeeder;
use App\Models\Notify;

class NotifySeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->checkSeeder('NotifySeederV2')) {
            return;
        }

        $notifies = [
            [
                'osirase_id'             => 'T000000001',
                'syanaigai_kbn'          => Notify::TYPE_COMMON,
                'osirase_start_ymd'      => '2017-10-31',
                'osirase_end_ymd'        => '2018-10-31',
                'osirase_title'          => 'LIXIL Family STORE グランドオープン',
                'osirase_message'        => '2017年10月31日 LIXIL Family STORE グランドオープン しました。',
                'regis_date'             => '2017-10-31',
                'regis_user_acct_cd'     => 'L100000test000000',
                'regis_terminal_ip_addr' => '127.0.0.1',
                'upd_pgm_cd'             => '2017-10-31',
                'upd_date'               => '2017-10-31',
                'patch_id'               => '127.0.0.1',
            ],
            [
                'osirase_id'             => 'T000000002',
                'syanaigai_kbn'          => Notify::TYPE_LOGIN,
                'osirase_start_ymd'      => '2017-10-31',
                'osirase_end_ymd'        => '2018-10-31',
                'osirase_title'          => 'LIXIL Family STORE グランドオープン',
                'osirase_message'        => '2017年10月31日 LIXIL Family STORE グランドオープン しました。',
                'regis_date'             => '2017-10-31',
                'regis_user_acct_cd'     => 'L100000test000000',
                'regis_terminal_ip_addr' => '127.0.0.1',
                'upd_pgm_cd'             => '2017-10-31',
                'upd_date'               => '2017-10-31',
                'patch_id'               => '127.0.0.1',
            ]
        ];

        DB::beginTransaction();
        try {
            foreach ($notifies as $key => $note) {
                $isExists = Notify::where('osirase_id', $note['osirase_id'])->first();
                if ($isExists) {
                    $isExists->fill($notifies[$key]);
                    $isExists->save();
                } else {
                    Notify::create($note);
                }
            }
            $this->insertSeeder();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
