<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class Faq extends BaseModel
{
    const PER_PAGE = 30;
    
    const TYPE_COMMON_FAQ = 1;
    const TYPE_REFORM_FAQ = 2;
    const TYPE_BUILDER_FAQ = 3;
    
    const TYPE_COMMON_USER = 1;
    const TYPE_MEMBER_USER = 2;
    const TYPE_FAMILY_USER = 3;

    protected $table = 'm_faskq';
    protected $primaryKey = 'faskq_id';

    protected $fillable = [
            'faskq_id',
            'syanaigai_kbn',
            'faq_taisyou_kbn',
            'faq_start_ymd',
            'faq_end_ymd',
            'ask_bunrui',
            'ask_message',
            'ques_message',
            'regis_date',
            'regis_user_acct_cd',
            'regis_terminal_ip_addr',
            'upd_pgm_cd',
            'upd_date',
            'patch_id'
    ];

    
    /**
     * get list items
     * @param type $args
     * @return type
     */
    public static function getData($args = []) 
    {
        $opts = [
            'fields' => ['*'],
            'orderby' => 'upd_date',
            'order' => 'desc',
            'type' => [],
            'faq_type' => [],
            'per_page' => self::PER_PAGE,
            'page' => 1
        ];
        
        $opts = array_merge($opts, $args);
        
        $collection = self::select('*');
        if ($opts['type']) {
            $collection->whereIn('syanaigai_kbn', $opts['type']);
        }
        
        if ($opts['faq_type']) {
            $collection->whereIn('faq_taisyou_kbn', $opts['faq_type']);
        }
        
        $timeNow = Carbon::now()->toDateString();
        $collection->where('faq_start_ymd', '<=', $timeNow)
                ->where(function ($query) use ($timeNow) {
                    $query->whereNull('faq_end_ymd')
                            ->orWhere('faq_end_ymd', '>=', $timeNow);
                });
        
        $collection->orderBy('faq_taisyou_kbn');
        return $collection->get()->toArray();
    }

    public static function getFaqType($faqType) 
    {
        //get current user
        $user = Auth::user();
        if (!$user) {
            return [];
        }
        //get user type
        $userType = Faq::getMemberType($user->knr_user_id);
        $types = array();
        $types[] = self::TYPE_COMMON_USER;
        $types[] = $userType;
        $fagTypes = array();
        $fagTypes[] = self::TYPE_COMMON_FAQ;
        $fagTypes[] = intval($faqType);
        return [
            'type' => $types,
            'faq_type' => $fagTypes
        ];
    }
    
    public static function getMemberType($userId)
    {
        $firstChar = substr($userId, 0, 1);
        if ($firstChar == User::CH_LIME) {
            return self::TYPE_MEMBER_USER;
        }
        return self::TYPE_FAMILY_USER;
    }
}
