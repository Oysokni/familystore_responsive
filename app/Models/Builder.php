<?php

namespace App\Models;

use App\Models\BaseModel;

class Builder extends BaseModel
{
    const PER_PAGE = 25;

    const TYPE_HOMEMAKER = 1;
    const CODE_HOMEMAKER = '11000';
    const CONTENT_HOMEMAKER = 'HM/地場';
    const TYPE_HOMEMAKER_AND_GROUPFC = 2;
    const CODE_HOMEMAKER_AND_GROUPFC = '11100';
    const CONTENT_HOMEMAKER_AND_GROUPFC = 'HM/地場、FC';
    const TYPE_HOMEMAKER_AND_COMPATIBLE = 3;
    const CODE_HOMEMAKER_AND_COMPATIBLE = '11010';
    const CONTENT_HOMEMAKER_AND_COMPATIBLE = 'HM/地場、SW';
    const TYPE_DETACHEDHOUSE = 4;
    const CODE_DETACHEDHOUSE = '11110';
    const CONTENT_DETACHEDHOUSE = 'HM/地場、FC、SW';
    const TYPE_APARTMENT = 5;
    const CODE_APARTMENT = '00001';
    const CONTENT_APARTMENT = 'マンション';
    const TYPE_APARTMENT_ALL_06 = 6;
    const CODE_APARTMENT_ALL_06 = '11001';
    const CONTENT_APARTMENT_ALL_06 = 'HM/地場, マンション';
    const TYPE_APARTMENT_ALL_07 = 7;
    const CODE_APARTMENT_ALL_07 = '11101';
    const CONTENT_APARTMENT_ALL_07= 'HM/地場, FC, マンション';
    const TYPE_APARTMENT_ALL_08 = 8;
    const CODE_APARTMENT_ALL_08 = '11011';
    const CONTENT_APARTMENT_ALL_08= 'HM/地場, SW, マンション';
    const TYPE_APARTMENT_ALL_09 = 9;
    const CODE_APARTMENT_ALL_09 = '11111';
    const CONTENT_APARTMENT_ALL_09= 'HM/地場、FC, SW, マンション';

    const POS_HOMEMAKER = 0;
    const NAME_HOMEMAKER = 'ハウスメーカー';
    const POS_BUIDINGDETACH = 1;
    const NAME_BUIDINGDETACH = '地場ビルダー';
    const POS_GROUPFC = 2;
    const NAME_GROUPFC = 'LIXILグループFC';
    const POS_SUPERWALL = 3;
    const NAME_SUPERWALL = 'スーパーウォール対応ビルダー';
    const POS_APARTMENT = 4;
    const NAME_APARTMENT = 'マンション';

    const TAIOU_KBN_TYPE_1 = 0;
    const TAIOU_KBN_TYPE_2 = 1;
    const TAIOU_KBN_TYPE_3 = 2;
    const TAIOU_KBN_TYPE_4 = 3;
    const TAIOU_KBN_TYPE_5 = 4;
    const TAIOU_KBN_TYPE_6 = 5;

    protected $table = 'm_builder';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

                'builder_id',
                'builer_mei',
                'builer_mei_kana',
                'start_ymd',
                'end_ymd',
                'zip_no',
                'todouhuken_mei',
                'sikutyouson_mei',
                'tyoumei',
                'tat_mei',
                'builer_busyo_mei',
                'builer_mail',
                'builer_fax' ,
                'builder_url',
                'eigyo_area_kbn',
                'taiou_kbn',
                'bdb_cd',
                'lcr_cd',
                'mdm_houjin_cd',
                'display_order_1',
                'display_order_2',
                'benefit_flg',
                'regis_ymd',
                'upd_date',
                'upd_user_id',
                'upd_terminal_ip_addr',
                'patch_id',

    ];
    protected $primaryKey = 'builder_id';

    /**
     * get list items
     * @param type $args
     * @return type
     */
    public static function getData($args = [])
    {
        $opts = [
            'fields' => ['*'],
            'orderby' => 'upd_date',
            'order' => 'desc',
            'type' => [],
            'district' => null,
            'per_page' => Builder::PER_PAGE,
            'page' => 1
        ];

        $opts = array_merge($opts, $args);

        $collection = self::select($opts['fields']);
        if ($opts['district'] !== null) {
            $opts['district'] = $opts['district'] + 1;
            $collection->where(\DB::raw("substr(eigyo_area_kbn, " . $opts['district'] . ", 1)"), "=", 1);
        }

        $types = $opts['type'];
        $collection->where(function($q) use ($types) {
            foreach($types as $type) {
                if ($type == 0) {
                    $q->where(\DB::raw("substr(taiou_kbn, ".($type + 1).", 1)"), "=", 1);
                } else {
                    $q->orWhere(\DB::raw("substr(taiou_kbn, ".($type + 1).", 1)"), "=", 1);
                }
            }
            return $q;
        });

        if (!in_array(self::TAIOU_KBN_TYPE_5, $types)) {
            //Do not show apartment when looking for a home
            //$collection->where(\DB::raw("substr(taiou_kbn, ".(self::TAIOU_KBN_TYPE_5 + 1).", 1)"), "<>", 1);
            $collection->where('builder_id','<>',6);

        }
//        $collection->orderByRaw("CASE WHEN substr(taiou_kbn, 1, 1) = 1 THEN 0 else 1 END, " . $opts['orderby'] ." ".$opts['order']);
        $collection->orderByRaw("display_order_1 ASC, display_order_2 ASC");

        return $collection;
    }

    /**
     * get type builder
     * @param type $type
     * @return array
     */
    public static function getTypeData ($type)
    {
        $taiouKbnCode = '';
        $taiouKbnName = '';
        switch ($type) {
            case Builder::TYPE_HOMEMAKER:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2);
                $taiouKbnCode = self::CODE_HOMEMAKER;
                $taiouKbnName = self::CONTENT_HOMEMAKER;
                break;
            case Builder::TYPE_HOMEMAKER_AND_GROUPFC:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2, self::TAIOU_KBN_TYPE_3);
                $taiouKbnCode = self::CODE_HOMEMAKER_AND_GROUPFC;
                $taiouKbnName = self::CONTENT_HOMEMAKER_AND_GROUPFC;
                break;
            case Builder::TYPE_HOMEMAKER_AND_COMPATIBLE:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2, self::TAIOU_KBN_TYPE_4);
                $taiouKbnCode = self::CODE_HOMEMAKER_AND_COMPATIBLE;
                $taiouKbnName = self::CONTENT_HOMEMAKER_AND_COMPATIBLE;
                break;
            case Builder::TYPE_DETACHEDHOUSE:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2, self::TAIOU_KBN_TYPE_3, self::TAIOU_KBN_TYPE_4);
                $taiouKbnCode = self::CODE_DETACHEDHOUSE;
                $taiouKbnName = self::CONTENT_DETACHEDHOUSE;
                break;
            case Builder::TYPE_APARTMENT:
                $ptype = array(self::TAIOU_KBN_TYPE_5);
                $taiouKbnCode = self::CODE_APARTMENT;
                $taiouKbnName = self::CONTENT_APARTMENT;
                break;
            case Builder::TYPE_APARTMENT_ALL_06:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2, self::TAIOU_KBN_TYPE_5);
                $taiouKbnCode = self::CODE_APARTMENT_ALL_06;
                $taiouKbnName = self::CONTENT_APARTMENT_ALL_06;
                break;
            case Builder::TYPE_APARTMENT_ALL_07:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2, self::TAIOU_KBN_TYPE_3, self::TAIOU_KBN_TYPE_5);
                $taiouKbnCode = self::CODE_APARTMENT_ALL_07;
                $taiouKbnName = self::CONTENT_APARTMENT_ALL_07;
                break;
            case Builder::TYPE_APARTMENT_ALL_08:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2, self::TAIOU_KBN_TYPE_4, self::TAIOU_KBN_TYPE_5);
                $taiouKbnCode = self::CODE_APARTMENT_ALL_08;
                $taiouKbnName = self::CONTENT_APARTMENT_ALL_08;
                break;
            case Builder::TYPE_APARTMENT_ALL_09:
                $ptype = array(self::TAIOU_KBN_TYPE_1, self::TAIOU_KBN_TYPE_2, self::TAIOU_KBN_TYPE_3, self::TAIOU_KBN_TYPE_4, self::TAIOU_KBN_TYPE_5);
                $taiouKbnCode = self::CODE_APARTMENT_ALL_09;
                $taiouKbnName = self::CONTENT_APARTMENT_ALL_09;
                break;
            default:
                $ptype = array(self::TAIOU_KBN_TYPE_6);
                $taiouKbnCode = '';
                $taiouKbnName = '';
                break;
        }

        return [
            'type' => $ptype,
            'taiouKbn' => [
                'code' => $taiouKbnCode,
                'name' => $taiouKbnName
            ]
        ];
    }
}
