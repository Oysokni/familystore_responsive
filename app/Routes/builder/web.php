<?php

Route::group([
    'prefix' => 'builder',
    'as' => 'builder.',
    'namespace' => 'Builder',
    'middleware' => 'auth'
], function () {
    Route::get('/', 'BuilderController@index')->name('index');
    Route::get('search', 'BuilderController@search')->name('search');
    Route::post('store', 'BuilderController@store')->name('store');

    Route::get('register', 'BuilderController@getFormRegister')->name('register.get');
    Route::post('register', 'BuilderController@register')->name('register.post');
    Route::get('confirm', 'BuilderController@confirm')->name('confirm.get');
    Route::get('storeData', 'BuilderController@storeData')->name('storeData.get');
    Route::get('success', 'BuilderController@success')->name('success.get');
});

