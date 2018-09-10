<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * class Syoutai
 * 
 * @package App\Models
 * @property string $knr_user_id
 * @property string $syoutai_mail
 * @property string $syoutai_cd
 * @property string $kankei_flg
 * @property string $syoutai_sei
 * @property string $syoutai_mei
 * @property string $syoutai_cd_gen_ymd
 * @property string $syoutai_cd_lmt_ymd
 * @property string $syoutai_mail_status
 * @property string $syoutai_regis_ymd
 * @property string $upd_date
 * @property string $patch_id
 */
/**
 * status send mail Release code invite 
 */


class Syoutai extends Model
{
    
    const STATUS_SEND_MAIL = '00';
    const STATUS_SEND_MAIL_ERROR = '99';
    const STATUS_SEND_MAIL_SUCCESS = '01';
    
    /**
     * 
     * @var        string
     */

    protected $table ='t_syoutai';

    /**
     * 
     *
     * @var        string
     */
    protected $primarykey = 'knr_user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'knr_user_id',
        'syoutai_mail',
        'syoutai_cd',
        'kankei_flg',
        'syoutai_sei',
        'syoutai_mei',
        'syoutai_cd_gen_ymd',
        'syoutai_cd_lmt_ymd',
        'syoutai_mail_status',
        'syoutai_regis_ymd',
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
     * @var        boolean
     */

    public $incrementing = false;

   
    

}
