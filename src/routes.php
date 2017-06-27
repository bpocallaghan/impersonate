<?php

/*
|--------------------------------------------------------------------------
| Impersonation Routes
|--------------------------------------------------------------------------
|
| Here is the routes to impersonate another user in your application
| You can disable registering of this routes if you prefer to
| register your own.
|
*/

Route::group([
    'middleware' => ['web', 'auth'],
    'prefix'     => 'impersonate',
    'namespace'  => 'Bpocallaghan\Impersonate'
], function () {
    Route::post('/logout', 'ImpersonateController@logout')->name('impersonate.logout');
    Route::post('/login/{user}', 'ImpersonateController@login')
        ->name('impersonate.login')
        ->middleware('auth.admin');
});