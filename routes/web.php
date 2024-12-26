<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login_page');
});

Route::get('/register', function () {
    return view('registration_page');
});

Route::post('/register_user', [UserController::class, 'register']);