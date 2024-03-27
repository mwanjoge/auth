<?php
//Route::view('nisimpo/register','nisimpo::auth.register');
Route::group(['namespace' => 'App\Http\Controllers\Auth'], function() {
    Route::get('nisimpo/register', 'RegisterController@showRegistrationForm')->name('register');
});
Route::get('nisimpo/users','Nisimpo\Auth\Http\Controllers\UserController@index');
