<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SyoutaiKanri extends Model
{
    const LIMIT_RELEASE = 5;
    const AUTO_COUNT = 1 ;

	/**
	 *
	 * @var string
	 */
	protected $table = 'm_syoutai_kanri';

	/**
	 *
	 * @var string
	 */
	protected $primaryKey = 'knr_user_id';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'knr_user_id',
    	'syoutai_start_ymd',
    	'syoutai_end_ymd',
    	'syoutai_cnt',
    	'syoutai_lmt_cnt',
    	'upd_date',
    	'patch_id'

    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * { var_description }
     *
     * @var bool
     */

    public $incrementing = false;

    /**
     * update date time update user
     *
     * @param array  $options  The options
     */
    public function save(array $options = array())
    {
        $this->upd_date = Carbon::now()->format('Y-m-d H:i:s');
        return parent::save($options);
    }

}
