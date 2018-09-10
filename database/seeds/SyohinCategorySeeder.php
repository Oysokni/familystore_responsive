<?php

use App\Seeder\BaseSeeder;
use Carbon\Carbon;
use App\Models\SyohinCategory;

class SyohinCategorySeeder extends BaseSeeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if ($this->checkSeeder('SyohinCategoryV10Seeder')) {
            return;
        }

        $categories = [
            [
                'category_cd'         => '001',
                'category_mei'        => 'キッチン',
                'display_order'       => '4',
                'category_logo_filen' => 'キッチン表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《キッチンリフォーム》※設置場所移設なし。</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目</td>
                                                  <td>部屋養生・既存キッチン解体・配管切り回し</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>2日目</td>
                                                  <td>吊戸下地工事・電気配線工事・キッチンパネル貼り</td>
                                                  <td>食洗機新設・IH新設用工事含む（配管・電気）</td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>3日目</td>
                                                  <td>システムキッチン設置・給排水・電気接続</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>4日目</td>
                                                  <td>機器説明・御引渡し（予備日）</td>
                                                  <td></td>
                                                  <td>◎</td>
                                                </tr>
                                            </tbody>
                                        </table>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '002',
                'category_mei'        => 'トイレ',
                'display_order'       => '1',
                'category_logo_filen' => 'トイレ表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《トイレリフォーム》※内装工事なし。</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目</td>
                                                  <td>部屋養生・既存トイレ解体・トイレ設置</td>
                                                  <td>リトイレ2時間程度</td>
                                                  <td>完了後◎</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《トイレリフォーム》※内装工事あり。</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目<br>AM</td>
                                                  <td>部屋養生・既存トイレ解体・クロス張替</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>1日目<br>PM</td>
                                                  <td>CF張替・新規トイレ設置・機器説明・引渡し</td>
                                                  <td>～16:00頃終了</td>
                                                  <td>完了後◎</td>
                                                </tr>
                                            </tbody>
                                        </table>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '003',
                'category_mei'        => '浴室',
                'display_order'       => '3',
                'category_logo_filen' => '浴室表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《在来浴室⇒ユニットバス》※戸建て</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目</td>
                                                  <td>部屋養生・既存浴室解体</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>2日目</td>
                                                  <td>配管切り回し・電気配線工事・ダクト工事・土間コンクリート打設</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>3日目</td>
                                                  <td>土間コンクリート養生期間</td>
                                                  <td>土台腐食時は土台入替</td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>4日目</td>
                                                  <td>ユニットバス設置・給排水接続・電気結線</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>5日目</td>
                                                  <td>入口枠取付・機能検査</td>
                                                  <td></td>
                                                  <td>夜～◎</td>
                                                </tr>
                                                <tr>
                                                  <td>6日目</td>
                                                  <td>機器説明・御引渡し（予備日）</td>
                                                  <td></td>
                                                  <td>◎</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《ユニットバス⇒ユニットバス》※マンション・戸建て</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目</td>
                                                  <td>部屋養生・既存ユニットバス解体・配管切り回し・電気配線・ダクト工事</td>
                                                  <td>マンションはEV～玄関養生</td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>2日目</td>
                                                  <td>ユニットバス設置・給排水接続・電気結線</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>3日目</td>
                                                  <td>入口枠取付・機能検査</td>
                                                  <td></td>
                                                  <td>夜～◎</td>
                                                </tr>
                                                <tr>
                                                  <td>4日目</td>
                                                  <td>機器説明・御引渡し（予備日）</td>
                                                  <td></td>
                                                  <td>◎</td>
                                                </tr>
                                            </tbody>
                                        </table>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '004',
                'category_mei'        => '洗面化粧室',
                'display_order'       => '2',
                'category_logo_filen' => '洗面化粧台表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《化粧台リフォーム》※内装工事なし。</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目<br>AM</td>
                                                  <td>部屋養生・既存化粧台解体・配管切り回し</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>1日目<br>PM</td>
                                                  <td>新規化粧台設置・機器説明・御引渡し</td>
                                                  <td>～15:00頃終了</td>
                                                  <td>◎</td>
                                                </tr>
                                                <tr>
                                                  <td>2日目</td>
                                                  <td>予備日</td>
                                                  <td></td>
                                                  <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《化粧台リフォーム》※内装工事あり。</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目<br>AM</td>
                                                  <td>部屋養生・既存化粧台解体・配管切り回し</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>1日目<br>PM</td>
                                                  <td>クロス・ＣＳ張替</td>
                                                  <td></td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>2日目<br>AM</td>
                                                  <td>洗面化粧台設置・機器説明・御引渡し</td>
                                                  <td></td>
                                                  <td>◎</td>
                                                </tr>
                                            </tbody>
                                        </table>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '005',
                'category_mei'        => '窓まわり',
                'display_order'       => '6',
                'category_logo_filen' => '窓まわり表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《内窓リフォーム》 インプラス</th>
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
                </div>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《窓リフォーム》 リフレムリプラス</th>
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
                        </li>
                        <li>
                            <p>※既存サッシの状況により取りつかない場合もございますので予めご了承下さい。</p>
                        </li>
                    </ul>
                </div>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《シェード取付け》 スタイルシェード</th>
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
                    </tbody>
                </table>
                <div class="more-info">
                    <ul>
                        <li>
                            <p>※サイズにより変動しますが、１か所＝0.5～1時間程度を目安として下さい。</p>
                        </li>
                    </ul>
                </div>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《リフォームシャッター取付け》 ※電動の場合</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>シャッター取付（枠・本体・ガイドレール・ボックス）・調整</td>
                          <td>およそ1時間</td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br/>AM</td>
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
                        </li>
                        <li>
                            <p>※既存サッシの状況により取りつかない場合もございますので予めご了承下さい。</p>
                        </li>
                    </ul>
                </div>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《リフォームシャッター取付け》 ※手動の場合</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>シャッター取付（枠・本体・ガイドレール・ボックス）・調整</td>
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
                    </ul>
                </div>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '006',
                'category_mei'        => '玄関',
                'display_order'       => '5',
                'category_logo_filen' => '玄関表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                                            <thead>
                                                <tr>
                                                  <th class="first">日数</th>
                                                  <th class="second">《玄関ドアリフォーム》※リシェント。</th>
                                                  <th class="third">備考</th>
                                                  <th class="fourth">使用可否</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                  <td>1日目<br>AM</td>
                                                  <td>古いドアの取り外し・不要な部分の切り取り</td>
                                                  <td>9:00スタート</td>
                                                  <td>×</td>
                                                </tr>
                                                <tr>
                                                  <td>1日目<br>PM</td>
                                                  <td>新しい枠の取付け・内外額縁を取付け・細かい補修とチェックを行って完了</td>
                                                  <td>～17:00頃終了</td>
                                                  <td>完了後◎</td>
                                                </tr>
                                            </tbody>
                                        </table>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '007',
                'category_mei'        => 'インテリア建材',
                'display_order'       => '7',
                'category_logo_filen' => 'インテリア建材表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《床リフォーム》 ラシッサ ※木質フロアへの重ね張り施工（６帖程度）</th>
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
                    </tbody>
                </table>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《床リフォーム》 ラシッサ ※じゅうたんへの床材施工 （６帖程度）</th>
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
                </div>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《収納取付け》 ヴィータス ※下地補強ありの場合</th>
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
                    </tbody>
                </table>
                <div class="more-info">
                    <ul>
                        <li>
                            <p>※商品の大きさや取付場所により取付時間はことなります。</p>
                        </li>
                    </ul>
                </div>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '008',
                'category_mei'        => 'ファブリック',
                'display_order'       => '9',
                'category_logo_filen' => '',
                'product_process'     => '',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '009',
                'category_mei'        => 'タイル建材(外用)',
                'display_order'       => null,
                'category_logo_filen' => '',
                'product_process'     => '',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '010',
                'category_mei'        => 'タイル建材(室内用)',
                'display_order'       => '8',
                'category_logo_filen' => 'タイル建材室内用表示画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《エコカラットリフォーム》 デザインパッケージ</th>
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
                          <th class="second">《エコカラットリフォーム》 フリープラン（~8㎡）</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br>AM</td>
                          <td>部屋養生・下地調整・割り付け</td>
                          <td></td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br>PM</td>
                          <td>切欠き等の加工・貼付施工・カラットコーク処理（1人工貼付面積~8㎡目安）</td>
                          <td>～17:00頃終了<br/>
                              （８㎡以上の場合は２日施工）</td>
                          <td>完了後◎</td>
                        </tr>
                    </tbody>
                </table>',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '011',
                'category_mei'        => 'エクステリア（車庫まわり）',
                'display_order'       => '10',
                'category_logo_filen' => 'エクステリア車庫回り表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《カーポート取付け》 フーゴ ※1台用（柱２本）</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>柱穴掘削作業・柱基礎工事（コンクリート流し込み）</td>
                          <td>およそ２時間</td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>柱基礎コンクリート硬化時間（オープンタイム）</td>
                          <td>およそ４時間</td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>本体組立施工（屋根吊りこみ等）、細かい補修・調整とチェックを行って完了</td>
                          <td>およそ2時間</td>
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
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '012',
                'category_mei'        => 'エクステリア（ガーデン)',
                'display_order'       => '11',
                'category_logo_filen' => 'エクステリアガーデン表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《ウッドデッキ》 樹ら楽ステージ 間口3.6ｍ×出幅1.8ｍ程度新設</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>土間突き固め、束石設置、本体組立</td>
                          <td></td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br/>PM</td>
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
                </div>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《テラス取付け》 シュエット</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>柱仮設置・屋根組立・屋根取付施工・コーキング施工</td>
                          <td></td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br/>PM</td>
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
                </div>
                <table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《テラス囲い取付け》 サニージュ 間口1.8ｍ×出幅0.9ｍ程度</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>建物への接続工事（根太掛け・枠・垂木掛け取付）</td>
                          <td></td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br/>PM</td>
                          <td>柱立て・枠材の取付。屋根・開口部・デッキ材など取付施工。<br/>
                            コーキング施工。細かい補修とチェックを行って完了。</td>
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
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '013',
                'category_mei'        => '外壁・屋根',
                'display_order'       => null,
                'category_logo_filen' => '',
                'product_process'     => '',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '014',
                'category_mei'        => '太陽光発電',
                'display_order'       => null,
                'category_logo_filen' => '',
                'product_process'     => '',
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
            [
                'category_cd'         => '999',
                'category_mei'        => 'その他',
                'display_order'       => '99',
                'category_logo_filen' => 'その他表示用画像.jpg',
                'product_process'     => '<table class="table table-bordered table-pattern">
                    <thead>
                        <tr>
                          <th class="first">日数</th>
                          <th class="second">《換気システム新設》 エアマイスター</th>
                          <th class="third">備考</th>
                          <th class="fourth">使用可否</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>壁コア抜き施工・固定プレート取付・本体取付工事</td>
                          <td>およそ1時間</td>
                          <td>×</td>
                        </tr>
                        <tr>
                          <td>1日目<br/>AM</td>
                          <td>電気配線施工、外部ベントキャップ取付。コーキング施工。</td>
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
                'upd_date'            => Carbon::now(),
                'patch_id'            => '',
            ],
        ];

        DB::beginTransaction();
        try {
            foreach ($categories as $idx => $category) {

                $isExits = SyohinCategory::find($category['category_cd']);

                if ($isExits) {
                    $isExits->category_mei = $category['category_mei'];
                    $isExits->display_order = $category['display_order'];
                    $isExits->category_logo_filen = $category['category_logo_filen'];
                    $isExits->product_process = $category['product_process'];
                    $isExits->upd_date = $category['upd_date'];
                    $isExits->patch_id = $category['patch_id'];
                    $isExits->save();
                } else {
                    $cate = SyohinCategory::create($category);
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
