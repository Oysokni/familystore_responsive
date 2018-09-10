<?php

Route::group([
    'as' => 'page.', 
    'namespace' => 'Pages', 
    'middleware' => 'auth'
], function () {
    Route::get('/', 'PageController@index')->name('index');
    Route::get('/top-page', 'PageController@topPage')->name('top_page');
    Route::get('/reform', 'PageController@reform')->name('reform');
    Route::get('/reform-thanks', 'PageController@reformThanks')->name('reform_thanks');
    Route::get('/cross-proxy', 'PageController@html2canvasProxy')->name('cross_proxy');
});

