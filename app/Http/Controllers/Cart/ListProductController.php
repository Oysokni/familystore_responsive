<?php

namespace App\Http\Controllers\Cart;

use App\Contracts\Kengine;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Shopping;
use App\Models\TaisyoSyohin;
use App\Models\Policy;
use App\Routes\Breadcrumb;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Lang;
use LxMenu;

class ListProductController extends Controller
{

    // ListProductController constructor.
    public function __construct()
    {
        $this->middleware('auth');
        LxMenu::setActive('reform');
        Breadcrumb::add('トップページ', route('page.index'));
        Breadcrumb::add(Lang::get('cart.cart_reform'), route('page.reform'));
    }

    /**
     * Screen cart list product
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function index()
    {
        Breadcrumb::add(Lang::get('cart.breadcrumb_cart'));
        /** @var User $user */
        $user = Auth::user();
        $userType = substr($user->knr_user_id, 0, 1);

        $tableTaiSyo = TaisyoSyohin::getTableName();
        $tableShopping = Shopping::getTableName();
        $urlBack = '';

        /** @var Collection $listProduct */
        $listProduct = TaisyoSyohin::select([
                    "{$tableShopping}.shopping_id", "syouhin_3D_kbn", "syouhin_3D_plan_cd", "kakakuhyouji_kbn",
                    "syouhin_logo_filen", "plan_mei", "setumei_bun_1", "setumei_bun_2", "plan_image_filen",
                    "req_form_status", "enavi_mitsu_cd3", "enavi_mitsu_cd4", "{$tableTaiSyo}.syouhin_plan_id",
                    "{$tableTaiSyo}.kengine_plan_cd1", "{$tableTaiSyo}.kengine_plan_cd2", "syouhin_toroku_kbn",
                    DB::raw("(reform_cost_11 + reform_cost_21 + reform_cost_31) as cost_second"),
                    DB::raw("({$tableTaiSyo}.reform_cost_10 + {$tableTaiSyo}.reform_cost_20"
                    . " + {$tableTaiSyo}.reform_cost_30 + {$tableTaiSyo}.reform_cost_90) as cost_first"),
                    "{$tableTaiSyo}.link_url_1_mei", "{$tableTaiSyo}.link_url_1"
                ])
                ->join($tableShopping, function($join) use($tableShopping, $tableTaiSyo) {
                    $join->on("{$tableShopping}.category_cd", "{$tableTaiSyo}.category_cd");
                    $join->on("{$tableShopping}.subcategory_cd", "{$tableTaiSyo}.subcategory_cd");
                    $join->on("{$tableShopping}.syouhin_plan_id", "{$tableTaiSyo}.syouhin_plan_id");
                })
                ->where("{$tableShopping}.knr_user_id", $user->knr_user_id)
                ->where(function ($query) use($tableShopping) {
                    $query->where("{$tableShopping}.req_form_status", Shopping::STATUS_RESEARCHING)
                    ->orWhere("{$tableShopping}.req_form_status", Shopping::STATUS_CREATETING_FORM);
                })
                ->latest("{$tableShopping}.shopping_id")
                ->get();

        if (session()->has('cat_id')) {
            $urlBack = route('product.index', ['catId' => session()->get('cat_id')]);
            if (session()->has('sub_cat_id')) {
                $urlBack = route('product.index', [
                    'catId'    => session()->get('cat_id'),
                    'subCatId' => session()->get('sub_cat_id')
                ]);
            }
        }

        if ($userType == User::CH_LIME) {
            $remodelingNameId = Kengine::REMODELING_EMP;
        } elseif ($userType == User::CH_FAMILY) {
            $remodelingNameId = Kengine::REMODELING_FAMILY;
        }

        $reformPolicy = Policy::getReformPolicyLink();

        return view('cart.list-product', compact('listProduct', 'user', 'urlBack', 'userType', 'remodelingNameId', 'reformPolicy'));
    }

    /**
     * Update info a product in Shopping cart
     *
     * @param Request $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();
        $enavi = [];
        $isChoose = 0;
        $shopping = $request->shopping;

        if (!$shopping) {
            return redirect()->back();
        }

        foreach ($shopping as $key => $value) {
            if (isset($shopping[$key]['check'])) {
                $isChoose++;
            }
        }

        if ($isChoose == 0) {
            // Error: No products selected
            return redirect()->back()->withInput()
                    ->with('error_message', Lang::get('validate.Select products to register'));
        }

        $category_ids = array();
        foreach ($shopping as $key => $value) {
            if (isset($shopping[$key]['check'])) {

                /**  @var Shopping $product */
                $product = Shopping::find($shopping[$key]['shopping_id']);
                $category_ids[] = $product->category_cd;

                if (!$product || !is_object($product)) {
                    // ERROR: No record exists
                    return redirect()->back();
                }

                $product->req_form_status = Shopping::STATUS_CREATETING_FORM;
                $product->plan_regis_date = Carbon::now();

                if (!$product->saveOrFail()) {
                    // ERROR: Save failed
                    return redirect()->back();
                }

                if (isset($shopping[$key]['enavi']) && $shopping[$key]['enavi'] == 2) {
                    $enavi[$shopping[$key]['shopping_id']] = [
                        'enavi_mitsu_cd3' => isset($shopping[$key]['enavi_mitsu_cd3']) ? $shopping[$key]['enavi_mitsu_cd3'] : '',
                        'enavi_mitsu_cd4' => isset($shopping[$key]['enavi_mitsu_cd4']) ? $shopping[$key]['enavi_mitsu_cd4'] : '',
                    ];
                }
            } else {
                /**  @var Shopping $product */
                $product = Shopping::find($shopping[$key]['shopping_id']);

                if (!$product || !is_object($product)) {
                    // ERROR: No record exists
                    return redirect()->back();
                }

                $product->req_form_status = Shopping::STATUS_RESEARCHING;
                $product->plan_regis_date = Carbon::now();

                if (!$product->saveOrFail()) {
                    // ERROR: Save failed
                    return redirect()->back();
                }
            }
        }
        $request->session()->put('category_ids', $category_ids);
        $request->session()->put('enavi', $enavi);
        // Success
        return redirect()->action('Cart\CartController@formRegister');
    }

    /**
     * Destroy a product from the shopping list
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        if ($request->ajax()) {

            /** @var Shopping $product  */
            $product = Shopping::find($request->shopping_id);

            if (!$product || !is_object($product)) {
                //ERROR: No record exists
                return response()->json([
                        'success' => 0,
                ]);
            }

            if (!$product->delete()) {
                //ERROR: Delete failed
                return response()->json([
                        'success' => 0,
                ]);
            }

            // The number of items in the user's cart
            $numberProduct = Shopping::where('knr_user_id', $user->knr_user_id)
                ->whereIn('req_form_status', [Shopping::STATUS_RESEARCHING, Shopping::STATUS_CREATETING_FORM])
                ->count();

            // Succes
            return response()->json([
                    'success' => 1,
                    'number' => (int) $numberProduct,
            ]);
        }

        return response()->json([
                'success' => 0,
        ]);
    }

}
