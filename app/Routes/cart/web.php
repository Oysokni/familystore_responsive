<?php

// Route shopping cart
Route::group([
    'prefix' => 'cart', 
    'namespace' => 'Cart', 
    'as' => 'cart.', 
    'middleware' => 'auth'
], function() {
    // Screen list product
    Route::get('list/product', 'ListProductController@index')
        ->name('list.product');
    // Destroy a product
    Route::post('list/destroy/product', 'ListProductController@destroy')
        ->name('list.destroy.product');
    // Update info a product
    Route::post('update/product', 'ListProductController@update')
        ->name('update.product');
    // Screen register register product
    Route::get('register/product', 'CartController@formRegister')
        ->name('form.register');
    Route::get('register/product/back', 'CartController@backFormRegister')
        ->name('back.register');
    // Register a shopping cart
    Route::post('register/product/confirm', 'CartController@confirmRegister')
        ->name('confirm.register');
    Route::post('register/product', 'CartController@postRegister')
        ->name('register');
});
