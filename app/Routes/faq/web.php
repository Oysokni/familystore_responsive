<?php

Route::group([
    'prefix' => 'faq',
    'as' => 'faq.', 
    'namespace' => 'Faq',
    'middleware' => 'auth',
], function () {
    Route::get('index/{faqType}', 'FaqController@index')->name('index');
});

