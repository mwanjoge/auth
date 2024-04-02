<?php
//Route::view('nisimpo/register','nisimpo::auth.register');
Route::group(['namespace' => 'App\Http\Controllers\Auth'], function() {
    Route::get('nisimpo/register', 'RegisterController@showRegistrationForm')->name('register');
});
//Route::get('','Nisimpo\Auth\Http\Controllers\UserController@index');


Route::middleware(['web'])->group(function () {
    Route::get('login', 'Nisimpo\Auth\Http\Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Nisimpo\Auth\Http\Auth\LoginController@login');
    // your package routes
    Route::group(['namespace' => 'Nisimpo\Auth\Http\Auth'], function() {
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');

        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');

        Route::get('password/confirm', 'ConfirmPasswordController@showConfirmForm')->name('password.confirm');
        Route::post('password/confirm', 'ConfirmPasswordController@confirm');

        Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
        Route::get('email/verify/{id}/{hash}', 'VerificationController@verify')->name('verification.verify');
        Route::post('email/resend', 'VerificationController@resend')->name('verification.resend');
    });
    Route::get('/home', [\Nisimpo\Auth\Http\Controllers\UserController::class, 'index'])->name('home');
    Route::get('roles',[\Nisimpo\Auth\Http\Controllers\UserController::class,'roles'])->name('roles.index');
    Route::get('permissions',[\Nisimpo\Auth\Http\Controllers\UserController::class,'permissions'])->name('permissions.index');
    Route::get('users',[\Nisimpo\Auth\Http\Controllers\UserController::class,'users'])->name('users.index');
});
