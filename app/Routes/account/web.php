<?php

Route::group([
    'namespace' => 'Account',
    'prefix' => 'account',
    'as' => 'account.content.',
    'middleware' => 'auth'
], function () {
    //content register
    Route::get('register-content', 'ContentController@registerContent')
            ->name('register');
    //content register reform
    Route::get('register-content/reform', 'ContentController@contentRegisterReform')
            ->name('register_reform');
    Route::get('register-content/reform/{id}/confirm', 'ContentController@registerReformConfirm')
            ->name('reform_confirm');
    //content register builder
    Route::get('register-content/builder', 'ContentController@contentRegisterBuilder')
            ->name('register_builder');
    Route::get('register-content/builder/{id}/confirm', 'ContentController@contentBuilderConfirm')
            ->name('builder_confirm');
    //update register builder status
    Route::put('register/{id}/update-status', 'ContentController@updateBuilderRegisterStatus')
            ->name('update.register_status');
});

