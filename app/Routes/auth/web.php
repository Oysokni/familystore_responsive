<?php

Route::group([
    'prefix' => 'user',
    'namespace' => 'Auth',
    'as' => 'auth.'
], function () {
    Route::get('login', 'AuthController@login')
            ->name('login');
    Route::post('login', 'AuthController@postLogin')
            ->name('post_login');
    Route::get('logout', 'AuthController@logout')
            ->name('logout');
    Route::get('forget-password', 'AuthController@forgetPasswd')
            ->name('forget_pass');
    Route::post('forget-password', 'AuthController@postForgetPasswd')
            ->name('post_forget_pass');
    Route::get('reset-password/{guid}', 'AuthController@resetPasswd')
            ->name('reset_pass');
    Route::post('reset-password', 'AuthController@postResetPasswd')
            ->name('post_reset_pass');
});

// Route register new member
Route::group(['prefix' => 'member', 'namespace' => 'Pages', 'as' => 'member.'], function() {
    // Screen login in member
    Route::get('login', 'MemberController@showFormCheckRegister')
        ->name('form.check.register');
    // Check login
    Route::post('login', 'MemberController@checkRegister')
        ->name('check.register');
    // Screen register member
    Route::get('register', 'MemberController@showFormRegister')
        ->name('form.register');
    // check register member
    Route::post('confirm/register', 'MemberController@register')
        ->name('register');
    // Screen confrim member register
    Route::get('confirm/register', 'MemberController@confirmRegister')
        ->name('confirm.register');
    // Member register success temporary
    Route::post('register/success/temporary', 'MemberController@successRegisterTemporary')
        ->name('success.register.temporary');
    // Screen thanks
    Route::get('register/thanks', 'MemberController@thanksRegistered')
        ->name('thanks.registered');
    // Screen enter password
    Route::get('register/password/{guid}', 'MemberController@formRegisterPassword')
        ->name('form.register.password');
    // Add password for member
    Route::post('register/password/{guid}', 'MemberController@registerPassword')
        ->name('register.password');
    // Screen success
    Route::get('register/success', 'MemberController@successRegister')
        ->name('register.success');
});
Route::group(['prefix' => 'iinavi', 'namespace' => 'Iinavi', 'middleware' => 'auth', 'as' => 'iinavi.'], function() {
    Route::get('login', 'IinaviController@loginIinavi')
        ->name('login');
    Route::post('login', 'IinaviController@postLoginIinavi')
            ->name('post.login');
});
