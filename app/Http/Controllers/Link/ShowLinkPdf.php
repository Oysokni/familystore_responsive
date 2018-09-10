<?php

namespace App\Http\Controllers\Link;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowLinkPdf extends Controller
{

    /**
     * Show PDF （ALL版）LIXIL Family STORE規約.pdf
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function showLinkPdf()
    {
        return view('link.pdf');
    }

    /**
     * Show PDF 商品仕様検討方法.pdf
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function showLinkPdf01()
    {
        return view('link.pdf01');
    }

    /**
     * Show PDF ３Dイメージ検討方法.pdf
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function showLinkPdf02()
    {
        return view('link.pdf02');
    }

    /**
     * Show PDF ショールーム案内.pdf
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function showLinkPdf03()
    {
        return view('link.pdf03');
    }

    /**
     * Show PDF LIXIL_Family_STORE_住宅購入紹介特典.pdf
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function showLinkPdf04()
    {
        return view('link.pdf04');
    }

    /**
     * Show PDF LIXIL_Family_STORE住宅購入紹介版利用規約（住宅購入）LIXIL社員.pdf
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function showLinkPdf05()
    {
        return view('link.pdf05');
    }

    /**
     * Show PDF LIXIL_Family_STORE住宅購入紹介版利用規約（案件紹介）LIXIL社員.pdf
     *
     * @return \Illuminate\Support\Facades\View
     */
    public function showLinkPdf06()
    {
        return view('link.pdf06');
    }
    /**
     * Show （Family）LIXIL Family STORE規約.pdf
     *
     * @return \Illuminate\View\View
     */
    public function showLinkPdf07()
    {
        return view('link.pdf07');
    }

    /**
     * Show LFSリフォームお申し込み～支払フロー.pdf
     *
     * @return \Illuminate\View\View
     */
    public function showLinkPdf08()
    {
        return view('link.pdf08');
    }

    /**
     * Show LIXIL_Family_STORE_住宅購入紹介フロー.pdf
     *
     * @return \Illuminate\View\View
     */
    public function showLinkPdf09()
    {
        return view('link.pdf09');
    }
}
