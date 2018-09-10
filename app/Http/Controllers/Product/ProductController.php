<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Contracts\Kengine;
use App\Models\Notify;
use App\Routes\Breadcrumb;
use App\Models\TaisyoSyohin;
use App\Models\SyohinCategory;
use App\Models\SubSyohinCategory;
use App\Models\Shopping;
use App\Models\Policy;
use App\Models\User;
use Carbon\Carbon;
use App\Helpers\HelperFunc;

class ProductController extends Controller
{
    /**
     * construct
     */
    public function __construct()
    {
        Breadcrumb::add('トップページ', route('page.index'));
    }

    /**
     * select products follow category and subcategory
     * @param Request $request
     * @return type
     */
    public function index(Request $request, $catId, $subCatId = null)
    {
        if(isset($catId) && $subCatId == null) {
            $dataCateName = SyohinCategory::select('category_mei')->where('category_cd',$catId)->first();
            $title= 'LIXIL Family STORE｜リフォームストア｜'.$dataCateName['category_mei'];
        }

        if( isset($catId) && $subCatId != null  ) {
            $dataCateName = SyohinCategory::select('category_mei')->where('category_cd',$catId)->first();
            $dataSubCateName = SubSyohinCategory::select('subcategory_mei')->where('subcategory_cd',$subCatId)->first();
            $title = 'LIXIL Family STORE｜リフォームストア｜'.$dataCateName['category_mei'].'｜'.$dataSubCateName['subcategory_mei'];
        }

        Breadcrumb::add(trans('product.title'), route('page.reform'));
        $notifyList = Notify::getData([
            'type' => Notify::loggedUserNotifyType(),
            'orderby' => 'osirase_start_ymd',
            'order' => 'desc',
            'per_page' => 10
        ]);

        $plans = TaisyoSyohin::getData([
            'category_cd' => $catId,
            'orderby' => 'subcategory_cd',
            'order' => 'ASC',
            'knr_user_id' => auth()->user()->knr_user_id
        ]);

        $subCategory = null;
        if ($subCatId) {
            $plans = TaisyoSyohin::getData([
                'category_cd' => $catId,
                'subcategory_cd' => $subCatId,
                'knr_user_id' => auth()->user()->knr_user_id
            ]);
            $subCategory = SubSyohinCategory::findOrFail($subCatId);
        }
        $category = SyohinCategory::findOrFail($catId);

        if ($subCatId) {
            Breadcrumb::add($category->category_mei, route('product.index', ['catId' => $catId]));
            Breadcrumb::add($subCategory->subcategory_mei);
        } else {
            Breadcrumb::add($category->category_mei);
        }

        $categories = SyohinCategory::getData([
            'per_page' => -1
        ]);
        $subCategories = SyohinCategory::getAllSubSyohinCategories($catId);
        $user = auth()->user();
        $userType = substr($user->knr_user_id, 0, 1);
        $reformPolicy = Policy::getReformPolicyLink();

        if ($userType == User::CH_LIME) {
            $remodelingNameId = Kengine::REMODELING_EMP;
        } elseif ($userType == User::CH_FAMILY) {
            $remodelingNameId = Kengine::REMODELING_FAMILY;
        }

        return view('product.index', [
            'notifyList' => $notifyList,
            'plans' => $plans,
            'categories' => $categories,
            'subCategories' => $subCategories,
            'catId' => $catId,
            'subCatId' => $subCatId,
            'category' => $category,
            'subCategory' => $subCategory,
            'userType' => $userType,
            'reformPolicy' => $reformPolicy,
            'remodelingNameId' => $remodelingNameId,
            'title' =>  isset($title) ? $title : '',
        ]);
    }

    /**
     * Store plan for list products in cart
     * @param Request $request
     * @return type
     */
    public function save(Request $request)
    {
        
        $shopping = new Shopping();

        $shopping->knr_user_id = auth()->user()->knr_user_id;
        $shopping->kento_plan_id = HelperFunc::makeUniqueCodeNumber(Shopping::class,'kento_plan_id',14,'R');
        $shopping->category_cd = $request->input('category_cd');
        $shopping->subcategory_cd = $request->input('subcategory_cd');
        $shopping->syouhin_plan_id = $request->input('syouhin_plan_id');
        $shopping->syahan_kakeritsu = $request->input('syahan_kakeritsu');
        $shopping->reform_cost_10_1 = $request->input('reform_cost_10_1');
        $shopping->reform_cost_20 = $request->input('reform_cost_20');
        $shopping->reform_cost_30 = $request->input('reform_cost_30');
        $shopping->reform_cost_90 = $request->input('reform_cost_90');
        $shopping->kengine_plan_cd1 = $request->input('kengine_plan_cd1');
        $shopping->kengine_plan_cd2 = $request->input('kengine_plan_cd2');
        $shopping->enavi_mitsu_cd1 = $request->input('enavi_mitsu_cd1');
        $shopping->enavi_mitsu_cd2 = $request->input('enavi_mitsu_cd2');
        $shopping->req_form_status = '00';
        $shopping->upd_date = Carbon::now();

        if ( $shopping->save() ) {
            return redirect()->route('cart.list.product')
                    ->with('cat_id', $request->input('cat_id'))
                    ->with('sub_cat_id', $request->input('sub_cat_id'));
        }
    }
}
