<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\TaisyoSyohin;
use App\Models\SyohinCategory;
use App\Models\SubSyohinCategory;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

/**
 * @property knr_user_id
 * @property kento_plan_id
 * @property syouhin_category_cd
 * @property subcategory_cd
 * @property syouhin_plan_id
 * @property syahan_kakeritsu
 * @property reform_cost_10_1
 * @property reform_cost_20
 * @property reform_cost_30
 * @property reform_cost_90
 * @property kengine_plan_cd1
 * @property kengine_plan_cd2
 * @property kengine_plan_cd3
 * @property enavi_mitsu_cd1
 * @property enavi_mitsu_cd2
 * @property enavi_mitsu_cd3
 * @property enavi_mitsu_cd4
 * @property gencyo_k_date_1
 * @property gencyo_k_date_2
 * @property gencyo_k_date_3
 * @property kouji_k_date_1
 * @property kouji_k_date_2
 * @property kouji_k_date_3
 * @property plan_regis_date
 * @property plan_upd_date
 * @property upd_date
 * @property patch_id
 */
class Shopping extends BaseModel
{
    // Status of the registration form
    const STATUS_RESEARCHING = '00';
    const STATUS_CREATETING_FORM = '01';
    const STATUS_REGISTED = '02';

    /**
     * @var string
     */
    protected $table = 't_shopping';

    /**
     * @var string
     */
    protected $primaryKey = 'shopping_id';

    /**
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * @var array
     */
     protected $fillable = [
        'shopping_id',
        'knr_user_id',
        'kento_plan_id',
        'category_cd',
        'subcategory_cd',
        'syouhin_plan_id',
        'syahan_kakeritsu',
        'reform_cost_10_1',
        'reform_cost_20',
        'reform_cost_30',
        'reform_cost_90',
        'kengine_plan_cd1',
        'kengine_plan_cd2',
        'kengine_plan_cd3',
        'enavi_mitsu_cd1',
        'enavi_mitsu_cd2',
        'enavi_mitsu_cd3',
        'enavi_mitsu_cd4',
        'gencyo_k_date_1',
        'gencyo_k_date_2',
        'gencyo_k_date_3',
        'kouji_k_date_1',
        'kouji_k_date_2',
        'kouji_k_date_3',
        'req_form_status',
        'plan_regis_date',
        'plan_upd_date',
        'upd_date',
        'patch_id'
    ];

    /**
     * @var array
     */
    protected $dates = ['plan_regis_date', 'upd_date', 'plan_upd_date'];

    /**
     * Get information of a product in the shopping cart by user
     *
     * @param string $userId
     * @param array $arg
     * @return Shopping $product
     */
    public static function productByUser($userId, $arg = [])
    {
        $queries = static::where('knr_user_id', $userId);

        // Add condition on category_cd
        if (isset($arg['category_cd'])) {
            $queries->where('category_cd', $arg['category_cd']);
        }

        // Add condition on category_cd
        if (isset($arg['subcategory_cd'])) {
            $queries->where('subcategory_cd', $arg['subcategory_cd']);
        }

        // Add condition on syouhin_plan_id
        if (isset($arg['syouhin_plan_id'])) {
            $queries->where('syouhin_plan_id', $arg['syouhin_plan_id']);
        }


        $queries->where(function ($query) {
            $query->where('req_form_status', static::STATUS_RESEARCHING)
                ->orWhere('req_form_status', static::STATUS_CREATETING_FORM);
        });

        // Get data
        $product = $queries->first();

        return $product;
    }

    /**
     * get general data
     * @param array $args
     * @return collection
     */
    public static function getData($args = [])
    {
        $opts = [
            'fields' => ['shopping.*'],
            'orderby' => 'upd_date',
            'order' => 'desc',
            'user_id' => Auth::id(),
            'req_form_status' => [],
            'join_product' => true,
            'join_category' => true,
            'join_sub_category' => true,
            'filters' => [],
            'per_page' => -1,
            'page' => 1
        ];

        $opts = array_merge($opts, $args);
        $collection = self::select($opts['fields'])
                ->from(self::getTableName() . ' as shopping');

        if ($opts['user_id']) {
            $collection->where('knr_user_id', $opts['user_id']);
        }
        //join product (taisyo_syohin)
        if ($opts['join_product']) {
            $tblProduct = TaisyoSyohin::getTableName();
            $collection->join($tblProduct . ' as prod', 'shopping.syouhin_plan_id', '=', 'prod.syouhin_plan_id');
        }
        //join category
        if ($opts['join_category']) {
            $tblCategory = SyohinCategory::getTableName();
            $collection->join($tblCategory . ' as cat', 'shopping.category_cd', '=', 'cat.category_cd');
        }
        //join sub category
        if ($opts['join_sub_category']) {
            $tblSubCategory = SubSyohinCategory::getTableName();
            $collection->join($tblSubCategory . ' as subcat', 'shopping.subcategory_cd', '=', 'subcat.subcategory_cd');
        }
        //check status
        if ($opts['req_form_status']) {
            $collection->whereIn('req_form_status', $opts['req_form_status']);
        }
        //filter data
        if ($opts['filters']) {
            self::filterData($collection, $opts['filters']);
        }
        //paginate
        if ($opts['per_page'] > -1) {
            return $collection->paginate($opts['per_page']);
        }
        return $collection->get();

    }

    //get list product/plan of current user
    public static function currentUserCreatingForms()
    {
        return self::getData([
            'fields' => [
                'shopping.*',
                'prod.syouhin_mei', 'prod.plan_mei', 'prod.syouhin_logo_filen', 'prod.plan_image_filen',
                'prod.syouhin_toroku_kbn', 'prod.kakakuhyouji_kbn',
                'cat.category_mei',
                'subcat.subcategory_mei'
            ],
            'req_form_status' => [Shopping::STATUS_CREATETING_FORM]
        ]);
    }

    /*
     * update date before save data
     */
    public function save(array $options = array()) {
        $this->upd_date = Carbon::now()->format('Y-m-d H:i:s');
        return parent::save($options);
    }

}
