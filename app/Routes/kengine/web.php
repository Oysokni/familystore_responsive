<?php

Route::group(['prefix' => 'kengine', 'namespace' => 'Kengine', 'as' => 'kengine.'], function() {
    Route::get('link/infor', 'KengineController@linkInfor')
        ->name('link.infor');
});

