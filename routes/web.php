<?php
//Route::view('nisimpo/register','nisimpo::auth.register');
Route::group(['namespace' => 'App\Http\Controllers\Auth'], function() {
    Route::get('nisimpo/register', 'RegisterController@showRegistrationForm')->name('nisimpo.register');
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
    Route::post('roles-add',[\Nisimpo\Auth\Http\Controllers\UserController::class,'createNewRole'])->name('role.add');
    Route::get('role/{id}',[\Nisimpo\Auth\Http\Controllers\UserController::class,'showRole'])->name('role.show');
    Route::get('role/{id}/edit',[\Nisimpo\Auth\Http\Controllers\UserController::class,'editRole'])->name('role.edit');
    Route::put('role/{id}/update',[\Nisimpo\Auth\Http\Controllers\UserController::class,'updateRole'])->name('role.update');
    Route::delete('role/{id}/delete',[\Nisimpo\Auth\Http\Controllers\UserController::class,'deleteRole'])->name('role.destroy');


    Route::post('assign-role-permissions',[\Nisimpo\Auth\Http\Controllers\UserController::class,'givePermissionsToRole'])->name('role.permissions');
    Route::post('assign-user-role',[\Nisimpo\Auth\Http\Controllers\UserController::class,'assignUserRole'])->name('user.role');

    Route::get('groups',[\Nisimpo\Auth\Http\Controllers\GroupsManagementController::class,'index'])->name('groups.index');
    Route::get('group/{id}',[\Nisimpo\Auth\Http\Controllers\GroupsManagementController::class,'show'])->name('group.show');
    Route::post('group-create',[\Nisimpo\Auth\Http\Controllers\GroupsManagementController::class,'create'])->name('group.create');
    Route::post('assign-group-permissions',[\Nisimpo\Auth\Http\Controllers\GroupsManagementController::class,'assignGroupPermissions'])->name('group.permissions');


    Route::get('permissions',[\Nisimpo\Auth\Http\Controllers\UserController::class,'permissions'])->name('permissions.index');
    Route::post('permission-add',[\Nisimpo\Auth\Http\Controllers\UserController::class,'createNewPermissions'])->name('permissions.add');
    Route::get('permission/{id}/edit',[\Nisimpo\Auth\Http\Controllers\UserController::class,'editPermission'])->name('permission.edit');
    Route::put('permission/{id}/update',[\Nisimpo\Auth\Http\Controllers\UserController::class,'updatePermission'])->name('permission.update');
    Route::delete('permission/{id}/delete',[\Nisimpo\Auth\Http\Controllers\UserController::class,'deletePermission'])->name('permission.destroy');


    Route::get('users',[\Nisimpo\Auth\Http\Controllers\UserController::class,'index'])->name('users.index');
    Route::get('user/{id}',[\Nisimpo\Auth\Http\Controllers\UserController::class,'showUser'])->name('user.show');
    Route::get('user/{id}/edit',[\Nisimpo\Auth\Http\Controllers\UserController::class,'edit'])->name('user.edit');
    Route::post('user-create',[\Nisimpo\Auth\Http\Controllers\UserController::class,'createUser'])->name('user.create');
    Route::put('user/update/{id}',[\Nisimpo\Auth\Http\Controllers\UserController::class,'update'])->name('user.update');
    Route::delete('user/delete/{id}',[\Nisimpo\Auth\Http\Controllers\UserController::class,'delete'])->name('user.delete');

    Route::post('assign-user-permissions',[\Nisimpo\Auth\Http\Controllers\UserController::class,'givePermissionsToUser'])->name('user.permissions');

});
