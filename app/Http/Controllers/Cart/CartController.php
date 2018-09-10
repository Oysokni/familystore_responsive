<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Common;
use App\Models\SyohinCategory;
use App\Models\Shopping;
use App\Helpers\ViewConst;
use App\Helpers\HelperFunc;
use App\Models\Reform;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Validator;
use Auth;
use Session;
use Carbon\Carbon;
use App\Routes\Breadcrumb;
use LxMenu;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Lang;
use App\Queues\EmailQueue;

class CartController extends Controller
{
    /**
     * construct
     */
    public function __construct()
    {
        LxMenu::setActive('reform');
        Breadcrumb::add('トップページ', route('page.index'));
    }

    /**
     * view form register
     * @return type
     */
    public function formRegister()
    {
        Breadcrumb::add('リフォームストア', route('page.reform'));
        Breadcrumb::add('カート', route('cart.list.product'));
        Breadcrumb::add('お申し込み');

        $provinces = Common::listProvince();
        $categories = SyohinCategory::getListReformBui();
        $products = Shopping::currentUserCreatingForms();
        $category_ids = Session::get('category_ids');
        return view('cart.register', compact('provinces', 'categories', 'products', 'category_ids'));
    }

    /*
     * back form register with session value
     */
    public function backFormRegister()
    {
        $oldData = Session::get('registed_reform_' . md5(Auth::id()));
        return redirect()
                ->route('cart.form.register')
                ->withInput($oldData);
    }

    /**
     * confirm data input registed form
     * @param Request $request
     * @return type
     */
    public function confirmRegister(Request $request)
    {
        $currentUser = Auth::user();
        $userType = $currentUser->memberType();
        $dataValidate = [
            'tatsyurui_kbn' => 'required',
            'tiknensu_kbn' => 'nullable|digits:2',
            'renraku_kbn_check' => 'required',
            'req_memo' => 'max:500'
        ];
        $messValidate = [
            'tatsyurui_kbn.required' => trans('validate.The tatsyurui is required'),
            'tiknensu_kbn.digits' => trans('validate.field_digits', ['digits' => 2]),
            'renraku_kbn_check.required' => trans('validate.checkbox_reform'),
            'req_memo.max' => trans('validate.req_memo_max', ['max' => 500])
        ];
        //check validate user type lime user
        if (in_array($userType, [ViewConst::USER_TYPE_LIME_NORMAL, ViewConst::USER_TYPE_LIME_SPECIAL])) {
            $dataValidate['taisyou_kbn'] = 'required';
            $messValidate['taisyou_kbn.required'] = trans('validate.The taisyou is required');
        }
        $validate = Validator::make($request->all(), $dataValidate, $messValidate);

        if ($validate->fails()) {
            return redirect()
                    ->back()
                    ->withInput()
                    ->withErrors($validate->errors());
        }

        $data = $request->all();
        $category_ids = Session::get('category_ids');
        foreach($category_ids as $category_id) {
            $data['reform_bui_check'][$category_id.""] = 'on';
        }
        //format renraku_kbn
        $listRenraku = array_keys(HelperFunc::listContactMethods());
        $data['renraku_kbn'] = [];
        foreach ($listRenraku as $method) {
            $data['renraku_kbn'][$method] = '0';
            if (($renrakuKbn = $request->get('renraku_kbn_check'))
                    && is_array($renrakuKbn)
                    && isset($renrakuKbn[$method])) {
                $data['renraku_kbn'][$method] = '1';
            }
        }
        $data['renraku_kbn'] = implode('', $data['renraku_kbn']);

        //check if user type is LIME member
        if (in_array($userType, [ViewConst::USER_TYPE_LIME_NORMAL, ViewConst::USER_TYPE_LIME_SPECIAL])) {
            $taisyouKbn = $request->get('taisyou_kbn');
            if ($taisyouKbn == ViewConst::REFORM_LOCATE_HOME) {
                $data['bkn_zip_no']          = $currentUser->zip_no;
                $data['bkn_todouhuken_mei']  = $currentUser->todouhuken_mei;
                $data['bkn_sikutyouson_mei'] = $currentUser->sikutyouson_mei;
                $data['bkn_tyoumei']         = $currentUser->tyoumei;
                $data['bkn_tat_mei']         = $currentUser->tat_mei;
            } else {
                $validAddress = Validator::make($data, [
                    'bkn_zip_no1'         => 'required|numeric|digits:3',
                    'bkn_zip_no2'         => 'required|numeric|digits:4',
                    'bkn_todouhuken_mei'  => ['required', 'max:4', 'regex:/^[ァ-ン一-龯]*$/'],
                    'bkn_sikutyouson_mei' => ['required', 'max:50', 'regex:/^[ァ-ン一-龯０-９]*$/'],
                    'bkn_tyoumei'         => ['required', 'max:50','regex:/^[a-zA-Z一-龯0-9０-９\- ]*$/'],
                    'bkn_tat_mei'         => ['nullable', 'max:50', 'regex:/^[a-zA-Z一-龯0-9０-９\- ]*$/'],
                ], [
                    'bkn_zip_no1.required'         => trans('validate.This zip is required'),
                    'bkn_zip_no2.required'         => trans('validate.This zip is required'),
                    'bkn_todouhuken_mei.required'  => trans('validate.The todouhuken_mei is required'),
                    'bkn_sikutyouson_mei.required' => trans('validate.The sikutyouson_mei is required'),
                    'bkn_tyoumei.required'         => trans('validate.The tyoumei is required'),
                    'bkn_tyoumei.regex'            => trans('validate.Must not contain special characters'),
                    'bkn_tat_mei.regex'            => trans('validate.Must not contain special characters'),
                    '*.max'                        => trans('validate.Field input not be greater than number characters', ['number' => 50]),
                    '*.regex'                      => trans('validate.field_only_fullwidth'),
                    '*.numeric'                    => trans('validate.Zip code field is invalid'),
                    '*.digits'                     => trans('validate.Zip code field is invalid')
                ]);

                if ($validAddress->fails()) {
                    return redirect()
                            ->back()
                            ->withInput()
                            ->withErrors($validAddress->errors());
                }
                $data['bkn_zip_no'] = $data['bkn_zip_no1'] . $data['bkn_zip_no2'];
            }
        }

        //format reform bui
        $reformBui = $data['reform_bui_check'];
        $categories = SyohinCategory::getListReformBui('id');
        if (!$categories->isEmpty()) {
            $lastCat = $categories->last();
            if (intval($lastCat->id) > ViewConst::CATEGORY_MAX_SIZE) {
                unset($categories[$categories->count() - 1]);
                $categories[ViewConst::CATEGORY_MAX_SIZE - 1] = $lastCat;
            }
        }
        $data['reform_bui'] = [];
        for ($i = 0; $i < ViewConst::CATEGORY_MAX_SIZE; $i++) {
            $data['reform_bui'][$i] = '0';
            if (!$categories->isEmpty() && isset($categories[$i])) {
                $cat = $categories[$i];
                if (is_array($reformBui) && isset($reformBui[$cat->id . ''])) {
                    $data['reform_bui'][$i] = '1';
                }
            }
        }

        $data['reform_bui'] = implode('', $data['reform_bui']);
        //set current user data
        $data['knr_user_id']     = $currentUser->knr_user_id;
        $data['shimei']          = $currentUser->sei_local. '　' . $currentUser->mei_local;
        $data['idm_denwa_no']    = $currentUser->idm_denwa_no;
        $data['idm_keitai_tel']  = $currentUser->idm_keitai_tel;
        $data['mail']            = $currentUser->mail;
        $data['todouhuken_mei']  = $currentUser->todouhuken_mei;
        $data['sikutyouson_mei'] = $currentUser->sikutyouson_mei;
        $data['tyoumei']         = $currentUser->tyoumei;
        $data['zip_no']          = $currentUser->zip_no;
        if ($userType == User::TYPE_FAMILY) {
            $data['taisyou_kbn']         = "01";
            $data['bkn_zip_no']          = $currentUser->zip_no;
            $data['bkn_todouhuken_mei']  = $currentUser->todouhuken_mei;
            $data['bkn_sikutyouson_mei'] = $currentUser->sikutyouson_mei;
            $data['bkn_tyoumei']         = $currentUser->tyoumei;
            $data['bkn_tat_mei']         = $currentUser->tat_mei;
        }

        //return confirm screen
        $provinces = Common::listProvince();
        $products = Shopping::currentUserCreatingForms();

        $kento_plan_no = HelperFunc::makeUniqueCodeNumber(Reform::class,'kento_plan_no',14,'R');
        Session::put('kento_plan_no', $kento_plan_no);

        $data = array_merge($data ,['bkn_tyoumei' => HelperFunc::convertKana($data['bkn_tyoumei']),'bkn_tat_mei' => HelperFunc::convertKana($data['bkn_tat_mei'])]);

        Session::put('registed_reform_' . md5(Auth::id()), $data);

        Session::put('categories',$categories);
        Session::put('provinces',$provinces);

        return view('cart.confirm-register', compact('data', 'categories', 'provinces', 'products','kento_plan_no'));

    }

    /**
     * save data registed form
     * @return type
     */
    public function postRegister()
    {
        $userRegistedKey = 'registed_reform_' . md5(Auth::id());
        $data = Session::get($userRegistedKey);


        if (!$data) {
            return redirect()->route('cart.form.register');
        }

        $products = Shopping::currentUserCreatingForms();

        if (Session::has('kento_plan_no')) {

            $kento_plan_no = Session::get('kento_plan_no');
        } else {
            $kento_plan_no = null;
        }

        if ($products->isEmpty()) {
            return redirect()->route('cart.form.register');
        }


        $currentUser = Auth::user();
        $optionEnavi = Session::get('enavi');
        $latest = Reform::orderBy('regis_date', 'desc')->first();
        if (!$latest) {
            $reformNo = 1;
        } else {
            $reformNo = $latest->reform_no + 1;
        }
        DB::beginTransaction();
        try {
            foreach ($products as $product) {
                //save shopping
                $product->plan_regis_date = Carbon::now()->format('Y-m-d H:i:s');
                $product->req_form_status = Shopping::STATUS_REGISTED;
                $product->enavi_mitsu_cd3 = isset($optionEnavi[$product->shopping_id]) ? $optionEnavi[$product->shopping_id]['enavi_mitsu_cd3'] : null;
                $product->enavi_mitsu_cd4 = isset($optionEnavi[$product->shopping_id]) ? $optionEnavi[$product->shopping_id]['enavi_mitsu_cd4'] : null;
                $product->save();

                $dataReform = [
                    'kento_plan_id' =>          $product->kento_plan_id,
                    'category_cd' =>            $product->category_cd,
                    'subcategory_cd' =>         $product->subcategory_cd,
                    'syouhin_plan_id' =>        $product->syouhin_plan_id,
                    'syouhin_mei' =>            $product->syouhin_mei,
                    'plan_mei' =>               $product->plan_mei,
                    'shimei_kana' =>            $currentUser->sei_kana . '　' . $currentUser->mei_kana,
                    'birth_ymd' =>              $currentUser->birth_ymd,
                    'renrakusaki_kbn' =>        1,
                    'syahan_kakeritsu' =>       ($currentUser->memberType() == ViewConst::USER_TYPE_FAMILY ? 0.5 : 0.4),
                    'reform_cost_10_1' =>       $product->reform_cost_10_1,
                    'reform_cost_20' =>         $product->reform_cost_20,
                    'reform_cost_30' =>         $product->reform_cost_30,
                    'reform_cost_90' =>         $product->reform_cost_90,

                    'kengine_plan_cd1' =>       $product->kengine_plan_cd1,
                    'kengine_plan_cd2' =>       $product->kengine_plan_cd2,
                    'kengine_plan_cd3' =>       $product->kengine_plan_cd3,
                    'enavi_mitsu_cd1' =>        $product->enavi_mitsu_cd1,
                    'enavi_mitsu_cd2' =>        $product->enavi_mitsu_cd2,
                    'enavi_mitsu_cd3' =>        $product->enavi_mitsu_cd3,
                    'enavi_mitsu_cd4' =>        $product->enavi_mitsu_cd4,

                    'req_form_status' =>        ViewConst::REFORM_STT_REGISTED,
                    'regis_date' =>             Carbon::now()->format('Y-m-d H:i:s'),
                    'patch_id' =>               '',
                    'reform_no'       =>        $reformNo,
                    'kento_plan_no'   =>        $kento_plan_no,
                ];
                //create reform request

                Reform::create(array_merge($dataReform, $data));
            }

            $toMail = config('mail.register_reform_mail', 'tetsuya.mizutani@lixil.com');
            Mail::to($toMail)->queue(new EmailQueue(
                    'mails.cart.confirm-cart',
                    Lang::get('LIXIL Family STORE リフォーム お申し込み完了メール'),
                        [
                            'currentUser' => $currentUser,
                            'categories'  => Session::get('categories'),
                            'provinces'   => Session::get('provinces'),
                            'data'        => $data,
                            'products'    => $products,
                            'kento_plan_no'=>$kento_plan_no,
                        ]
                ));
            //send mail thanks reform
            $dateend = Carbon::parse(Carbon::now())->format('Y/m/d');
            $year = substr($dateend,0,4);
            $month = substr($dateend,5,2);
            $day = substr($dateend,8,2);

            Mail::to($currentUser->mail)->queue(new EmailQueue(
                    'mails.cart.mail_thanks_cart',
                    Lang::get('LIXIL Family STORE  リフォーム　お申し込み完了'),
                        [
                            'name' => $currentUser->sei_local . '　' . $currentUser->mei_local,
                            'date' => $year.'年'.$month.'月'.$day.'日',
                            'products'    => $products,
                            'kento_plan_no'=>$kento_plan_no
                        ]
                ));

            DB::commit();
            Session::forget($userRegistedKey);
            Session::forget('enavi');
            return redirect()->route('page.reform_thanks');
        } catch (\Exception $ex) {
            DB::rollback();
            return redirect()
                        ->route('cart.form.register')
                        ->withInput($data)
                        ->with('error_message', trans('page.error_occurred'));
        }
    }
}
