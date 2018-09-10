<?php

use App\Seeder\BaseSeeder;
use App\Models\TaisyoSyohin;
use Carbon\Carbon;

class TaisyoSyohinEdit20Seeder extends BaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        if ($this->checkSeeder()){
            return;
        }
        $taisyoSyohins = [ 

        	[
				'category_cd'            => '001',
				'subcategory_cd'         => '001',
				'syouhin_plan_id'        => '20',
				'syouhin_mei'            => 'リシェルSI',
				'plan_mei'               => 'リシェルSIフリープラン',
				'setumei_bun_1'          => 'キッチンリフォームをリシェルSIで行う。',
				'setumei_bun_2'          => '料理を楽しむキッチン。
インテリアとしての美しさを備えながら道具としての「使う喜び」を突き詰めました。
キッチンで行われる無意識の動作を何度も見つめ直し、直感的な使いやすさと、自然な使い心地を一つひとつに。',
				'syouhin_logo_filen'     => 'logo_richellesi.png',
				'plan_image_filen'       => 'default_list_img_02richell.jpg',
				'kakakuhyouji_kbn'       => '03',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 0,
				'reform_cost_11'         => 0,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 0,
				'reform_cost_31'         => 0,
				'reform_cost_90'         => 0,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/richelle/',
				'link_url_1_mei'         => 'LIXIL HPでリシェルSIを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '01',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '01',
				'kengine_plan_cd1'       => '',
				'kengine_plan_cd2'       => '',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',


        	],

        ];

        
        DB::beginTransaction();
        try {

        	foreach( $taisyoSyohins as $key => $taisyoSyohin) {

        		$taisyoSyohinDB = TaisyoSyohin::find($taisyoSyohin['syouhin_plan_id']);


        		if ($taisyoSyohinDB ) {
					
					$taisyoSyohinDB ->subcategory_cd         = $taisyoSyohin['subcategory_cd'];
					$taisyoSyohinDB ->category_cd            = $taisyoSyohin['category_cd'];
					$taisyoSyohinDB ->syouhin_mei            = $taisyoSyohin['syouhin_mei'];
					$taisyoSyohinDB ->plan_mei               = $taisyoSyohin['plan_mei'];
					$taisyoSyohinDB ->setumei_bun_1          = $taisyoSyohin['setumei_bun_1'];
					$taisyoSyohinDB ->setumei_bun_2          = $taisyoSyohin['setumei_bun_2'];
					$taisyoSyohinDB ->syouhin_logo_filen     = $taisyoSyohin['syouhin_logo_filen'];
					$taisyoSyohinDB ->plan_image_filen       = $taisyoSyohin['plan_image_filen'];
					$taisyoSyohinDB ->kakakuhyouji_kbn       = $taisyoSyohin['kakakuhyouji_kbn'];
					$taisyoSyohinDB ->keisai_start_ymd       = $taisyoSyohin['keisai_start_ymd'];
					$taisyoSyohinDB ->keisai_end_ymd         = $taisyoSyohin['keisai_end_ymd'];
					$taisyoSyohinDB ->reform_cost_10         = $taisyoSyohin['reform_cost_10'];
					$taisyoSyohinDB ->reform_cost_11         = $taisyoSyohin['reform_cost_11'];
					$taisyoSyohinDB ->reform_cost_20         = $taisyoSyohin['reform_cost_20'];
					$taisyoSyohinDB ->reform_cost_21         = $taisyoSyohin['reform_cost_21'];
					$taisyoSyohinDB ->reform_cost_30         = $taisyoSyohin['reform_cost_30'];
					$taisyoSyohinDB ->reform_cost_31         = $taisyoSyohin['reform_cost_31'];
					$taisyoSyohinDB ->reform_cost_90         = $taisyoSyohin['reform_cost_90'];
					$taisyoSyohinDB ->link_url_1             = $taisyoSyohin['link_url_1'];
					$taisyoSyohinDB ->link_url_1_mei         = $taisyoSyohin['link_url_1_mei'];
					$taisyoSyohinDB ->link_url_2             = $taisyoSyohin['link_url_2'];
					$taisyoSyohinDB ->link_url_2_mei         = $taisyoSyohin['link_url_2_mei'];
					$taisyoSyohinDB ->syouhin_3D_kbn         = $taisyoSyohin['syouhin_3D_kbn'];
					$taisyoSyohinDB ->syouhin_3D_plan_cd     = $taisyoSyohin['syouhin_3D_plan_cd'];
					$taisyoSyohinDB ->syouhin_toroku_kbn     = $taisyoSyohin['syouhin_toroku_kbn'];
					$taisyoSyohinDB ->kengine_plan_cd1       = $taisyoSyohin['kengine_plan_cd1'];
					$taisyoSyohinDB ->kengine_plan_cd2       = $taisyoSyohin['kengine_plan_cd2'];
					$taisyoSyohinDB ->enavi_mitsu_cd1        = $taisyoSyohin['enavi_mitsu_cd1'];
					$taisyoSyohinDB ->enavi_mitsu_cd2        = $taisyoSyohin['enavi_mitsu_cd2'];
					$taisyoSyohinDB ->regis_user_acct_cd     = $taisyoSyohin['regis_user_acct_cd'];
					$taisyoSyohinDB ->regis_terminal_ip_addr = $taisyoSyohin['regis_terminal_ip_addr'];
					$taisyoSyohinDB ->upd_pgm_cd             = $taisyoSyohin['upd_pgm_cd'];
					$taisyoSyohinDB ->upd_date               = $taisyoSyohin['upd_date'];
					$taisyoSyohinDB ->patch_id               = $taisyoSyohin['patch_id'];
					
        			$taisyoSyohinDB->save();

        		} else {
                            $taisyoSyohin = TaisyoSyohin::create($taisyoSyohin);
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
