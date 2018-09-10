<?php

Route::group(['prefix' => 'iinavi', 'namespace' => 'Iinavi', 'as' => 'iinavi.'], function() {
    Route::get('update/infor', 'IinaviController@showModalConfrim')
        ->name('update.infor');
    Route::get('update', 'IinaviController@updateIinavi')
        ->name('update');
    Route::get('remove/session', 'IinaviController@deleteSession')
        ->name('remove.session');
    Route::get('check', 'IinaviController@checkIinavi')
        ->name('check');
});
