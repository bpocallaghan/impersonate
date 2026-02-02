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

use Bpocallaghan\Impersonate\ImpersonateController;
use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])
    ->prefix('impersonate')
    ->group(function () {
        Route::post('/logout', [ImpersonateController::class, 'logout'])->name('impersonate.logout');
        Route::post('/login/{user}', [ImpersonateController::class, 'login'])
            ->name('impersonate.login')
            ->middleware('auth.admin');
    });
