<?php

namespace App\Http\Controllers\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Faq;
use App\Routes\Breadcrumb;

class FaqController extends Controller
{
    /*
     * construct
     */
    public function __construct()
    {
        Breadcrumb::add('トップページ', route('page.index'));

    }

    /**
     * show faqs list
     * @param Request $request
     * @return type
     */
    public function index(Request $request, $faqType)
    {
        if ($faqType == Faq::TYPE_REFORM_FAQ) {
            $title =  trans('page.title_faq_index_2');
            Breadcrumb::add('リフォームストア', route('page.reform'));
        } else if ($faqType == Faq::TYPE_BUILDER_FAQ) {
            $title =  trans('page.title_faq_index_3');
            Breadcrumb::add('住宅購入・紹介', route('builder.index'));
        } else {
            abort(404);
        }

        Breadcrumb::add(trans('faq.title'));
        $validate = Validator::make(['faq_type' => $faqType], [
            'faq_type' => ['required', 'numeric', 'regex:/[2-3]/']
        ]);
        if ($validate->fails()) {
            abort(404);
        }

        $faqs = Faq::getData(Faq::getFaqType($faqType));

        return view('faq.index', compact('faqs','title', 'faqType'));
    }
}
