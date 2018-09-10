<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\Shopping;

class TaisyoSyohin extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'm_taisyo_syohin';

    /**
     * @var string
     */
    protected $primaryKey = 'syouhin_plan_id';

    /**
     * @var array
     */
    protected $fillable = [
        'category_cd',
        'subcategory_cd',
        'syouhin_plan_id',
        'syouhin_mei',
        'plan_mei',
        'setumei_bun_1',
        'setumei_bun_2',
        'syouhin_logo_filen',
        'plan_image_filen',
        'kakakuhyouji_kbn',
        'keisai_start_ymd',
        'keisai_end_ymd',
        'reform_cost_10',
        'reform_cost_11',
        'reform_cost_20',
        'reform_cost_21',
        'reform_cost_30',
        'reform_cost_31',
        'reform_cost_90',
        'link_url_1',
        'link_url_1_mei',
        'link_url_2',
        'link_url_2_mei',
        'syouhin_3D_kbn',
        'syouhin_3D_plan_cd',
        'syouhin_toroku_kbn',
        'kengine_plan_cd1',
        'kengine_plan_cd2',
        'enavi_mitsu_cd1',
        'enavi_mitsu_cd2',
        'regis_user_acct_cd',
        'regis_terminal_ip_addr',
        'upd_pgm_cd',
        'upd_date',
        'patch_id',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * get list items
     * @param type $args
     * @return collection
     */
    public static function getData($args = [])
    {
        $opts = [
            'fields' => ['*'],
            'orderby' => 'upd_date',
            'order' => 'desc',
            'knr_user_id' => null,
            'category_cd' => null,
            'subcategory_cd' => null,
            'join_category' => true,
            'join_sub_category' => true,
            'per_page' => self::PER_PAGE,
            'page' => -1
        ];

        $opts = array_merge($opts, $args);

        $collection = self::select($opts['fields'])
                ->from(self::getTableName() . ' as taisyoSyohin');
        if ($opts['category_cd']) {
            $collection->where('taisyoSyohin.category_cd', $opts['category_cd']);
        }
        if ($opts['subcategory_cd']) {
            $collection->where('taisyoSyohin.subcategory_cd', $opts['subcategory_cd']);
        }

        $listShopping = null;
        if ($opts['knr_user_id']) {
            $listShopping = Shopping::where('knr_user_id', $opts['knr_user_id']);
        }

        //join category
        if ($opts['join_category']) {
            $tblCategory = SyohinCategory::getTableName();
            $collection->join($tblCategory . ' as cat', 'taisyoSyohin.category_cd', '=', 'cat.category_cd');
            $collection->orderBy('cat.display_order', 'asc');
        }
        //join sub category
        if ($opts['join_sub_category']) {
            $tblSubCategory = SubSyohinCategory::getTableName();
            $collection->join($tblSubCategory . ' as subcat', 'taisyoSyohin.subcategory_cd', '=', 'subcat.subcategory_cd');
            $collection->orderBy('subcat.display_order', 'asc');
        }

        $shoppings = $listShopping->pluck('syouhin_plan_id')->all();
        if(!empty($shoppings)) {
            //$collection->whereNotIn('syouhin_plan_id', $shoppings);
        }

        if ($opts['per_page'] > -1) {
            return $collection->paginate($opts['per_page']);
        }

        return $collection->get();
    }
}
