<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AddressesController,
    PermissionsController,
    UserController,
    ProfileController,
    CoursesController,
    ContactsController,
    ExperiencesController,
    LogsController,
    FeedbackController,
    SchoolingsController,
    ImagesController,
    FavoriteCompaniesController,
    FavoritesController,
    ResumesController
};

################################
#### A U T H    R O U T E S ####
################################
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('adresses', AddressesController::class);
    Route::resource('contacts', ContactsController::class);
    Route::resource('courses', CoursesController::class);
    Route::resource('experiences', ExperiencesController::class);
    Route::resource('favorites', FavoritesController::class);
    Route::resource('favorites-companies', FavoriteCompaniesController::class);
    Route::resource('feedbacks', FeedbackController::class);
    Route::resource('image', ImagesController::class);
    Route::resource('logs', LogsController::class);
    Route::resource('permissions', PermissionsController::class);
    Route::resource('profiles', ProfileController::class);
    Route::resource('schoolings', SchoolingsController::class);
    Route::resource('users', UserController::class);

    Route::get('all-courses', [CoursesController::class, 'allCourses']);

    Route::get('resumes', [ResumesController::class, 'index']);
    Route::get('resumes/{id}', [ResumesController::class, 'show']);

    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

###################################
#### G U E S T    R O U T E S ####
##################################
Route::group(
    [
        'controller' => AuthController::class,
        'prefix' => 'auth',
        'middleware' => 'guest',
        'as' => 'auth'
    ],
    function() {
        Route::post('login', 'attempt')->middleware('throttle:5,1')->name('login');
        Route::post('register', 'register')->middleware('throttle:5,1')->name('register');
    }
);
