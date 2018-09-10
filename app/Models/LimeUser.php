<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LimeUser
 *
 * @package App\Models
 * @property string $global_id
 * @property string $shain_no
 * @property string $e_mail
 * @property string $user_id
 * @property string $name_sei
 * @property string $name_mei
 * @property string $kana_sei
 * @property string $kana_mei
 * @property string $name_sei_dsp
 * @property string $name_mei_dsp
 * @property string $kana_sei_dsp
 * @property string $kana_mei_dsp
 * @property string $emp_cd
 * @property string $title_cd
 * @property char $company_cd
 * @property string $company_name
 * @property string $n_tel
 * @property string $g_tel
 * @property string $mobile_tel
 * @property date $begin_date
 * @property date $end_date
 */
class LimeUser extends Model
{
    /**
     * @var string
     */
    protected $table = 'm_lime_user';

    /**
     * @var string
     */
    protected $primaryKey = 'global_id';

    /**
     * @var array
     */
    protected $fillable = [
        'global_id',
        'shain_no',
        'e_mail',
        'user_id',
        'name_sei',
        'name_mei',
        'kana_sei',
        'kana_mei',
        'name_sei_dsp',
        'name_mei_dsp',
        'kana_sei_dsp',
        'kana_mei_dsp',
        'emp_cd',
        'title_cd',
        'company_cd',
        'company_name',
        'n_tel',
        'g_tel',
        'mobile_tel',
        'begin_date',
        'end_date',
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

}
