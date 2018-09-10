<?php

Route::group(['as' => 'register_family.', 'namespace' => 'RegisterFamily'], function () {

    Route::get('/accuracy-family', ['as' => 'accuracy_family', 'uses' => 'AccuracyFamilyController@getAccuracyFamily']);
    
	Route::post('/post-accuracy-family',['as' =>'post_accuracy_family', 'uses'=>'AccuracyFamilyController@postAccuracyFamily']);

	Route::get('/register-family',['as' =>'register_family', 'uses' => 'RegisterFamilyController@getFormRegisterFamily']);

	Route::post('/post-register-family',['as' =>'post_register_family', 'uses' => 'RegisterFamilyController@registerFamily']);

	Route::get('/confirm-register-family',['as' =>'confirm_register_family', 'uses' => 'RegisterFamilyController@confirmRegisterFamily']);

	Route::post('/success-full-register-family',['as' =>'success_full_register_family', 'uses' => 'RegisterFamilyController@successRegisterFamily']);

	Route::get('/thanks-rgister-family','RegisterFamilyController@thanksRegisterFamily');

	Route::get('/update-passdword/{guid}','RegisterFamilyController@updatePassword');

	Route::post('/update-passdword/{guid}','RegisterFamilyController@postUpdatePassword');

	Route::get('/success-update-password','RegisterFamilyController@successUpdatePassword');

});
