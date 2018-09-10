<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\ViewErrorBag;
use App\Helpers\ViewConst;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class HelperFunc
{

    /*
     * special char validate
     */
    const SPEC_CHAR = '\!\$%&\'\(\)\-\*\+\,\/;<\=>\?\[\]^\{\}\~';

    /**
     * get error field
     * @param type $field
     * @return string
     */
    public static function errorField($field, $errors = null)
    {
        if (!$errors) {
            $errors = Session::get('errors');
        }
        if ($errors) {
            if ($errors instanceof ViewErrorBag && $message = $errors->first($field)) {
                return '<div class="error-mess">'. $message .'</div>';
            }
        }
        return null;
    }

    /**
     * make unique random string code
     * @param class $model
     * @param string $field
     * @param integer $length
     * @return string
     */
    public static function makeUniqueCode($model, $field = 'guid', $length = 36)
    {
        $code = str_random($length);
        $isExists = $model::where($field, $code)
                ->first();
        if ($isExists) {
            $code = self::makeUniqueCode($model, $field, $length);
        }
        return $code;
    }

    /*
     * list type buildings
     */
    public static function typeBuildings()
    {
        return [
            ViewConst::TYPE_BUILDING_HOUSE => '戸建',
            ViewConst::TYPE_BUILDING_APARTMENT => 'マンション',
            ViewConst::TYPE_BUILDING_OTHER => 'その他'
        ];
    }

    /**
     * get image src
     * @param string $path
     * @param string $size
     * @return string
     */
    public static function getImageSrc($path, $size = 'full', $default = false)
    {
        $uploadDir = config('image.upload_dir');
        $imageSizes = config('image.sizes');
        if (!in_array($size, $imageSizes)) {
            $size = 'full';
        }
        $filePath = trim($uploadDir, '/') . '/' . $size . '/' . trim($path, '/');
        if (Storage::exists($filePath)) {
            return Storage::url($filePath);
        }
        if ($default) {
            return '/images/noimage.png';
        }
        return null;
    }

    /**
     * render cart price plan
     * @param type $product
     * @return string
     */
    public static function cartPlanPriceHtml($product, $user = null)
    {
        $memberType = $user!= null ? $user->memberType() : Auth::user()->memberType();
        $planPrices = ViewConst::TEMP_PLANS_PRICE;
        $firstPrice = '';
        $priceChange = '';
        if (isset($planPrices[$product->syouhin_plan_id])) {
            $arrPrices = $planPrices[$product->syouhin_plan_id];
            $firstPrice = number_format($arrPrices[0] * 1000, 0, '.', ',') . '円';
            $priceChange = $arrPrices[1] * 1000;
            if ($memberType == ViewConst::USER_TYPE_FAMILY) {
                $priceChange = $arrPrices[2] * 1000;
            }
            $priceChange = number_format($priceChange, 0, '.', ',') . '円';
        }

        $priceFormat = '';
        if ($priceChange) {
            switch ($product->kakakuhyouji_kbn) {
                case ViewConst::TYPE_SHOW_PRICE_BEFORE:
                    $priceFormat = $priceChange . '～（工事費込、税別 ）';
                    break;
                case ViewConst::TYPE_NOT_SHOW_PRICE_AFTER:
                    $priceFormat = $priceChange;
                    break;
                case ViewConst::TYPE_SHOW_PRICE_TEXT:
                    $priceFormat = '打ち合わせ後ショップから見積が提出されます。';
                    break;
                default:
                    $priceFormat = '';
                    break;
            }
        }

        return $priceFormat;
    }

    /**
     * render plan number
     * @param type $product
     * @return string
     */
    public static function getPlanNumberHtml($product)
    {
        $planNumber = '';
        $memberType = Auth::user()->memberType();
        if ($memberType == ViewConst::USER_TYPE_FAMILY) {
            $planNumber = $product->kengine_plan_cd2;
        } else {
            $planNumber = $product->kengine_plan_cd1;
        }

        return 'K' . $planNumber;
    }
    /*
     * list contact methods
     */
    public static function listContactMethods()
    {
        return [
            ViewConst::CONTACT_METHOD_EMAIL => 'メール',
            ViewConst::CONTACT_METHOD_PHONE => '電話',
            ViewConst::CONTACT_METHOD_VISIT => '訪問'
        ];
    }

    /*
     * list reform locate
     */
    public static function listLocationsReform()
    {
        return [
            ViewConst::REFORM_LOCATE_HOME => '自宅 （現住所）',
            ViewConst::REFORM_LOCATE_HOME_MOVE => '引越先自宅',
            ViewConst::REFORM_LOCATE_MASION => '本人所有別荘等 （本人所有、別住所含む）※'
        ];
    }

    /*
     * list reform yosan
     */
    public static function listReformYosans()
    {
        return [
            '00' => '未定',
            '01' => '20万円未満',
            '02' => '20万円～50万円',
            '03' => '50万円～100万円',
            '04' => '100万円～200万円',
            '05' => '200万円～300万円',
            '06' => '300万円～400万円',
            '07' => '400万円～500万円',
            '08' => '500万円以上'

        ];
    }


    /*
     * list builder yosan
     */
    public static function listBuilderYosans()
    {
        return [
            '00' => '未定',
            '01' => '～1000万円',
            '02' => '1000万円～2000万円',
            '03' => '2000万円～3000万円',
            '04' => '3000万円～3500万円',
            '05' => '3500万円～4000万円',
            '06' => '4000万円～4500万円',
            '07' => '4500万円～5000万円',
            '08' => '5000万円～'
        ];
    }

    public static function listTiknensus()
    {
        return [
            '01' => '1年～10年',
            '02' => '11年～20年',
            '03' => '21年～30年',
            '04' => '31年以上'
        ];
    }
    /*
     * trim shorter string
     */
    public static function trimWords($text, $limit = 8, $more = '...')
    {
        $textLen = mb_strlen($text, 'utf8');
        if ($textLen > $limit) {
            $text = mb_substr($text, 0, $limit, 'utf8') . $more;
        }
        return $text;
    }

    /*
     * list reform status
     */
    public static function listReformStatuses()
    {
        return [
            ViewConst::REFORM_STT_RESEARCHING => '検討中',
            ViewConst::REFORM_STT_CREATING => '申込フォーム作成',
            ViewConst::REFORM_STT_REGISTED => '申込済み',
            ViewConst::REFORM_STT_RECEIVED => '受付済み',
            ViewConst::REFORM_STT_DISCUSSION => '商談中',
            ViewConst::REFORM_STT_PUBLISH => '見積提示済み',
            ViewConst::REFORM_STT_SIGNED => '成約済',
            ViewConst::REFORM_STT_DELIVERIED => '引渡し済み',
            ViewConst::REFORM_STT_COMPLETE => '完了',
            ViewConst::REFORM_STT_LOSTED => '失注',
            ViewConst::REFORM_STT_CANCEL => '破棄'
        ];
    }

    /**
     * render link order
     * @param type $orderBy
     * @param type $route
     * @return string
     */
    public static function linkOrder($orderBy, $route = null)
    {
        $request = request();
        if (!$route) {
            $route = $request->route()->getName();
        }
        $order = 'asc';
        $iconClass = 'arrow_sort';
        $reqOrder = $request->get('order');
        $reqOrderBy = $request->get('orderby');

        if ($reqOrder && $reqOrderBy && $reqOrderBy == $orderBy) {
            if ($reqOrder === 'asc') {
                $iconClass = 'arrow_drop_down';
                $order = 'desc';
            } else {
                $iconClass = 'arrow_drop_up';
                $order = 'asc';
            }
        }
        $args = array_merge($request->all(), ['orderby' => $orderBy, 'order' => $order]);

        return '<a href="'. route($route, $args) .'" class="link-order"><i class="'. $iconClass .'"></i></a>';
    }

    /*
     * list array kibo date
     */
    public static function listKiboDates()
    {
        return [
            '01' => 'すぐに',
            '02' => '1～3ヶ月',
            '03' => '4～6ヶ月',
            '04' => '7～9ヶ月'
        ];
    }

    /*
     * list array builder syoukai
     */
    public static function listBuilderSyoukais()
    {
        return [
            ViewConst::BUILDER_SYOUKAI_SELF =>  '本人',
            '02' =>                             '家族',
            '03' =>                             '親戚',
            '04' =>                             '知人',
            '05' =>                             '法人取引先',
            '06' =>                             'その他'
        ];
    }

    /*
     * list array builder anken
     */
    public static function listBuilderAnkens()
    {
        return [
            '01' => '新築',
            '02' => '建替え',
            '03' => '分譲',
            '04' => 'マンション',
            '05' => 'その他'
        ];
    }

    /*
     * list array builder renraku
     */
    public static function listBuilderSeshuRenrakus()
    {
        return [
            '01' => '住宅会社からお施主様に連絡可',
            '02' => 'LIXILから一度ご紹介者様にご連絡した後、住宅会社から連絡可',
            '03' => 'LIXILからお施主様に連絡可'
        ];
    }

    /*
     * custom show user ID
     */
    public static function showUserId($user = null)
    {
        if (!$user) {
            $user = auth()->user();
        }
        if (!$user) {
            return null;
        }
        $memberType = $user->memberType();
        if ($memberType == ViewConst::USER_TYPE_FAMILY) {
            return 'ファミリー会員/' . $user->knr_user_id;
        }
        return 'LIXIL会員/' . $user->knr_user_id;
    }


    /*
     * convert hatfwith to fullwith
     */
    public static function convertKana($string)
    {
        mb_language("Ja");
        mb_internal_encoding("utf-8");

        return mb_convert_kana($string, "ASK");

    }

    /**
     * Format phone number
     *
     * @param string $phone
     * @return string
     */
    public static function formatPhoneNumber($phone)
    {
        $numberPhone = '';

        if (substr($phone, 0, 2) == '03') {
            $firstNumber = '03';
            $secondNumber = strlen($phone) >= 3 ? substr($phone, 2, 4) : '';
            $thirdNumber = substr($phone, 6) ? substr($phone, 6) : '';
        } elseif (strlen($phone) > 3) {
            $firstNumber = substr($phone, 0, 3);
            $secondNumber = strlen($phone) >= 4 ? substr($phone, 3, 4) : '';
            $thirdNumber = substr($phone, 7) ? substr($phone, 7) : '';
        } else {
            return $phone;
        }

        if ($firstNumber != '') {
            $numberPhone = $firstNumber;
        }

        if ($secondNumber != '') {
            $numberPhone .= '-' . $secondNumber;
        }

        if ($thirdNumber != '') {
            $numberPhone .= '-' . $thirdNumber;
        }

        return $numberPhone;
    }
    
    /**
     * make unique random number code
     * @param class $model
     * @param string $field
     * @param integer $length
     * @param  string $key = R or S
     * @return string
     */
    
    public static function makeUniqueCodeNumber($model, $field = 'kento_plan_id', $length = 14,$key='')
    {
        $chars = "0123456789";
        $size = strlen($chars);
        $code = '';
        for( $i = 0; $i < $length; $i++ ) {
            $code .= $chars[rand(0,$size - 1)];

         }
        
        $isExists = $model::where($field, $key.$code)
                ->first();
        if ($isExists) {
            $code = self::makeUniqueCode($model, $field, $length);
        }
        return $key.$code;
    }
    
    
       
    /**
     * make unique random string code
     * @param class $model
     * @param string $field
     * @param integer $length
     * @return string
     */
    public static function checkIdUserUnique($model, $field = 'knr_user_id',$id='')
    {
        $isExists =  $model::where($field,$id)->get()->toArray();
        
        if (!empty($isExists)) {
           $num = substr($id,-1,1);
           $id = substr($id,0,16);
           $num = $num +1;
           $id = $id.$num;
           $id = self::checkIdUserUnique($model, $field,$id);
        }
        return $id;
    }
}

