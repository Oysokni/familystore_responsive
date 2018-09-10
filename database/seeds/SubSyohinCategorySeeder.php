<?php

use App\Seeder\BaseSeeder;
use App\Models\SubSyohinCategory;
use Carbon\Carbon;

class SubSyohinCategorySeeder extends BaseSeeder
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
        
        //
        $subCategorys = [

        	[
				'subcategory_cd'  => '001',
				'category_cd'     => '001',
				'subcategory_mei' => 'リシェルSI',
				'display_order'   => '1',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '002',
				'category_cd'     => '001',
				'subcategory_mei' => 'リシェルPLAT',
				'display_order'   => '2',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '003',
				'category_cd'     => '001',
				'subcategory_mei' => 'アレスタ',
				'display_order'   => '3',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '004',
				'category_cd'     => '002',
				'subcategory_mei' => 'サティス',
				'display_order'   => '1',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '005',
				'category_cd'     => '002',
				'subcategory_mei' => 'リフォレ',
				'display_order'   => '2',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '006',
				'category_cd'     => '002',
				'subcategory_mei' => 'プレアス',
				'display_order'   => '3',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '007',
				'category_cd'     => '002',
				'subcategory_mei' => 'アメージュＺＡ',
				'display_order'   => '4',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '008',
				'category_cd'     => '003',
				'subcategory_mei' => 'スパージュ',
				'display_order'   => '1',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '009',
				'category_cd'     => '003',
				'subcategory_mei' => 'アライズ',
				'display_order'   => '2',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '010',
				'category_cd'     => '003',
				'subcategory_mei' => 'リノビオ',
				'display_order'   => '3',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《エコカラットリフォーム》    デザインパッケージ</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目</td>
                                                              <td>部屋養生・下地調整・割り付け・貼付施工・カラットコーク処理</td>
                                                              <td>２~３時間程度（下地クロスの場合）</td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>   
                                                    </table>
                                                    <table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《エコカラットリフォーム》  フリープラン（~8㎡）</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>PM</td>
                                                              <td>部屋養生・下地調整・割り付け</td>
                                                              <td></td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>PM</td>
                                                              <td>切欠き等の加工・貼付施工・カラットコーク処理（1人工貼付面積~8㎡目安）</td>
                                                              <td>～17:00頃終了（８㎡以上の場合は２日施工）</td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>   
                                                    </table>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '011',
				'category_cd'     => '004',
				'subcategory_mei' => 'ルミシス',
				'display_order'   => '1',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '012',
				'category_cd'     => '004',
				'subcategory_mei' => 'L.C',
				'display_order'   => '2',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '013',
				'category_cd'     => '004',
				'subcategory_mei' => 'ピアラ',
				'display_order'   => '3',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '014',
				'category_cd'     => '004',
				'subcategory_mei' => 'ミズリア',
				'display_order'   => '4',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '015',
				'category_cd'     => '005',
				'subcategory_mei' => 'リフレムリプラス',
				'display_order'   => '1',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                                <th class="first">日数</th>
                                                                <th class="second">《リフレム リプラス》</th>
                                                                <th class="third">備考</th>
                                                                <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1日目<br>AM</td>
                                                                    <td>古い窓サッシの取り外し・不要な部分の切り取り</td>
                                                                    <td>およそ1時間</td>
                                                                    <td>×</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1日目<br>AM</td>
                                                                    <td>新しい枠の取付け・新しい障子の吊り込み・細かい補修とチェックを行って完了</td>
                                                                    <td>およそ1時間</td>
                                                                    <td>完了後◎</td>
                                                                </tr>
                                                            </tbody>   
                                                        </table>
                                                        <div class="more-info">
                                                            <ul>
                                                                <li>
                                                                    <p>※窓サイズにより変動しますが、１か所＝1.5~２時間程度を目安として下さい。</p>
                                                                    <ul>
                                                                        <li>
                                                                            ※既存サッシの状況により取りつかない場合もございますので予めご了承下さい。
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '016',
				'category_cd'     => '005',
				'subcategory_mei' => 'インプラス',
				'display_order'   => '2',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                                <th class="first">日数</th>
                                                                <th class="second">《インプラス》</th>
                                                                <th class="third">備考</th>
                                                                <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1日目<br>AM</td>
                                                                    <td>枠の取付け・新しい障子の吊り込み・細かい補修・調整とチェックを行って完了</td>
                                                                    <td>およそ1時間</td>
                                                                    <td>完了後◎</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="more-info">
                                                            <ul>
                                                                <li>
                                                                    <p>※窓サイズにより変動しますが、１か所＝１時間程度を目安として下さい。</p>
                                                                </li>
                                                                <li>
                                                                    <p>※既存窓の状況により別途補助部材が必要になることがあります。</p>
                                                                </li>
                                                            </ul>
                                                        </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '017',
				'category_cd'     => '005',
				'subcategory_mei' => 'スタイルシェード',
				'display_order'   => '3',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                                <th class="first">日数</th>
                                                                <th class="second">《スタイルシェード》</th>
                                                                <th class="third">備考</th>
                                                                <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1日目</td>
                                                                <td>サッシ枠や壁面へ専用金具でシェードBOX又はフックの取付・調整</td>
                                                                <td>およそ30分～1時間/箇所</td>
                                                                <td>完了後◎</td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="more-info">
                                                        <ul>
                                                            <li>
                                                                <p>※サイズにより変動しますが、１か所＝0.5～1時間程度を目安として下さい。</p>
                                                            </li>
                                                        </ul>
                                                    </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '018',
				'category_cd'     => '005',
				'subcategory_mei' => 'リフォームシャッター',
				'display_order'   => '4',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                                <th class="first">日数</th>
                                                                <th class="second">《リフォームシャッター》 ※電動の場合</th>
                                                                <th class="third">備考</th>
                                                                <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1日目<br>AM</td>
                                                                    <td>シャッター取付（枠・本体・ガイドレール・ボックス）・調整</td>
                                                                    <td>およそ1時間</td>
                                                                    <td>×</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>1日目<br>AM</td>
                                                                    <td>電気配線工事（建物内部）</td>
                                                                    <td>およそ1時間</td>
                                                                    <td>完了後◎</td>
                                                                </tr>
                                                          </tbody>
                                                        </table>
                                                        <div class="more-info">
                                                            <ul>
                                                                <li>
                                                                    <p>※窓サイズにより変動しますが、１か所＝２時間程度を目安として下さい。</p>
                                                                    <ul>
                                                                        <li>
                                                                            <p>※既存サッシの状況により取りつかない場合もございますので予めご了承下さい。</p>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <table class="table table-bordered table-pattern">
                                                            <thead>
                                                                <tr>
                                                                  <th class="first">日数</th>
                                                                  <th class="second">《リフォームシャッター》 ※手動の場合</th>
                                                                  <th class="third">備考</th>
                                                                  <th class="fourth">使用可否</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                  <td>1日目<br>AM</td>
                                                                  <td>シャッター取付（枠・本体・ガイドレール・ボックス）・調整</td>
                                                                  <td>およそ1時間</td>
                                                                  <td>完了後◎</td>
                                                                </tr>
                                                                <tr>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                  <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="more-info">
                                                            <ul>
                                                                <li>
                                                                    <p>※窓サイズにより変動しますが、１か所＝１時間程度を目安として下さい。</p>
                                                                    <ul>
                                                                        <li>
                                                                            <p>※既存サッシの状況により取りつかない場合もございますので予めご了承下さい。</p>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '019',
				'category_cd'     => '005',
				'subcategory_mei' => 'インプラス ウッド ',
				'display_order'   => '5',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '020',
				'category_cd'     => '005',
				'subcategory_mei' => 'エアリス',
				'display_order'   => '6',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '021',
				'category_cd'     => '006',
				'subcategory_mei' => 'リシェント 玄関引戸',
				'display_order'   => '1',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '022',
				'category_cd'     => '006',
				'subcategory_mei' => 'リシェント 玄関ドア3',
				'display_order'   => '2',
                                'product_process' => '',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '023',
				'category_cd'     => '007',
				'subcategory_mei' => 'ラシッサ',
				'display_order'   => '1',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《ラシッサ》 ※木質フロアへの重ね張り施工 （６帖程度）</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>旧巾木撤去、フロア材貼り施工（接着・釘打ち）、新規巾木取付、清掃</td>
                                                              <td>およそ３時間</td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                            <tr>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                              <td></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《ラシッサ》 ※じゅうたんへの床材施工 （６帖程度）</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>旧巾木撤去、絨毯撤去、下地チェック（合板材）</td>
                                                              <td>およそ１時間</td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>PM</td>
                                                              <td>フロア材貼り施工（接着・釘打ち）、新規巾木取付、清掃</td>
                                                              <td>およそ３時間</td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="more-info">
                                                        <ul>
                                                            <li>
                                                                <p>※下地が合板以外の場合や、不陸が著しく大きな場合には別途不陸調整作業・費用がかかります。</p>
                                                            </li>
                                                        </ul>
                                                    </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '024',
				'category_cd'     => '007',
				'subcategory_mei' => 'ヴィータス',
				'display_order'   => '2',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                                <th class="first">日数</th>
                                                                <th class="second">《ヴィータス》  ※下地補強ありの場合</th>
                                                                <th class="third">備考</th>
                                                                <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>1日目<br>AM</td>
                                                                    <td>壁下地補強・本体取付・扉等の調整・周囲清掃後完了</td>
                                                                    <td>およそ1.5時間</td>
                                                                    <td>完了後◎</td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                        <div class="more-info">
                                                            <ul>
                                                                <li>
                                                                    <p>※商品の大きさや取付場所により取付時間はことなります。</p>
                                                                </li>
                                                            </ul>
                                                        </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '025',
				'category_cd'     => '010',
				'subcategory_mei' => 'エコカラット',
				'display_order'   => '1',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《エコカラットリフォーム》    デザインパッケージ</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>1日目</td>
                                                                <td>部屋養生・下地調整・割り付け・貼付施工・カラットコーク処理</td>
                                                                <td>２~３時間程度（下地クロスの場合）</td>
                                                                <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>   
                                                    </table>
                                                    <table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《エコカラットリフォーム》  フリープラン（~8㎡）</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目 AM</td>
                                                              <td>部屋養生・下地調整・割り付け</td>
                                                              <td></td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目 PM</td>
                                                              <td>切欠き等の加工・貼付施工・カラットコーク処理（1人工貼付面積~8㎡目安）</td>
                                                              <td>～17:00頃終了（８㎡以上の場合は２日施工）</td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>   
                                                    </table>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '026',
				'category_cd'     => '011',
				'subcategory_mei' => 'フーゴ',
				'display_order'   => '1',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《フーゴ》 ※1台用（柱２本）</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>柱穴掘削作業・柱基礎工事（コンクリート流し込み）</td>
                                                              <td>およそ２時間</td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>柱基礎コンクリート硬化時間（オープンタイム）</td>
                                                              <td>およそ４時間</td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>本体組立施工（屋根吊りこみ等）、細かい補修・調整とチェックを行って完了</td>
                                                              <td>およそ２時間</td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="more-info">
                                                            <ul>
                                                                <li>
                                                                    <p>※土間がコンクリート以外（土・砂利等）の場合で新規設置。ハツリ等が発生する場合は別途工事。</p>
                                                                </li>
                                                            </ul>
                                                    </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '027',
				'category_cd'     => '012',
				'subcategory_mei' => '樹ら楽ステージ',
				'display_order'   => '1',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《樹ら楽ステージ》 間口3.6ｍ×出幅1.8ｍ程度新設</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>土間突き固め、束石設置、本体組立</td>
                                                              <td></td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>PM</td>
                                                              <td>本体組立施工、細かい補修・調整とチェックを行って完了</td>
                                                              <td></td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="more-info">
                                                        <ul>
                                                            <li>
                                                                <p>※原則１日工事ですが、本体カットやフェンス等がある場合には２日工事となることもあります。</p>
                                                            </li>
                                                        </ul>
                                                    </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '028',
				'category_cd'     => '012',
				'subcategory_mei' => 'シュエット',
				'display_order'   => '2',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《シュエット》 テラス</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>柱仮設置・屋根組立・屋根取付施工・コーキング施工</td>
                                                              <td></td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>PM</td>
                                                              <td>柱穴掘削・柱固定・細かい補修とチェックを行って完了</td>
                                                              <td></td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="more-info">
                                                        <ul>
                                                            <li>
                                                                <p>※テラス柱のコンクリート固定施工は別途。</p>
                                                            </li>
                                                        </ul>
                                                    </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],
        	[
				'subcategory_cd'  => '029',
				'category_cd'     => '012',
				'subcategory_mei' => 'サニージュ',
				'display_order'   => '3',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《サニージュ》 間口1.8ｍ×出幅0.9ｍ程度</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>建物への接続工事（根太掛け・枠・垂木掛け取付）</td>
                                                              <td></td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>PM</td>
                                                              <td>柱立て・枠材の取付。屋根・開口部・デッキ材など取付施工。<br/>コーキング施工。細かい補修とチェックを行って完了</td>
                                                              <td></td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="more-info">
                                                        <ul>
                                                            <li>
                                                                <p>※大きさにより2日間工事になります。</p>
                                                            </li>
                                                        </ul>
                                                    </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],

        	[
				'subcategory_cd'  => '030',
				'category_cd'     => '999',
				'subcategory_mei' => 'エアマイスター ',
				'display_order'   => '1',
                                'product_process' => '<table class="table table-bordered table-pattern">
                                                        <thead>
                                                            <tr>
                                                              <th class="first">日数</th>
                                                              <th class="second">《エアマイスター》   新設</th>
                                                              <th class="third">備考</th>
                                                              <th class="fourth">使用可否</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>壁コア抜き施工・固定プレート取付・本体取付工事</td>
                                                              <td>およそ1時間</td>
                                                              <td>×</td>
                                                            </tr>
                                                            <tr>
                                                              <td>1日目<br>AM</td>
                                                              <td>電気配線施工、外部ベントキャップ取付。コーキング施工</td>
                                                              <td>およそ２時間</td>
                                                              <td>完了後◎</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                    <div class="more-info">
                                                        <ul>
                                                            <li>
                                                                <p>※専用回路が必要なため分電盤等現況により電気工事の規模と時間が変わります。</p>
                                                            </li>
                                                        </ul>
                                                    </div>',
				'upd_date'        => Carbon::now(),
				'patch_id'        => '',

        	],




        ];

        DB::beginTransaction();
        try {
        	foreach ( $subCategorys as $idx => $subCategory ) {

        		$isExits = SubSyohinCategory::where('subcategory_cd',$subCategory['subcategory_cd'])->first();
        		if( $isExits ) {
        			continue;
        		}

        		$sub = SubSyohinCategory::create($subCategory);
        	}

                $this->insertSeeder();
        	DB::commit();
        	
        } catch(\Exception $ex) {
        	DB::rollback();
        	throw $ex;
        }
        
    }

}
