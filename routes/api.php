<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AddressesController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ExperiencesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\SchoolingController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ResumesController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\LogsController;

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
Route::resource('adresses', AddressesController::class);
Route::resource('profiles', ProfileController::class);
Route::resource('courses', CoursesController::class);
Route::resource('logs', LogsController::class);

Route::get('all-courses', [CoursesController::class, 'allCourses']);

Route::resource('contacts', ContactsController::class);
Route::post('contacts/delete', [ContactsController::class, 'delete']);

Route::resource('experiences', ExperiencesController::class);
Route::post('experiences/delete', [ExperiencesController::class, 'delete']);

Route::post('courses/delete', [CoursesController::class, 'delete']);
Route::resource('schoolings', SchoolingController::class);

Route::post('schoolings/delete', [SchoolingController::class, 'delete']);
Route::resource('image', ImagesController::class);

Route::resource('favorites', FavoritesController::class);
Route::post('favorites/delete', [FavoritesController::class, 'delete']);

// Route::resource('resumes', ResumesController::class);
Route::get('resumes', [ResumesController::class, 'index']);
Route::get('resumes/{id}', [ResumesController::class, 'show']);


Route::prefix('auth')->group(function() {
    Route::post('login', [LoginController::class, 'login']);
    Route::post('logout', [LogoutController::class, 'logout']);
    Route::post('register', [RegisterController::class, 'register']);
});



