<?php

use App\Seeder\BaseSeeder;
use App\Models\TaisyoSyohin;

class TaisyoSyohinUpdateSeeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->checkSeeder('TaisyoSyohinUpdateSeeder')) {
            return;
        }
        $taisyoSyohins = [
            [
                'syouhin_plan_id'  => '35',
                'plan_image_filen' => 'photo_rechent2G14.jpg',
            ],
        ];

        DB::beginTransaction();
        try {
            foreach ($taisyoSyohins as $taisyoSyohin) {
                $taisyoSyohinDB = TaisyoSyohin::find($taisyoSyohin['syouhin_plan_id']);
                if ($taisyoSyohinDB) {
                    $taisyoSyohinDB->plan_image_filen = $taisyoSyohin['plan_image_filen'];
                    $taisyoSyohinDB->save();
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
