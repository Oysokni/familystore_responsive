<?php

Route::group([
    'prefix' => 'file',
    'namespace' => 'File',
    'middleware' => 'auth',
    'as' => 'file.'
], function () {
    Route::get('upload-to-s3-ZxPHfI7wYWEASDJLuADCigpX8sQ', 'FileController@uploadToS3')
            ->name('s3.upload');
    Route::get('get/{fileName}', 'FileController@getFile')
            ->name('get_file');
});
