<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Password extends Model
{

    protected $table = 'm_password';

    protected $primaryKey = 'knr_user_id';

    public $timestamps = false;
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'knr_user_id', 'pwd', 'zen_pwd', 'login_fail_cnt', 'guid', 'pwd_upd_date', 'upd_date',
    ];

    /**
     * @param string $value
     */
    public function setPwdAttribute($value)
    {
        $this->attributes['pwd'] = Hash::make($value);
    }

    /**
     * increment login fail count
     */
    public function incrementLoginFail()
    {
        $count = intval($this->login_fail_cnt);
        $this->upd_date = Carbon::now()->format('Y-m-d H:i:s');
        $this->login_fail_cnt = $count + 1;
        $this->save();
    }

    /**
     * get user
     */
    public function user()
    {
        return $this->hasOne('\App\Models\User', 'knr_user_id', 'knr_user_id');
    }

}
