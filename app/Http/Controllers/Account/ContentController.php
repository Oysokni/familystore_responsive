<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reform;
use App\Models\TShintikuReq;
use App\Helpers\HelperFunc;
use App\Contracts\Common;
use App\Helpers\ViewConst;
use App\Models\SyohinCategory;
use App\Routes\Breadcrumb;
use Illuminate\Support\Facades\Auth;
use LxMenu;

class ContentController extends Controller
{

    public function __construct()
    {
        Breadcrumb::add('トップページ', route('page.index'));
    }

    public function registerContent()
    {
        LxMenu::setActive('account');
        $prevRegisterPage = LxMenu::getPrevRegisterPage();

        return redirect()
                ->route($prevRegisterPage['route']);
    }

    /*
     * view register reform content
     */
    public function contentRegisterReform(Request $request)
    {
        LxMenu::setActive('account');
        Breadcrumb::add('リフォームストア', route('page.reform'));
        Breadcrumb::add('お申し込み内容');
        $reform = 'リフォームストア';

        $collection = Reform::getData(array_merge([
            'fields' => [
                'reform.reform_id as id',
                'reform.req_form_status',
                'reform.upd_date',
                'reform.regis_date',
                'reform.kibo_date',
                'reform.reform_bui',
                'reform.reform_no'
            ],
            'group_by' => 'reform.reform_no'
        ], $request->all()));

        $categories = SyohinCategory::getListReformBui('id');

        return view('account.reform.register-content', compact('collection','reform', 'categories'));
    }

    /*
     * view register builder content
     */
    public function contentRegisterBuilder(Request $request)
    {
        LxMenu::setActive('account');
        Breadcrumb::add('住宅購入･紹介', route('builder.index'));
        Breadcrumb::add('お申し込み内容');
        $builder = '住宅購入･紹介';

        $collection = TShintikuReq::getData(array_merge([
            'fields' => [
                'shintiku_id as id',
                'req_form_status',
                'upd_date',
                'regis_date',
                'syoukai_kbn',
                'anken_kbn',
                's_sei_local',
                's_mei_local'
            ]
        ], $request->all()));

        return view('account.builder.register-content', compact('collection','builder'));
    }



    /**
     * update register builder status
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Support\Facades\Redirect
     */
    public function updateBuilderRegisterStatus($id, Request $request)
    {
        $currentUser = Auth::user();
        $shintiku = TShintikuReq::where('knr_user_id', $currentUser->knr_user_id)->findOrFail($id);

        $status = $request->get('req_form_status');
        $listStatuses = HelperFunc::listReformStatuses();
        if ($status && isset($listStatuses[$status])) {
            $shintiku->req_form_status = $status;
            $shintiku->save();
        }
        return redirect()
                ->back();
    }

    /**
     * confirm content register reform
     * @param int $reformNo
     * @return \Illuminate\View\View
     */
    public function registerReformConfirm($reformNo)
    {
        $user = Auth::user();

        $data = Reform::where([
                ['reform_no', $reformNo],
                ['knr_user_id', $user->knr_user_id]
            ])->first();

        if (!$data) {
            abort(404);
        }

        $categories = SyohinCategory::getListReformBui('id');

        $provinces = Common::listProvince();
        $products = Reform::getListSyohinPlans([$reformNo], [ViewConst::REFORM_STT_REGISTED]);
       
        foreach ($products as $key => $product ) {
            $kento_plan_no = $product ->kento_plan_no;
            break;
        }

        $hideLogout = true;
        return view('account.reform.content-confirm', compact('data', 'categories', 'provinces', 'products', 'hideLogout','kento_plan_no'));
    }

    /**
     * confirm content register builder
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function contentBuilderConfirm($id)
    {
        $currentUser = Auth::user();
        $shintiku = TShintikuReq::where('knr_user_id', $currentUser->knr_user_id)->findOrFail($id);
        
        if (!empty($shintiku->anken_kbn)) {
            $dataKbn = explode (',', $shintiku->anken_kbn);
        } else {
            $dataKbn= null;
        }
        
        $data = array_merge($shintiku->toArray(), [
            'sei_local' => $shintiku->s_sei_local,
            'mei_local' => $shintiku->s_mei_local,
            'address' => '〒'. implode('-', $currentUser->getArrZipNo()) . "　" . $shintiku->todouhuken_mei . $shintiku->sikutyouson_mei . $shintiku->tyoumei,
            'company_mei' => $shintiku->company_name,
            'cb_mail' => $shintiku->s_mail,
            'type_phone' => '',
            'zip21' => substr($shintiku->s_zip_no, 0, 3),
            'zip22' => substr($shintiku->s_zip_no, 3, 6),
            'kibo_builder_txt' => $shintiku->getListKiboBuilderName(),
            'anken_kbn'=> $dataKbn,
        ]);
        $hideLogout = true;
        $taiouKbn['name'] = $shintiku->getTaiouKbnName();
        return view('account.builder.content-confirm', compact('data', 'taiouKbn', 'hideLogout'));
    }

}
