<?php

namespace App\Models;

use App\Models\BaseModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Notify extends BaseModel 
{
    
    const TYPE_COMMON = 1;
    const TYPE_EMP = 2;
    const TYPE_FAMILY = 3;
    const TYPE_LOGIN = 4;
    
    protected $table = 'm_osirase';
    protected $primaryKey = 'osirase_id';
    public $incrementing = false;
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
            'type' => [],
            'per_page' => self::PER_PAGE,
            'page' => 1
        ];
        
        $opts = array_merge($opts, $args);
        
        $collection = self::select($opts['fields']);
        if ($opts['type']) {
            if (!is_array($opts['type'])) {
                $args['type'] = [$opts['type']];
            }
            $collection->whereIn('syanaigai_kbn', $opts['type']);
        }
        //check in time show notify
        $timeNow = Carbon::now()->toDateString();
        $collection->where('osirase_start_ymd', '<=', $timeNow)
                ->where(function ($query) use ($timeNow) {
                    $query->whereNull('osirase_end_ymd')
                            ->orWhere('osirase_end_ymd', '>=', $timeNow);
                });
                
        $collection->orderBy($opts['orderby'], $opts['order']);
        if ($opts['per_page'] > -1) {
            return $collection->paginate($opts['per_page']);
        }
        return $collection->get();
    }
    
    /**
     * update time update
     * @param array $options
     */
    public function save(array $options = array()) 
    {
        $this->upd_date = Carbon::now()->format('Y-m-d H:i:s');
        return parent::save($options);
    }
    
    /**
     * get available notify type of current user
     * @return array
     */
    public static function loggedUserNotifyType()
    {
        //get current user
        $user = Auth::user();
        if (!$user) {
            return [];
        }
        //get user type
        $userType = $user->memberType();
        $types = [];
        switch ($userType) {
            case User::TYPE_FAMILY:
                $types[] = self::TYPE_FAMILY;
                break;
            case User::TYPE_LIME_SPECIAL:
            case User::TYPE_LIME_NORMAL:
                $types[] = self::TYPE_EMP;
                break;
            default :
                break;
        }
        $types[] = self::TYPE_COMMON;
        return $types;
    }
    
}

