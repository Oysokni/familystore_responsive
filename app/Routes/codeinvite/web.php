<?php

Route::group([
	'middleware' => 'auth',
    'prefix' => 'code-invite',
    'as' => 'code.invite.', 
    'namespace' => 'CodeInvite',
    'middleware' => 'auth'
], function () {
    
    Route::get('form-code-invite','CodeInviteController@showFormCodeInvite')->name('invite');
    Route::post('form-code-invite','CodeInviteController@postCodeInvite')->name('post-code');
    
    Route::get('show-form-confirm-code-invite','CodeInviteController@showFormConfirmCodeInvite')->name('confirm-code');
    Route::post('post-confirm-code-invite','CodeInviteController@postComfirmCodeInvite')->name('post-confirm-code');
    
    Route::get('thanks-code-invite','CodeInviteController@thanksCodeInvite')->name('thanks-code');
    
});

