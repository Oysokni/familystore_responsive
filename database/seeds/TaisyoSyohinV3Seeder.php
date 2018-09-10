<?php

use App\Seeder\BaseSeeder;
use App\Models\TaisyoSyohin;
use Carbon\Carbon;

class TaisyoSyohinV3Seeder extends BaseSeeder
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
				'subcategory_cd'         => '003',
				'syouhin_plan_id'        => '61',
				'syouhin_mei'            => 'アレスタ',
				'plan_mei'               => 'アレスタ LDK空間リフォームセットプラン（約12畳縦長）ナチュラルテイスト',
				'setumei_bun_1'          => 'シンクがマルチに活躍！作業効率がアップするキッチン「アレスタ」を中心とした、自然な明るい木質感の広がりが、やすらぎを生む開放的な空間。',
				'setumei_bun_2'          => '■アレスタ＜2017＞ 壁付I型基本プラン 間口240cm
・扉カラー：クリエペール
・ワークトップ：人造大理石
・食器洗い乾燥機：なし
・加熱機器：3口コンロ・ホーロートップ
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_alesta.png',
				'plan_image_filen'       => 'alesta_ldk12_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1099050,
				'reform_cost_11'         => 1099050,
				'reform_cost_20'         => 40370,
				'reform_cost_21'         => 40370,
				'reform_cost_30'         => 610124,
				'reform_cost_31'         => 610124,
				'reform_cost_90'         => 49000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/alesta/',
				'link_url_1_mei'         => 'LIXIL HPでアレスタを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391550',
				'kengine_plan_cd2'       => '1000393384',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '003',
				'syouhin_plan_id'        => '62',
				'syouhin_mei'            => 'アレスタ',
				'plan_mei'               => 'アレスタ LDK空間リフォームセットプラン（約12畳縦長）ナチュラルテイスト',
				'setumei_bun_1'          => 'シンクがマルチに活躍！作業効率がアップするキッチン「アレスタ」、上質で安らげる雰囲気の「わが家」を演出。',
				'setumei_bun_2'          => '■アレスタ＜2017＞ 壁付I型基本プラン 間口240cm
・扉カラー：クリエダーク
・ワークトップ：人造大理石
・食器洗い乾燥機：なし
・加熱機器：3口コンロ・ホーロートップ
■ラシッサ　フロア
・カラー：クリエダークＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_alesta.png',
				'plan_image_filen'       => 'alesta_ldk12_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1099050,
				'reform_cost_11'         => 1099050,
				'reform_cost_20'         => 40370,
				'reform_cost_21'         => 40370,
				'reform_cost_30'         => 610124,
				'reform_cost_31'         => 610124,
				'reform_cost_90'         => 49000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/alesta/',
				'link_url_1_mei'         => 'LIXIL HPでアレスタを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392134',
				'kengine_plan_cd2'       => '1000393385',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '003',
				'syouhin_plan_id'        => '63',
				'syouhin_mei'            => 'アレスタ',
				'plan_mei'               => 'アレスタ LDK空間リフォームセットプラン（約12畳縦長）エレガントテイスト',
				'setumei_bun_1'          => 'シンクがマルチに活躍！作業効率がアップするキッチン「アレスタ」、上質なベージュやグレーを基調とした、洗練とグレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■アレスタ＜2017＞ 壁付I型基本プラン 間口240cm
・扉カラー：ジェットブラック
・ワークトップ：人造大理石
・食器洗い乾燥機：なし
・加熱機器：3口コンロ・ホーロートップ
■ラシッサ　フロア
・カラー：クリエホワイトＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_alesta.png',
				'plan_image_filen'       => 'alesta_ldk12_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1136050,
				'reform_cost_11'         => 1136050,
				'reform_cost_20'         => 40370,
				'reform_cost_21'         => 40370,
				'reform_cost_30'         => 610124,
				'reform_cost_31'         => 610124,
				'reform_cost_90'         => 49000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/alesta/',
				'link_url_1_mei'         => 'LIXIL HPでアレスタを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392142',
				'kengine_plan_cd2'       => '1000393416',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '001',
				'syouhin_plan_id'        => '64',
				'syouhin_mei'            => 'リシェルSI',
				'plan_mei'               => 'リシェルSI LDK空間リフォームセットプラン（約15畳横長）ナチュラルテイスト',
				'setumei_bun_1'          => '多彩な機能で、心地よく料理できるキッチン「リシェルSI」を中心とした、自然な明るい木質感の広がりが、やすらぎを生む開放的な空間。',
				'setumei_bun_2'          => '■リシェルSI＜2017＞ 壁付I型カスタムベースプラン 間口270cm
・扉カラー：クリエペール
・ワークトップ：人造大理石
・食器洗い乾燥機：浅型タイプ
・加熱機器：3口コンロ・ホーロートップ
■リシェルSI＜2017＞ システム収納 カップボードプラン 間口90cm
■リシェルSI＜2017＞ システム収納 カウンタープラン 間口90cm
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1463',
				'syouhin_logo_filen'     => 'logo_richellesi.png',
				'plan_image_filen'       => 'richelleSI_ldk15h_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1579125,
				'reform_cost_11'         => 1579125,
				'reform_cost_20'         => 58460,
				'reform_cost_21'         => 58460,
				'reform_cost_30'         => 868168,
				'reform_cost_31'         => 868168,
				'reform_cost_90'         => 70000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/richelle/',
				'link_url_1_mei'         => 'LIXIL HPでリシェルSIを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391207',
				'kengine_plan_cd2'       => '1000393375',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '001',
				'syouhin_plan_id'        => '65',
				'syouhin_mei'            => 'リシェルSI',
				'plan_mei'               => 'リシェルSI LDK空間リフォームセットプラン（約15畳横長）シックテイスト',
				'setumei_bun_1'          => '多彩な機能で、心地よく料理できるキッチン「リシェルSI」を中心とした、上質で安らげる雰囲気の「わが家」を演出。',
				'setumei_bun_2'          => '■リシェルSI＜2017＞ 壁付I型カスタムベースプラン 間口270cm
・扉カラー：クリエダーク
・ワークトップ：人造大理石
・食器洗い乾燥機：浅型タイプ
・加熱機器：3口コンロ・ホーロートップ
■リシェルSI＜2017＞ システム収納 カップボードプラン 間口90cm
■リシェルSI＜2017＞ システム収納 カウンタープラン 間口90cm
■ラシッサ　フロア
・カラー：クリエダークＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1463',
				'syouhin_logo_filen'     => 'logo_richellesi.png',
				'plan_image_filen'       => 'richelleSI_ldk15h_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1579125,
				'reform_cost_11'         => 1579125,
				'reform_cost_20'         => 58460,
				'reform_cost_21'         => 58460,
				'reform_cost_30'         => 868168,
				'reform_cost_31'         => 868168,
				'reform_cost_90'         => 70000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/richelle/',
				'link_url_1_mei'         => 'LIXIL HPでリシェルSIを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392407',
				'kengine_plan_cd2'       => '1000393348',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '001',
				'syouhin_plan_id'        => '66',
				'syouhin_mei'            => 'リシェルSI',
				'plan_mei'               => 'リシェルSI LDK空間リフォームセットプラン（約15畳横長）エレガントテイスト',
				'setumei_bun_1'          => '多彩な機能で、心地よく料理できるキッチン「リシェルSI」を中心とした、上質なベージュやグレーを基調とした、洗練とグレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■リシェルSI＜2017＞ 壁付I型カスタムベースプラン 間口270cm
・扉カラー：クリエアイボリー
・ワークトップ：人造大理石
・食器洗い乾燥機：浅型タイプ
・加熱機器：3口コンロ・ホーロートップ
■リシェルSI＜2017＞ システム収納 カップボードプラン 間口90cm
■リシェルSI＜2017＞ システム収納 カウンタープラン 間口90cm
■ラシッサ　フロア
・カラー：クリエホワイトＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1463',
				'syouhin_logo_filen'     => 'logo_richellesi.png',
				'plan_image_filen'       => 'richelleSI_ldk15h_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1579125,
				'reform_cost_11'         => 1579125,
				'reform_cost_20'         => 58460,
				'reform_cost_21'         => 58460,
				'reform_cost_30'         => 868168,
				'reform_cost_31'         => 868168,
				'reform_cost_90'         => 70000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/richelle/',
				'link_url_1_mei'         => 'LIXIL HPでリシェルSIを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391781',
				'kengine_plan_cd2'       => '1000393387',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '001',
				'syouhin_plan_id'        => '67',
				'syouhin_mei'            => 'リシェルSI',
				'plan_mei'               => 'リシェルSI LDK空間リフォームセットプラン（約15畳横長）エレガントテイスト',
				'setumei_bun_1'          => '多彩な機能で、心地よく料理できるキッチン「リシェルSI」を中心とした、自然な明るい木質感の広がりが、やすらぎを生む開放的な空間。',
				'setumei_bun_2'          => '■リシェルSI＜2017＞ 壁付I型カスタムベースプラン 間口255cm
・扉カラー：クリエペール
・ワークトップ：人造大理石
・食器洗い乾燥機：浅型タイプ
・加熱機器：3口コンロ・ホーロートップ
■リシェルSI＜2017＞ システム収納 カップボードプラン 間口90cm
■リシェルSI＜2017＞ システム収納 カウンタープラン 間口90cm
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_richellesi.png',
				'plan_image_filen'       => 'richelleSI_ldk15v_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1487150,
				'reform_cost_11'         => 1487150,
				'reform_cost_20'         => 44180,
				'reform_cost_21'         => 44180,
				'reform_cost_30'         => 790369,
				'reform_cost_31'         => 790369,
				'reform_cost_90'         => 64000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/richelle/',
				'link_url_1_mei'         => 'LIXIL HPでリシェルSIを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391537',
				'kengine_plan_cd2'       => '1000393388',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '001',
				'syouhin_plan_id'        => '68',
				'syouhin_mei'            => 'リシェルSI',
				'plan_mei'               => 'リシェルSI LDK空間リフォームセットプラン（約15畳横長）エレガントテイスト',
				'setumei_bun_1'          => '多彩な機能で、心地よく料理できるキッチン「リシェルSI」を中心とした、上質で安らげる雰囲気の「わが家」を演出。',
				'setumei_bun_2'          => '■リシェルSI＜2017＞ 壁付I型カスタムベースプラン 間口255cm
・扉カラー：クレストブラック
・ワークトップ：人造大理石
・食器洗い乾燥機：浅型タイプ
・加熱機器：3口コンロ・ホーロートップ
■リシェルSI＜2017＞ システム収納 カップボードプラン 間口90cm
■リシェルSI＜2017＞ システム収納 カウンタープラン 間口90cm
■ラシッサ　フロア
・カラー：クリエダークＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_richellesi.png',
				'plan_image_filen'       => 'richelleSI_ldk15v_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1487150,
				'reform_cost_11'         => 1487150,
				'reform_cost_20'         => 44180,
				'reform_cost_21'         => 44180,
				'reform_cost_30'         => 790369,
				'reform_cost_31'         => 790369,
				'reform_cost_90'         => 64000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/richelle/',
				'link_url_1_mei'         => 'LIXIL HPでリシェルSIを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392426',
				'kengine_plan_cd2'       => '1000393347',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '001',
				'subcategory_cd'         => '001',
				'syouhin_plan_id'        => '69',
				'syouhin_mei'            => 'リシェルSI',
				'plan_mei'               => 'リシェルSI LDK空間リフォームセットプラン（約15畳横長）エレガントテイスト',
				'setumei_bun_1'          => '多彩な機能で、心地よく料理できるキッチン「リシェルSI」を中心とした、上質なベージュやグレーを基調とした、洗練とグレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■リシェルSI＜2017＞ 壁付I型カスタムベースプラン 間口255cm
・扉カラー：クレストブラック
・ワークトップ：人造大理石
・食器洗い乾燥機：浅型タイプ
・加熱機器：3口コンロ・ホーロートップ
■リシェルSI＜2017＞ システム収納 カップボードプラン 間口90cm
■リシェルSI＜2017＞ システム収納 カウンタープラン 間口90cm
■ラシッサ　フロア
・カラー：クリエホワイトＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_richellesi.png',
				'plan_image_filen'       => 'richelleSI_ldk15v_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1869150,
				'reform_cost_11'         => 1869150,
				'reform_cost_20'         => 44180,
				'reform_cost_21'         => 44180,
				'reform_cost_30'         => 790369,
				'reform_cost_31'         => 790369,
				'reform_cost_90'         => 64000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/kitchen/richelle/',
				'link_url_1_mei'         => 'LIXIL HPでリシェルSIを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392444',
				'kengine_plan_cd2'       => '1000393154',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],



        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '006',
				'syouhin_plan_id'        => '70',
				'syouhin_mei'            => 'プレアスLS',
				'plan_mei'               => 'プレアス トイレ空間リフォームセットプラン（約0.4坪）ナチュラルテイスト',
				'setumei_bun_1'          => '誰もが使いやすいデザインにこだわった「プレアス」。
薄い木目調の床でナチュラルで優しい雰囲気のトイレに。',
				'setumei_bun_2'          => '■プレアスLSタイプ CL5グレード ＜ECO5＞
・節水性能：ECO5＜大5L 小3.8L＞
・タンクタイプ：手洗付
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_preusls.png',
				'plan_image_filen'       => 'preus_toilet04_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 288250,
				'reform_cost_11'         => 288250,
				'reform_cost_20'         => 8450,
				'reform_cost_21'         => 8450,
				'reform_cost_30'         => 110799,
				'reform_cost_31'         => 110799,
				'reform_cost_90'         => 9000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/preus/',
				'link_url_1_mei'         => 'LIXIL HPでプレアスを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391780',
				'kengine_plan_cd2'       => '1000393376',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],



        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '006',
				'syouhin_plan_id'        => '71',
				'syouhin_mei'            => 'プレアスLS',
				'plan_mei'               => 'プレアス トイレ空間リフォームセットプラン（約0.4坪）シックテイスト',
				'setumei_bun_1'          => '誰もが使いやすいデザインにこだわった「プレアス」。
ダーク系の床で上質な雰囲気のトイレに。',
				'setumei_bun_2'          => '■プレアスLSタイプ CL5グレード ＜ECO5＞
・節水性能：ECO5＜大5L 小3.8L＞
・タンクタイプ：手洗付
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_preusls.png',
				'plan_image_filen'       => 'preus_toilet04_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 288250,
				'reform_cost_11'         => 288250,
				'reform_cost_20'         => 8450,
				'reform_cost_21'         => 8450,
				'reform_cost_30'         => 110799,
				'reform_cost_31'         => 110799,
				'reform_cost_90'         => 9000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/preus/',
				'link_url_1_mei'         => 'LIXIL HPでプレアスを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392117',
				'kengine_plan_cd2'       => '1000393377',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '006',
				'syouhin_plan_id'        => '72',
				'syouhin_mei'            => 'プレアスLS',
				'plan_mei'               => 'プレアス トイレ空間リフォームセットプラン（約0.4坪）エレガントテイスト',
				'setumei_bun_1'          => '誰もが使いやすいデザインにこだわった「プレアス」。
ホワイト系の明るい床でちょっとおしゃれなトイレに。',
				'setumei_bun_2'          => '■プレアスLSタイプ CL5グレード ＜ECO5＞
・節水性能：ECO5＜大5L 小3.8L＞
・タンクタイプ：手洗付
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■ラシッサ　フロア
・カラー：クリエホワイトＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_preusls.png',
				'plan_image_filen'       => 'preus_toilet04_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 288250,
				'reform_cost_11'         => 288250,
				'reform_cost_20'         => 8450,
				'reform_cost_21'         => 8450,
				'reform_cost_30'         => 110799,
				'reform_cost_31'         => 110799,
				'reform_cost_90'         => 9000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/preus/',
				'link_url_1_mei'         => 'LIXIL HPでプレアスを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392132',
				'kengine_plan_cd2'       => '1000393378',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '005',
				'syouhin_plan_id'        => '73',
				'syouhin_mei'            => 'リフォレ',
				'plan_mei'               => 'リフォレ トイレ空間リフォームセットプラン（0.5坪）ナチュラルテイスト',
				'setumei_bun_1'          => 'お掃除のしやすさや手洗いのしやすさにこだわった「リフォレ」。
薄い木目調の床でナチュラルで優しい雰囲気のトイレに。',
				'setumei_bun_2'          => '■リフォレ＜2016＞ Ｉ型 ＜標準間口タイプ＞ 手洗付
・節水性能：ECO5＜大5L 小3.8L＞
・タンクタイプ：手洗付
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_refore.png',
				'plan_image_filen'       => 'refore_toilet05_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 267250,
				'reform_cost_11'         => 267250,
				'reform_cost_20'         => 9900,
				'reform_cost_21'         => 9900,
				'reform_cost_30'         => 117786,
				'reform_cost_31'         => 117786,
				'reform_cost_90'         => 10000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/refore/',
				'link_url_1_mei'         => 'LIXIL HPでリフォレを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391749',
				'kengine_plan_cd2'       => '1000393379',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '005',
				'syouhin_plan_id'        => '74',
				'syouhin_mei'            => 'リフォレ',
				'plan_mei'               => 'リフォレ トイレ空間リフォームセットプラン（0.5坪）シックテイスト',
				'setumei_bun_1'          => 'お掃除のしやすさや手洗いのしやすさにこだわった「リフォレ」。
ダーク系の床で上質な雰囲気のトイレに。',
				'setumei_bun_2'          => '■リフォレ＜2016＞ Ｉ型 ＜標準間口タイプ＞ 手洗付
・節水性能：ECO5＜大5L 小3.8L＞
・タンクタイプ：手洗付
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■ラシッサ　フロア
・カラー：クリエダークＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_refore.png',
				'plan_image_filen'       => 'refore_toilet05_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 267250,
				'reform_cost_11'         => 267250,
				'reform_cost_20'         => 9900,
				'reform_cost_21'         => 9900,
				'reform_cost_30'         => 117786,
				'reform_cost_31'         => 117786,
				'reform_cost_90'         => 10000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/refore/',
				'link_url_1_mei'         => 'LIXIL HPでリフォレを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392253',
				'kengine_plan_cd2'       => '1000393380',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '005',
				'syouhin_plan_id'        => '75',
				'syouhin_mei'            => 'リフォレ',
				'plan_mei'               => 'リフォレ トイレ空間リフォームセットプラン（0.5坪）シックテイスト',
				'setumei_bun_1'          => 'お掃除のしやすさや手洗いのしやすさにこだわった「リフォレ」。
ホワイト系の明るい床でちょっとおしゃれなトイレに。',
				'setumei_bun_2'          => '■リフォレ＜2016＞ Ｉ型 ＜標準間口タイプ＞ 手洗付
・節水性能：ECO5＜大5L 小3.8L＞
・タンクタイプ：手洗付
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■ラシッサ　フロア
・カラー：クリエホワイトＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_refore.png',
				'plan_image_filen'       => 'refore_toilet05_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 267250,
				'reform_cost_11'         => 267250,
				'reform_cost_20'         => 9900,
				'reform_cost_21'         => 9900,
				'reform_cost_30'         => 117786,
				'reform_cost_31'         => 117786,
				'reform_cost_90'         => 10000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/refore/',
				'link_url_1_mei'         => 'LIXIL HPでリフォレを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392273',
				'kengine_plan_cd2'       => '1000393381',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '004',
				'syouhin_plan_id'        => '76',
				'syouhin_mei'            => 'サティスG',
				'plan_mei'               => 'サティスG トイレ空間リフォームセットプラン（0.75坪）ナチュラルテイスト',
				'setumei_bun_1'          => 'トイレをより居心地のよい空間にするために、洗練したデザイン、先進の機能を搭載したSATIS。
薄い木目調の床とキャビネットでナチュラルで優しい雰囲気のトイレに。',
				'setumei_bun_2'          => '■サティスＧタイプ＜2016＞ G6グレード ＜ECO4＞
・節水性能：ECO4＜大4L 小3.3L＞
・タンクタイプ：タンクレス
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■キャパシア＜2016＞ 手洗器一体型 ベースキャビネット
・カラーバリエーション：スノーホワイト×クリエペール
■ラシッサ　フロア
・カラー：クリエペールＦ
■エコカラット デザインパッケージ スタイリングシリーズ
・サイズ：1㎡
・デザイン：STYLISH（スタイリッシュ）
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1353',
				'syouhin_logo_filen'     => 'logo_satisg.png',
				'plan_image_filen'       => 'satis_toilet075_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 673250,
				'reform_cost_11'         => 673250,
				'reform_cost_20'         => 12820,
				'reform_cost_21'         => 12820,
				'reform_cost_30'         => 178147,
				'reform_cost_31'         => 178147,
				'reform_cost_90'         => 15000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/satis/',
				'link_url_1_mei'         => 'LIXIL HPでSATISを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000380959',
				'kengine_plan_cd2'       => '1000393373',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '004',
				'syouhin_plan_id'        => '77',
				'syouhin_mei'            => 'サティスG',
				'plan_mei'               => 'サティスG トイレ空間リフォームセットプラン（0.75坪）シックテイスト',
				'setumei_bun_1'          => 'トイレをより居心地のよい空間にするために、洗練したデザイン、先進の機能を搭載したSATIS。
ダーク系の床とキャビネットで上質な雰囲気のトイレに。',
				'setumei_bun_2'          => '■サティスＧタイプ＜2016＞ G6グレード ＜ECO4＞
・節水性能：ECO4＜大4L 小3.3L＞
・タンクタイプ：タンクレス
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■キャパシア＜2016＞ 手洗器一体型 ベースキャビネット
・カラーバリエーション：スノーホワイト×クリエペール
■ラシッサ　フロア
・カラー：クリエペールＦ
■エコカラット デザインパッケージ スタイリングシリーズ
・サイズ：1㎡
・デザイン：STYLISH（スタイリッシュ）
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1353',
				'syouhin_logo_filen'     => 'logo_satisg.png',
				'plan_image_filen'       => 'satis_toilet075_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 673250,
				'reform_cost_11'         => 673250,
				'reform_cost_20'         => 12820,
				'reform_cost_21'         => 12820,
				'reform_cost_30'         => 178147,
				'reform_cost_31'         => 178147,
				'reform_cost_90'         => 15000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/satis/',
				'link_url_1_mei'         => 'LIXIL HPでSATISを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392293',
				'kengine_plan_cd2'       => '1000393382',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '002',
				'subcategory_cd'         => '004',
				'syouhin_plan_id'        => '78',
				'syouhin_mei'            => 'サティスG',
				'plan_mei'               => 'サティスG トイレ空間リフォームセットプラン（0.75坪）シックテイスト',
				'setumei_bun_1'          => 'トイレをより居心地のよい空間にするために、洗練したデザイン、先進の機能を搭載したSATIS。
ホワイト系の明るい床とキャビネとでちょっとおしゃれなトイレに。',
				'setumei_bun_2'          => '■サティスＧタイプ＜2016＞ G6グレード ＜ECO4＞
・節水性能：ECO4＜大4L 小3.3L＞
・タンクタイプ：タンクレス
・紙巻器：CF-AA22H
・タオル掛：KF-AA71P
■キャパシア＜2016＞ 手洗器一体型 ベースキャビネット
・カラーバリエーション：スノーホワイト×ホワイト
■ラシッサ　フロア
・カラー：クリエホワイトＦ
■エコカラット デザインパッケージ スタイリングシリーズ
・サイズ：1㎡
・デザイン：JAPANESE（ジャパニーズ）
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1353',
				'syouhin_logo_filen'     => 'logo_satisg.png',
				'plan_image_filen'       => 'satis_toilet075_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 673025,
				'reform_cost_11'         => 673025,
				'reform_cost_20'         => 12820,
				'reform_cost_21'         => 12820,
				'reform_cost_30'         => 178147,
				'reform_cost_31'         => 178147,
				'reform_cost_90'         => 15000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/toiletroom/satis/',
				'link_url_1_mei'         => 'LIXIL HPでSATISを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392297',
				'kengine_plan_cd2'       => '1000393383',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '014',
				'syouhin_plan_id'        => '79',
				'syouhin_mei'            => 'ミズリア',
				'plan_mei'               => 'ミズリア洗面空間リフォームセットプラン（約1.5畳）ナチュラルテイスト',
				'setumei_bun_1'          => '自分時間を大切にするためのアイデアを、ひとつずつ形にして生まれた「ミズリア」。
ナチュラルな薄い色の木目調で、明るく開放的な空間に。',
				'setumei_bun_2'          => '■ミズリア＜2016＞ 間口750 フルスライドタイプ
・扉カラー：クリエペール
・ミラーキャビネット：3面鏡（LED照明・全収納）
・水栓金具：シングルレバーシャワー水栓
■ラシッサ　フロア
・カラー：クリエペールＦ',
				'syouhin_logo_filen'     => 'logo_misrea.png',
				'plan_image_filen'       => 'misrea_bathroomvanity1_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 344525,
				'reform_cost_11'         => 344525,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 172199,
				'reform_cost_31'         => 172199,
				'reform_cost_90'         => 14000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/misrea/',
				'link_url_1_mei'         => 'LIXIL HPでミズリアを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391745',
				'kengine_plan_cd2'       => '1000393389',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '014',
				'syouhin_plan_id'        => '80',
				'syouhin_mei'            => 'ミズリア',
				'plan_mei'               => 'ミズリア洗面空間リフォームセットプラン（約1.5畳）シックテイスト',
				'setumei_bun_1'          => '自分時間を大切にするためのアイデアを、ひとつずつ形にして生まれた「ミズリア」。
ダーク系のカラーコーディネートで大人っぽい雰囲気を演出。',
				'setumei_bun_2'          => '■ミズリア＜2016＞ 間口750 フルスライドタイプ
・扉カラー：クリエダーク
・ミラーキャビネット：3面鏡（LED照明・全収納）
・水栓金具：シングルレバーシャワー水栓
■ラシッサ　フロア
・カラー：クリエダークＦ',
				'syouhin_logo_filen'     => 'logo_misrea.png',
				'plan_image_filen'       => 'misrea_bathroomvanity1_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 344525,
				'reform_cost_11'         => 344525,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 172199,
				'reform_cost_31'         => 172199,
				'reform_cost_90'         => 14000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/misrea/',
				'link_url_1_mei'         => 'LIXIL HPでミズリアを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392164',
				'kengine_plan_cd2'       => '1000393390',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '014',
				'syouhin_plan_id'        => '81',
				'syouhin_mei'            => 'ミズリア',
				'plan_mei'               => 'ミズリア洗面空間リフォームセットプラン（約1.5畳）エレガントテイスト',
				'setumei_bun_1'          => '自分時間を大切にするためのアイデアを、ひとつずつ形にして生まれた「ミズリア」。
落ち着きのある柔らかい色調で、グレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■ミズリア＜2016＞ 間口750 フルスライドタイプ
・扉カラー：パストラルブラウン
・ミラーキャビネット：3面鏡（LED照明・全収納）
・水栓金具：シングルレバーシャワー水栓
■ラシッサ　フロア
・カラー：クリエホワイトＦ',
				'syouhin_logo_filen'     => 'logo_misrea.png',
				'plan_image_filen'       => 'misrea_bathroomvanity1_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 344225,
				'reform_cost_11'         => 344225,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 172199,
				'reform_cost_31'         => 172199,
				'reform_cost_90'         => 14000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/misrea/',
				'link_url_1_mei'         => 'LIXIL HPでミズリアを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392169',
				'kengine_plan_cd2'       => '1000393391',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '031',
				'syouhin_plan_id'        => '82',
				'syouhin_mei'            => 'エルシィ',
				'plan_mei'               => 'エルシィ 洗面空間リフォームセットプラン（約2畳）ナチュラルテイスト',
				'setumei_bun_1'          => 'お掃除、空間すっきり、スマートドレッサー「エルシィ」。
ナチュラルな薄い色の木目調で、明るく開放的な空間に。',
				'setumei_bun_2'          => '■エルシィ＜2016＞ 間口750 フルスライドタイプ
・扉カラー：クリエペール
・ミラーキャビネット：3面鏡（LED照明・全収納）
・水栓金具：シングルレバーシャワー水栓
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1463',
				'syouhin_logo_filen'     => 'logo_lc.png',
				'plan_image_filen'       => 'lc_bathroomvanity2_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 352100,
				'reform_cost_11'         => 352100,
				'reform_cost_20'         => 15730,
				'reform_cost_21'         => 15730,
				'reform_cost_30'         => 207746,
				'reform_cost_31'         => 207746,
				'reform_cost_90'         => 17000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/lc/',
				'link_url_1_mei'         => 'LIXIL HPでエルシィを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391533',
				'kengine_plan_cd2'       => '1000393399',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],
        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '031',
				'syouhin_plan_id'        => '83',
				'syouhin_mei'            => 'エルシィ',
				'plan_mei'               => 'エルシィ 洗面空間リフォームセットプラン（約2畳）ナチュラルテイスト',
				'setumei_bun_1'          => 'お掃除、空間すっきり、スマートドレッサー「エルシィ」。
ダーク系のカラーコーディネートで大人っぽい雰囲気を演出。',
				'setumei_bun_2'          => '■エルシィ＜2016＞ 間口750 フルスライドタイプ
・扉カラー：クリエペール
・ミラーキャビネット：3面鏡（LED照明・全収納）
・水栓金具：シングルレバーシャワー水栓
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1463',
				'syouhin_logo_filen'     => 'logo_lc.png',
				'plan_image_filen'       => 'lc_bathroomvanity2_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 352100,
				'reform_cost_11'         => 352100,
				'reform_cost_20'         => 15730,
				'reform_cost_21'         => 15730,
				'reform_cost_30'         => 207746,
				'reform_cost_31'         => 207746,
				'reform_cost_90'         => 17000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/lc/',
				'link_url_1_mei'         => 'LIXIL HPでエルシィを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392349',
				'kengine_plan_cd2'       => '1000393398',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '031',
				'syouhin_plan_id'        => '84',
				'syouhin_mei'            => 'エルシィ',
				'plan_mei'               => 'エルシィ 洗面空間リフォームセットプラン（約2畳）シックテイスト',
				'setumei_bun_1'          => 'お掃除、空間すっきり、スマートドレッサー「エルシィ」。
落ち着きのある柔らかい色調で、グレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■エルシィ＜2016＞ 間口750 フルスライドタイプ
・扉カラー：クリエダーク
・ミラーキャビネット：3面鏡（LED照明・全収納）
・水栓金具：シングルレバーシャワー水栓
■ラシッサ　フロア
・カラー：クリエダークＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1463',
				'syouhin_logo_filen'     => 'logo_lc.png',
				'plan_image_filen'       => 'lc_bathroomvanity2_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 368100,
				'reform_cost_11'         => 368100,
				'reform_cost_20'         => 15730,
				'reform_cost_21'         => 15730,
				'reform_cost_30'         => 207746,
				'reform_cost_31'         => 207746,
				'reform_cost_90'         => 17000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/lc/',
				'link_url_1_mei'         => 'LIXIL HPでエルシィを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392361',
				'kengine_plan_cd2'       => '1000393372',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '011',
				'syouhin_plan_id'        => '85',
				'syouhin_mei'            => 'ルミシス',
				'plan_mei'               => 'ルミシス洗面空間リフォームセットプラン（約2.5畳）ナチュラルテイスト',
				'setumei_bun_1'          => 'ホテルのような美しく洗練された空間で、暮らしに気品を与える「ルミシス」。
ナチュラルな薄い色の木目調で、明るく開放的な空間に。',
				'setumei_bun_2'          => '■ルミシス＜2017＞ ベッセルタイプ 間口900 扉タイプ
・扉カラー：クリエペール
・ミラーキャビネット：3面鏡（全収納・上部LED照明付）
・水栓金具：シングルレバー混合水栓（セパレートタイプ）
■ルミシス＜2017＞ 周辺収納（ベッセルタイプ用） トールキャビネット 間口450
・扉カラー：クリエペール
・タイプ：引出タイプ
■ラシッサ　フロア
・カラー：クリエペールＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_lumisis.png',
				'plan_image_filen'       => 'lumisis_bathroomvanity3_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 625875,
				'reform_cost_11'         => 625875,
				'reform_cost_20'         => 14440,
				'reform_cost_21'         => 14440,
				'reform_cost_30'         => 222657,
				'reform_cost_31'         => 222657,
				'reform_cost_90'         => 18000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/lumisis/',
				'link_url_1_mei'         => 'LIXIL HPでルミシスを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391744',
				'kengine_plan_cd2'       => '1000393403',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '011',
				'syouhin_plan_id'        => '86',
				'syouhin_mei'            => 'ルミシス',
				'plan_mei'               => 'ルミシス洗面空間リフォームセットプラン（約2.5畳）ナチュラルテイスト',
				'setumei_bun_1'          => 'ホテルのような美しく洗練された空間で、暮らしに気品を与える「ルミシス」。
ダーク系のカラーコーディネートで大人っぽい雰囲気を演出。',
				'setumei_bun_2'          => '■ルミシス＜2017＞ ベッセルタイプ 間口900 扉タイプ
・扉カラー：クリエダーク
・ミラーキャビネット：3面鏡（全収納・上部LED照明付）
・水栓金具：シングルレバー混合水栓（セパレートタイプ）
■ルミシス＜2017＞ 周辺収納（ベッセルタイプ用） トールキャビネット 間口450
・扉カラー：クリエダーク
・タイプ：引出タイプ
■ラシッサ　フロア
・カラー：クリエダークＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_lumisis.png',
				'plan_image_filen'       => 'lumisis_bathroomvanity3_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 625875,
				'reform_cost_11'         => 625875,
				'reform_cost_20'         => 14440,
				'reform_cost_21'         => 14440,
				'reform_cost_30'         => 222657,
				'reform_cost_31'         => 222657,
				'reform_cost_90'         => 18000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/lumisis/',
				'link_url_1_mei'         => 'LIXIL HPでルミシスを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392367',
				'kengine_plan_cd2'       => '1000393370',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '004',
				'subcategory_cd'         => '011',
				'syouhin_plan_id'        => '87',
				'syouhin_mei'            => 'ルミシス',
				'plan_mei'               => 'ルミシス洗面空間リフォームセットプラン（約2.5畳）ナチュラルテイスト',
				'setumei_bun_1'          => 'ホテルのような美しく洗練された空間で、暮らしに気品を与える「ルミシス」。
落ち着きのある柔らかい色調で、グレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■ルミシス＜2017＞ ベッセルタイプ 間口900 扉タイプ
・扉カラー：ネオグロスホワイト
・ミラーキャビネット：3面鏡（全収納・上部LED照明付）
・水栓金具：シングルレバー混合水栓（セパレートタイプ）
■ルミシス＜2017＞ 周辺収納（ベッセルタイプ用） トールキャビネット 間口450
・扉カラー：ネオグロスホワイト
・タイプ：引出タイプ
■ラシッサ　フロア
・カラー：クリエホワイトＦ
■壁紙(サンゲツ)FINE 1000シリーズ
・FE-1469',
				'syouhin_logo_filen'     => 'logo_lumisis.png',
				'plan_image_filen'       => 'lumisis_bathroomvanity3_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 625875,
				'reform_cost_11'         => 625875,
				'reform_cost_20'         => 14440,
				'reform_cost_21'         => 14440,
				'reform_cost_30'         => 222657,
				'reform_cost_31'         => 222657,
				'reform_cost_90'         => 18000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/powderroom/lumisis/',
				'link_url_1_mei'         => 'LIXIL HPでルミシスを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392384',
				'kengine_plan_cd2'       => '1000393349',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '010',
				'syouhin_plan_id'        => '88',
				'syouhin_mei'            => 'リノビオP',
				'plan_mei'               => 'リノビオ 風呂単体交換マンションリフォーム（1216）ナチュラルテイスト',
				'setumei_bun_1'          => '空間・浴槽、ゆったり＆のびのびバスルーム「リノビオ」。
ナチュラル色の壁パネルで、明るさと心からくつろげるバスルームを演出。',
				'setumei_bun_2'          => '■リノビオ Pシリーズ Pタイプ 1216
・壁カラー：組石ベージュ
・浴槽カラー：ホワイト
・床カラー：単色／ホワイト
・換気設備：天井換気扇
・シャワー：エコフルシャワー＜ホワイト＞
・ドア：折り戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_renobiov.png',
				'plan_image_filen'       => 'renobio_bathroom1216_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 759800,
				'reform_cost_11'         => 759800,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 300000,
				'reform_cost_31'         => 300000,
				'reform_cost_90'         => 24000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/renobio/',
				'link_url_1_mei'         => 'LIXIL HPでリノビオVを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391746',
				'kengine_plan_cd2'       => '1000393392',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '010',
				'syouhin_plan_id'        => '89',
				'syouhin_mei'            => 'リノビオP',
				'plan_mei'               => 'リノビオ 風呂単体交換マンションリフォーム（1216）ナチュラルテイスト',
				'setumei_bun_1'          => '空間・浴槽、ゆったり＆のびのびバスルーム「リノビオ」。
グレーの壁パネルで、上質で落ち着いた雰囲気を表現。',
				'setumei_bun_2'          => '■リノビオ Pシリーズ Pタイプ 1216
・壁カラー：ウッドグレインダーク
・浴槽カラー：ホワイト
・床カラー：単色／ホワイト
・換気設備：天井換気扇
・シャワー：エコフルシャワー＜ホワイト＞
・ドア：折り戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_renobiov.png',
				'plan_image_filen'       => 'renobio_bathroom1216_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 759800,
				'reform_cost_11'         => 759800,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 300000,
				'reform_cost_31'         => 300000,
				'reform_cost_90'         => 24000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/renobio/',
				'link_url_1_mei'         => 'LIXIL HPでリノビオVを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392177',
				'kengine_plan_cd2'       => '1000393393',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '010',
				'syouhin_plan_id'        => '90',
				'syouhin_mei'            => 'リノビオP',
				'plan_mei'               => 'リノビオ 風呂単体交換マンションリフォーム（1216）ナチュラルテイスト',
				'setumei_bun_1'          => '空間・浴槽、ゆったり＆のびのびバスルーム「リノビオ」。
上質なベージュを基調とした、洗練とグレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■リノビオ Pシリーズ Pタイプ 1216
・壁カラー：エレガントモザイク
・浴槽カラー：ホワイト
・床カラー：単色／ホワイト
・換気設備：天井換気扇
・シャワー：エコフルシャワー＜ホワイト＞
・ドア：折り戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_renobiov.png',
				'plan_image_filen'       => 'renobio_bathroom1216_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 759800,
				'reform_cost_11'         => 759800,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 300000,
				'reform_cost_31'         => 300000,
				'reform_cost_90'         => 24000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/renobio/',
				'link_url_1_mei'         => 'LIXIL HPでリノビオVを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392203',
				'kengine_plan_cd2'       => '1000393394',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '009',
				'syouhin_plan_id'        => '91',
				'syouhin_mei'            => 'アライズ',
				'plan_mei'               => 'アライズ 風呂単体交換戸建リフォーム（1316）ナチュラルテイスト',
				'setumei_bun_1'          => '人がお風呂に求める”心地いい”という瞬間のために進化したバスルーム、Arise。
ナチュラル色の壁パネルで、明るさと心からくつろげるバスルームを演出。',
				'setumei_bun_2'          => '■アライズ＜2017＞ Kタイプ 1316
・壁カラー（アクセントパネル）：組石ベージュ
・浴槽カラー：ホワイト
・床カラー：キレイサーモフロア 単色／ホワイト
・換気設備：100V換気乾燥暖房機
・シャワー：レインO2シャワー（ユーフォリア）
・ドア：折り戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_airlis.png',
				'plan_image_filen'       => 'arise_bathroom1316_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1167600,
				'reform_cost_11'         => 1167600,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 473000,
				'reform_cost_31'         => 473000,
				'reform_cost_90'         => 38000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/arise/default.htm',
				'link_url_1_mei'         => 'LIXIL HPでアライズを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000391747',
				'kengine_plan_cd2'       => '1000393395',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '009',
				'syouhin_plan_id'        => '92',
				'syouhin_mei'            => 'アライズ',
				'plan_mei'               => 'アライズ 風呂単体交換戸建リフォーム（1316）ナチュラルテイスト',
				'setumei_bun_1'          => '人がお風呂に求める”心地いい”という瞬間のために進化したバスルーム、Arise。
グレーの壁パネルで、上質で落ち着いた雰囲気を表現。',
				'setumei_bun_2'          => '■アライズ＜2017＞  Kタイプ 1316
・壁カラー（アクセントパネル）：組石グレー
・浴槽カラー：ホワイト
・床カラー：キレイサーモフロア 単色／ホワイト
・換気設備：100V換気乾燥暖房機
・シャワー：レインO2シャワー（ユーフォリア）
・ドア：折り戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_airlis.png',
				'plan_image_filen'       => 'arise_bathroom1316_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1167600,
				'reform_cost_11'         => 1167600,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 473000,
				'reform_cost_31'         => 473000,
				'reform_cost_90'         => 38000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/arise/default.htm',
				'link_url_1_mei'         => 'LIXIL HPでアライズを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392320',
				'kengine_plan_cd2'       => '1000393396',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '009',
				'syouhin_plan_id'        => '93',
				'syouhin_mei'            => 'アライズ',
				'plan_mei'               => 'アライズ 風呂単体交換戸建リフォーム（1316）ナチュラルテイスト',
				'setumei_bun_1'          => '人がお風呂に求める”心地いい”という瞬間のために進化したバスルーム、Arise。
上質なベージュを基調とした、洗練とグレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■アライズ＜2017＞  Kタイプ 1316
・壁カラー（アクセントパネル）：シャインベージュ
・浴槽カラー：ホワイト
・床カラー：キレイサーモフロア 単色／ホワイト
・換気設備：100V換気乾燥暖房機
・シャワー：レインO2シャワー（ユーフォリア）
・ドア：折り戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_airlis.png',
				'plan_image_filen'       => 'arise_bathroom1316_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 1167600,
				'reform_cost_11'         => 1167600,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 473000,
				'reform_cost_31'         => 473000,
				'reform_cost_90'         => 38000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/arise/default.htm',
				'link_url_1_mei'         => 'LIXIL HPでアライズを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392326',
				'kengine_plan_cd2'       => '1000393397',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '008',
				'syouhin_plan_id'        => '94',
				'syouhin_mei'            => 'スパージュPZ',
				'plan_mei'               => 'スパージュ 風呂単体交換マンションリフォーム（1616）ナチュラルテイスト',
				'setumei_bun_1'          => '湯を、愉しむ。時を、味わう。SPAGE＜スパージュ＞。
ナチュラル色の壁パネルで、明るさと心からくつろげるバスルームを演出。',
				'setumei_bun_2'          => '■スパージュ＜2016＞ PZタイプ 1616
・壁カラー：壁カラー：組石ベージュ
・浴槽カラー：ツートーンブラック
・床カラー：キレイサーモフロア 加飾／モザイクホワイト
・換気設備：100V換気乾燥暖房機
・シャワー：スプレーシャワー ストレートタイプ＜メタル調＞
・ドア：開き戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_spage.png',
				'plan_image_filen'       => 'spage_bathroom1616_natural.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 229960,
				'reform_cost_11'         => 229960,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 300000,
				'reform_cost_31'         => 300000,
				'reform_cost_90'         => 24000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/spage/',
				'link_url_1_mei'         => 'LIXIL HPでスパージュを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000381136',
				'kengine_plan_cd2'       => '1000393374',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],

        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '008',
				'syouhin_plan_id'        => '95',
				'syouhin_mei'            => 'スパージュPZ',
				'plan_mei'               => 'スパージュ 風呂単体交換マンションリフォーム（1616）ナチュラルテイスト',
				'setumei_bun_1'          => '湯を、愉しむ。時を、味わう。SPAGE＜スパージュ＞。
ツートーンブラックの浴槽とグレーの壁パネルで、上質で落ち着いた雰囲気を表現。',
				'setumei_bun_2'          => '■スパージュ＜2016＞ PZタイプ 1616
・壁カラー：組石グレー
・浴槽カラー：ツートーンブラック
・床カラー：キレイサーモフロア 加飾／モザイクホワイト
・換気設備：100V換気乾燥暖房機
・シャワー：スプレーシャワー ストレートタイプ＜メタル調＞
・ドア：開き戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_spage.png',
				'plan_image_filen'       => 'spage_bathroom1616_chic.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 229960,
				'reform_cost_11'         => 229960,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 300000,
				'reform_cost_31'         => 300000,
				'reform_cost_90'         => 24000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/spage/',
				'link_url_1_mei'         => 'LIXIL HPでスパージュを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392346',
				'kengine_plan_cd2'       => '1000393400',
				'enavi_mitsu_cd1'        => '',
				'enavi_mitsu_cd2'        => '',
				'regis_user_acct_cd'     => '12345678',
				'regis_terminal_ip_addr' => '12345678',
				'upd_pgm_cd'             => '12345678',
				'upd_date'               => Carbon::now(),
				'patch_id'               => '1',
        	],


        	[

        		'category_cd'            => '003',
				'subcategory_cd'         => '008',
				'syouhin_plan_id'        => '96',
				'syouhin_mei'            => 'スパージュPZ',
				'plan_mei'               => 'スパージュ 風呂単体交換マンションリフォーム（1616）ナチュラルテイスト',
				'setumei_bun_1'          => '湯を、愉しむ。時を、味わう。SPAGE＜スパージュ＞。
上質なベージュを基調とした、洗練とグレード感あふれるコーディネート。',
				'setumei_bun_2'          => '■スパージュ＜2016＞ PZタイプ 1616
・壁カラー：組石グレー
・浴槽カラー：ツートーンブラック
・床カラー：キレイサーモフロア 加飾／モザイクホワイト
・換気設備：100V換気乾燥暖房機
・シャワー：スプレーシャワー ストレートタイプ＜メタル調＞
・ドア：開き戸（11mm段差）',
				'syouhin_logo_filen'     => 'logo_spage.png',
				'plan_image_filen'       => 'spage_bathroom1616_elegant.jpg',
				'kakakuhyouji_kbn'       => '01',
				'keisai_start_ymd'       => date('Y-m-d'),
				'keisai_end_ymd'         => date('Y-m-d'),
				'reform_cost_10'         => 229960,
				'reform_cost_11'         => 229960,
				'reform_cost_20'         => 0,
				'reform_cost_21'         => 0,
				'reform_cost_30'         => 300000,
				'reform_cost_31'         => 300000,
				'reform_cost_90'         => 24000,
				'link_url_1'             => 'http://www.lixil.co.jp/lineup/bathroom/spage/',
				'link_url_1_mei'         => 'LIXIL HPでスパージュを見る',
				'link_url_2'             => '',
				'link_url_2_mei'         => '',
				'syouhin_3D_kbn'         => '02',
				'syouhin_3D_plan_cd'     => '',
				'syouhin_toroku_kbn'     => '03',
				'kengine_plan_cd1'       => '1000392348',
				'kengine_plan_cd2'       => '1000393401',
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
