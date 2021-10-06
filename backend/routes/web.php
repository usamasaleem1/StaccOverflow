<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

// Auth routes
Route::get('/register', function () {
    return view("register");
})->name("register");
Route::post("/register", [AuthController::class, "register"]);

Route::get('/signin', function () {
    return view("signin");
})->name("signin");
Route::post("/signin", [AuthController::class, "signin"]);
