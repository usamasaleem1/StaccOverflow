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
    return view('home', ["questions" => (new \App\Http\Controllers\QuestionController())->all()]);
});

// Auth routes
Route::get('/register', function () {
    return view("register");
})->name("register");
Route::post("/register", [AuthController::class, "register"]);

Route::get('/signin', function () {
    return view("signin");
})->name("login");
Route::post("/signin", [AuthController::class, "signin"]);

Route::post("/logout", [AuthController::class, "logout"])->name("logout");

// Question route
Route::get('/post', function () {
    return view("post");
})->middleware("auth")->name("post");
Route::post("/post", [\App\Http\Controllers\QuestionController::class, "create"])->name("post_post");

Route::prefix('search')->group(function () {
    Route::get('/tag/{tag}', [\App\Http\Controllers\SearchController::class, "searchByTag"]);
    Route::get('/author/{author}', [\App\Http\Controllers\SearchController::class, "searchByAuthor"]);
});

// Question voting
Route::post("questionvote", [\App\Http\Controllers\QuestionController::class, "vote"])->name("question_vote");
