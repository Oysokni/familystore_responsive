<?php

namespace App\Models;

use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Helpers\HelperFunc;
use App\Helpers\ViewConst;

class Reform extends BaseModel
{
    protected $table = 't_reform_req';

    protected $primaryKey = 'reform_id';

    public $timestamps = false;

    protected $dates = ['upd_date', 'regis_date'];

    /**
     * befor save data
     * @param array $options
     */
    public function save(array $options = array())
    {
        $this->upd_date = Carbon::now()->format('Y-m-d H:i:s');
        parent::save($options);
    }

    /*
     * get list data
     */

    public static function getData($args = [])
    {
        $opts = [
            'fields' => ['reform.*'],
            'orderby' => 'reform.upd_date',
            'order' => 'desc',
            'user_id' => Auth::id(),
            'req_form_status' => [],
            'join_product' => false,
            'join_category' => false,
            'join_sub_category' => false,
            'include' => [],
            'include_rn' => [],
            'first' => false,
            'filters' => [],
            'per_page' => self::PER_PAGE,
            'page' => 1,
            'group_by' => null,
        ];

        $opts = array_merge($opts, $args);

        $collection = self::select($opts['fields'])
                ->from(self::getTableName() . ' as reform');

        if ($opts['user_id']) {
            $collection->where('knr_user_id', $opts['user_id']);
        }
        //join product (taisyo_syohin)
        if ($opts['join_product']) {
            $tblProduct = TaisyoSyohin::getTableName();
            $collection->join($tblProduct . ' as prod', 'reform.syouhin_plan_id', '=', 'prod.syouhin_plan_id');
        }
        //join category
        if ($opts['join_category']) {
            $tblCategory = SyohinCategory::getTableName();
            $collection->join($tblCategory . ' as cat', 'reform.category_cd', '=', 'cat.category_cd');
        }
        //join sub category
        if ($opts['join_sub_category']) {
            $tblSubCategory = SubSyohinCategory::getTableName();
            $collection->join($tblSubCategory . ' as subcat', 'reform.subcategory_cd', '=', 'subcat.subcategory_cd');
        }
        //check status
        if ($opts['req_form_status']) {
            $collection->whereIn('req_form_status', $opts['req_form_status']);
        }
        //check include ids
        if ($opts['include']) {
            $collection->whereIn('reform_id', $opts['include']);
        }
        if ($opts['include_rn']) {
            $collection->whereIn('reform.reform_no', $opts['include_rn']);
        }
        if ($opts['group_by']) {
            $collection->groupBy($opts['group_by']);
        }

        //filter data
        if ($opts['filters']) {
            self::filterData($collection, $opts['filters']);
        }
        //order
        if (self::isInFillable($opts['orderby'])) {
            $collection->orderBy($opts['orderby'], $opts['order']);
        }
        if ($opts['first']) {
            return $collection->first();
        }
        //paginate
        if ($opts['per_page'] > -1) {
            return $collection->paginate($opts['per_page']);
        }
        return $collection->get();

    }

    public static function getBatchReform ()
    {
        $collection = self::select('regis_date, upd_date');
        //order
        $collection->orderBy('upd_date', 'desc')
                ->groupBy('reform_no');

        //paginate
        $collection->paginate(self::PER_PAGE);

        return $collection->get();
    }
    /**
     * get reform status
     * @return string
     */
    public function getStatusLabel()
    {
        $statuses = HelperFunc::listReformStatuses();
        if (isset($statuses[$this->req_form_status])) {
            return $statuses[$this->req_form_status];
        }
        return null;
    }

    /**
     * get kibo date label
     * @return string
     */
    public function getKiboDateLabel()
    {
        $kiboDates = HelperFunc::listKiboDates();
        if (!$this->kibo_date) {
            return null;
        }
        if (isset($kiboDates[$this->kibo_date])) {
            return $kiboDates[$this->kibo_date];
        }
        return null;
    }

    /**
     * get syouhin plan
     * @return type
     */
    public function syohinPlan() {
        return $this->belongsTo('\App\Models\TaisyoSyohin', 'syouhin_plan_id', 'syouhin_plan_id');
    }

    /**
     * get list syohin plan by reform ids, statuses
     * @param type $reformIds
     * @param type $status
     * @return type
     */
    public static function getListSyohinPlans($reformNo, $status = [])
    {
        return self::getData([
            'fields' => [
                'reform.reform_id',
                'prod.syouhin_mei', 'prod.plan_mei', 'prod.syouhin_logo_filen', 'prod.plan_image_filen',
                'prod.syouhin_toroku_kbn', 'prod.kakakuhyouji_kbn', 'prod.syouhin_plan_id',
                'cat.category_mei', 'reform.enavi_mitsu_cd4', 'reform.enavi_mitsu_cd3',
                'reform.kento_plan_id','reform.kento_plan_no'
            ],
            'per_page' => -1,
            'req_form_status' => $status,
            'include_rn' => [$reformNo],
            'join_product' => true,
            'join_category' => true,
        ]);
    }

    public static function getListSyohinPlansByReformNUmber($reformNo, $status = [])
    {
        $collection = self::select('*');
        //order
        $collection->orderBy('upd_date', 'desc');

        return $collection->get();
    }
    /**
     *
     * @param type $reformBui
     * @return type
     */
    public static function getListCategories($reformBui)
    {
        $arrayCats = str_split($reformBui);
        $cats = array();
        for($i = 0; $i < ViewConst::CATEGORY_MAX_SIZE; $i++) {
            if (isset($arrayCats[$i]) && $arrayCats[$i]) {
                if ($i < 10) {
                    $key = "00" . $i + 1;
                } elseif ($i >= 10 && $i < 100) {
                    $key = "0" . $i + 1;
                }
                $cats[] = SyohinCategory::where('category_cd', $key)->pluck('category_mei')->toArray();
            }
        }

        $catNames = array();
        foreach($cats as $cat) {
            if (isset($cat[0])) {
                $catNames[] = $cat[0];
            }
        }

        return implode("、", $catNames);
    }

    /**
     * render category name by reform bui
     * @param type $reformBui
     * @param type $categories
     * @return string
     */
    public static function renderNameByReformBui($reformBui, $categories = null)
    {
        if (!$categories) {
            $categories = SyohinCategory::getListReformBui('id');
        }
        if ($categories->isEmpty()) {
            return null;
        }
        $results = [];
        $arrReformBui = str_split($reformBui);
        $lastCat = $categories->last();
        if (intval($lastCat->id) > ViewConst::CATEGORY_MAX_SIZE) {
            unset($categories[$categories->count() - 1]);
            $categories[ViewConst::CATEGORY_MAX_SIZE - 1] = $lastCat;
        }
        for ($i = 0; $i < ViewConst::CATEGORY_MAX_SIZE; $i++) {
            if (isset($categories[$i]) && isset($arrReformBui[$i]) && $arrReformBui[$i] == '1') {
                $results[] = $categories[$i]->name;
            }
        }
        return implode('、', $results);
    }
}

