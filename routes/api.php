<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdressesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SchoolingController;
use App\Http\Controllers\ImagesController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource('permissions', PermissionsController::class);
Route::resource('users', UserController::class);
Route::resource('adresses', AdressesController::class);
Route::resource('contacts', ContactsController::class);
Route::resource('experiences', ExperiencesController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('courses', CoursesController::class);
Route::resource('schoolings', SchoolingController::class);
Route::resource('images', ImagesController::class);


Route::prefix('auth')->group(function() {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::post('register', [RegisterController::class, 'register']);
});



