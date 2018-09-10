<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /*
     * regist status
     */
    const STT_INITIALIZATION = '00';
    const STT_NOT_REGIST = '01';
    const STT_REGISTED = '02';

    /**
     * Link status
     */
    const NOT_LINKED = '00';
    const LINKED = '01';

    /*
     * login const
     */
    const MAX_ATTEMPT = 5; // max login attempt
    const TIME_EXPIRED = 60; // time expired lock apptempt (minute)
    const TIME_RESET_PWD = 24; // time expired reset password (hour)


    /*
     * Type user
     */
    const TYPE_LIME_NORMAL = 1;
    const TYPE_LIME_SPECIAL = 2;
    const TYPE_FAMILY = 3;
    const CH_LIME = 'L';
    const CH_FAMILY = 'F';
    const SPECIAL_CODE = [50, 60];

    const CODE_NEW_MEMBER = '000000';
    const CODE_NEW_MEMBER_FAMILY = '00000';
    const USER_DELETED = 1;
    const USER_DEL_FLG_DEFAULT = 0;

    const SYAHAN_KEKARITSU_LIME = 0.4;
    const SYAHAN_KEKARITSU_FAMILY = 0.5;

    const KANKEI_LIME = '00';
    const KANKEI_FAMILY = '01';

    const USER_ADMIN = 0;
    const USER_COMMONT = 1;

    const GENBA_ZYUSYO_LIME = 1;
    const GENBA_ZYUSYO_FAMILY = 0;

    const COMPANY_MEI_FAMILY = 'LFFSファミリー会員';
    
    // Validity period of temporary registration
    const DATE_LIMMIT = 7;

    /**
     *
     * @var string
     */
    protected $table = 'm_user';

    /**
     *
     * @var array
     */
    protected $fillable = [
        'knr_user_id',
        'emp_cd',
        'mail',
        'mail_2',
        'local_id',
        'admin_flg',
        'kankei_flg',
        'sei_local',
        'mei_local',
        'sei_kana',
        'mei_kana',
        'birth_ymd',
        'seibetu_kbn',
        'syahan_kakeritsu',
        'company_cd',
        'company_mei',
        'zip_no',
        'todouhuken_mei',
        'sikutyouson_mei',
        'tyoumei',
        'tat_mei',
        'idm_denwa_no',
        'idm_keitai_tel',
        'pre_regis_ymd',
        'pre_regis_lmt_ymd',
        'regis_ymd',
        'regis_lmt_ymd',
        'syokai_knr_user_id',
        'touroku_cd',
        'regis_status',
        'kengine_status',
        'enavi_status',
        'lixil_online_status',
        'renkei_status_1',
        'renkei_status_2',
        'renkei_status_3',
        'genba_zyusyo_flg',
        'del_flg',
        'last_login_date',
        'upd_date',
        'upd_user_id',
        'upd_terminal_ip_addr',
        'patch_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     *
     * @var string
     */
    protected $primaryKey = 'knr_user_id';

    /**
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * After save set value upd_date
     *
     * @param array $options
     * @return bool
     */
    public function save(array $options = array())
    {
        $this->upd_date = Carbon::now()->format('Y-m-d H:i:s');
        return parent::save($options);
    }

    /**
     * get password field
     */
    public function password()
    {
        return $this->hasOne('\App\Models\Password', 'knr_user_id', 'knr_user_id');
    }

    /**
     * get first byte of user id
     * @return type
     */
    public function getFirstByteID()
    {
        return substr($this->knr_user_id, 0, 1);
    }

    /**
     * get member type
     * @return int
     */
    public function memberType()
    {
        $firstByte = substr($this->knr_user_id, 0, 1);
        $empCd = $this->emp_cd;
        if ($firstByte == self::CH_LIME) {
            if (in_array($empCd, self::SPECIAL_CODE)) {
                return self::TYPE_LIME_SPECIAL;
            }
            return self::TYPE_LIME_NORMAL;
        }
        return self::TYPE_FAMILY;
    }

    /*****
     *  disable remember token
     *****/
    public function getRememberToken()
    {
        return null; // not supported
    }

    public function setRememberToken($value)
    {
        // not supported
    }

    public function getRememberTokenName()
    {
        return null; // not supported
    }

    /**
     * Overrides the method to ignore the remember token.
     */
    public function setAttribute($key, $value)
    {
        $isRememberTokenAttribute = $key == $this->getRememberTokenName();
        if (!$isRememberTokenAttribute)
        {
          parent::setAttribute($key, $value);
        }
    }

    /**
     * Get information by user id
     *
     * @param string $knr_user_id
     * @return mixed
     */
    public function getUserBy($knr_user_id)
    {
        return User::where('knr_user_id', $knr_user_id)->first();
    }

    /**
     * get array zip no
     * @return array
     */
    public function getArrZipNo()
    {
        $zipNos = ['', ''];
        if ($this->zip_no === null) {
            return $zipNos;
        }
        $zipNos[0] = substr($this->zip_no, 0, 3);
        $zipNos[1] = substr($this->zip_no, 3, strlen($this->zip_no ));
        return $zipNos;
    }
}
