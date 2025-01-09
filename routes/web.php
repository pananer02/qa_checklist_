<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('UsersManage', UserController::class);
////////////////////////////////// --Admin-- ////////////////////////////////////////////
    // Route::middleware(['auth', 'role:admin'])->group(function () {
    //     Route::resource('UsersManage', UserController::class);
    // });

////////////////////////////////// --User-- ////////////////////////////////////////////

});
