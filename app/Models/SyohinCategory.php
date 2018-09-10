<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\DB;

class SyohinCategory extends BaseModel
{
    /**
     * @var string
     */
    protected $table = 'm_syohin_category';

    /**
     * @var string
     */
    protected $primaryKey = 'category_cd';

    /**
     * @var array
     */
    protected $fillable = [
        'category_cd',
        'category_mei',
        'display_order',
        'category_logo_filen',
        'product_process',
        'upd_date',
        'patch_id',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * get Syohin categories
     */
    public function subSyohinCategories() 
    {
        return $this->hasMany('\App\Models\SubSyohinCategory', 'category_cd', 'category_cd');
    }
    
    /**
     * get list data
     * @param array $data
     * @return collection
     */
    public static function getData($data = []) 
    {
        $opts = [
            'fields' => ['scat.*'],
            'loading' => 'lazy',
            'orderby' => 'display_order * 1',
            'order' => 'asc',
            'per_page' => self::PER_PAGE,
            'page' => 1
        ];

        $opts = array_merge($opts, $data);
        
        $collection = self::select($opts['fields'])
                    ->from(self::getTableName() . ' as scat');
        if ($opts['loading'] == 'lazy') {
            $collection->groupBy('scat.category_cd')
                    ->whereNotNull('display_order')
                    ->whereNotNull('category_logo_filen');

            $tblTaisyoSyohin = TaisyoSyohin::getTableName();
            $collection->join($tblTaisyoSyohin . ' as taisyoSyohin', 'taisyoSyohin.category_cd', '=', 'scat.category_cd');
        }
        
        $collection->orderBy(DB::raw($opts['orderby']), $opts['order']);
        
        if ($opts['per_page'] > -1) {
            return $collection->paginate($opts['per_page']);
        }

        return $collection->get();
    }

    /**
     * get sub Syohin categories by Syohin category id
     * @param type $catId
     * @return collection
     */
    public static function getAllSubSyohinCategories($syohinCategory)
    {
        $collection = self::select('subSyohinCategory.*')
                ->from(self::getTableName() . ' as syohinCategory')->distinct()
                ->where('syohinCategory.category_cd', $syohinCategory);

        $tblSubSyohinCategory = SubSyohinCategory::getTableName();
        $collection->join($tblSubSyohinCategory . ' as subSyohinCategory', 'subSyohinCategory.category_cd', '=', 'syohinCategory.category_cd');

        $tblTaisyoSyohin = TaisyoSyohin::getTableName();
        $collection->join($tblTaisyoSyohin . ' as taisyoSyohin', 'taisyoSyohin.subcategory_cd', '=', 'subSyohinCategory.subcategory_cd');
        
        $collection->orderBy('subSyohinCategory.display_order', 'asc');

        return $collection->get();
    }
    
    /**
     * get list category for reform bui
     * @return collection
     */
    public static function getListReformBui($orderby = 'scat.display_order')
    {
        return self::getData([
            'fields' => ['scat.category_cd as id', 'scat.category_mei as name', 'scat.display_order'],
            'per_page' => -1,
            'orderby' => $orderby . ' * 1'
        ]);
    }
}
