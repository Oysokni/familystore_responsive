<?php

Route::group([
    'prefix' => 'product',
    'as' => 'product.', 
    'namespace' => 'Product',
    'middleware' => 'auth'
], function () {
    Route::get('index/{catId}/{subCatId?}', 'ProductController@index')->name('index');
    Route::post('save', 'ProductController@save')->name('save');
});

