<?php

use App\Seeder\BaseSeeder;
use App\Models\Policy;

class PolicySeeder extends BaseSeeder
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
        
        $policies = [
            [
                'company_cd' => 'ct01',
                'reform' => '/policy/lixil/copany_cd/reform.pdf',
                'builder_intro' => '/policy/lixil/copany_cd/builder_intro.pdf',
                'upd_date' => '2017-10-19',
            ]
        ];
        
        DB::beginTransaction();
        try {
            foreach ($policies as $policy) {
                Policy::create($policy);
            }
            $this->insertSeeder();
            
            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            throw $ex;
        }
    }
}
