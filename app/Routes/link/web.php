<?php

Route::group([
    'prefix'     => 'link',
    'as'         => 'link.',
    'namespace'  => 'Link',
    'middleware' => 'auth',
    ], function () {
    Route::get('（ALL版）LIXIL Family STORE規約.html', 'ShowLinkPdf@showLinkPdf')
        ->name('（ALL版）LIXIL Family STORE規約.pdf');

    Route::get('商品仕様検討方法.pdf', 'ShowLinkPdf@showLinkPdf01')
        ->name('商品仕様検討方法.pdf');

    Route::get('３Dイメージ検討方法.pdf', 'ShowLinkPdf@showLinkPdf02')
        ->name('３Dイメージ検討方法.pdf');

    Route::get('ショールーム案内.pdf', 'ShowLinkPdf@showLinkPdf03')
        ->name('ショールーム案内.pdf');

    Route::get('LIXIL_Family_STORE_住宅購入紹介特典.pdf', 'ShowLinkPdf@showLinkPdf04')
        ->name('LIXIL_Family_STORE_住宅購入紹介特典.pdf');

    Route::get('LIXIL_Family_STORE住宅購入紹介版利用規約（住宅購入）LIXIL社員.html', 'ShowLinkPdf@showLinkPdf05')
        ->name('LIXIL_Family_STORE住宅購入紹介版利用規約（住宅購入）LIXIL社員.pdf');

    Route::get('LIXIL_Family_STORE住宅購入紹介版利用規約（案件紹介）LIXIL社員.html', 'ShowLinkPdf@showLinkPdf06')
        ->name('LIXIL_Family_STORE住宅購入紹介版利用規約（案件紹介）LIXIL社員.pdf');

    Route::get('（Family）LIXIL Family STORE規約.html', 'ShowLinkPdf@showLinkPdf07')
        ->name('（Family）LIXIL Family STORE規約.pdf');

    Route::get('LFSリフォームお申し込み～支払フロー.pdf', 'ShowLinkPdf@showLinkPdf08')
        ->name('LFSリフォームお申し込み～支払フロー.pdf');

    Route::get('LIXIL_Family_STORE_住宅購入紹介フロー.pdf', 'ShowLinkPdf@showLinkPdf09')
        ->name('LIXIL_Family_STORE_住宅購入紹介フロー.pdf');
});

