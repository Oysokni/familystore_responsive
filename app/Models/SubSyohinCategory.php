<?php

namespace App\Models;

use App\Models\BaseModel;

class SubSyohinCategory extends BaseModel
{
    //
    
    /**
     * @var string
     */
    protected $table = 'm_sub_syohin_category';

    /**
     * @var string
     */
    protected $primaryKey = 'subcategory_cd';

    /**
     * @var array
     */
    protected $fillable = [
        'subcategory_cd',
        'category_cd',
        'subcategory_mei',
        'display_order',
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
}
