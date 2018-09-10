<?php

Route::group([
    'prefix' => 'pdf',
    'as' => 'pdf.', 
    'namespace' => 'Pdf'
], function () {
    Route::get('index', 'PdfController@index')->name('index');
});

