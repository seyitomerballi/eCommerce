<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SectionController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::prefix('/admin')->namespace('Admin')->name('admin.')->group(function () {
    // All the admin routes will be defined here.
    Route::match(['get', 'post'], '/', [AdminController::class, 'login'])->name('login');
    // ADMIN MIDDLEWARE
    Route::middleware(['admin'])->group(function () {

        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('settings', [AdminController::class, 'settings'])->name('settings');
        Route::get('logout', [AdminController::class, 'logout'])->name('logout');
        //  Check Password Settings Data with ajax
        Route::post('check-current-pwd', [AdminController::class, 'checkCurrentPassword'])->name('checkCurrentPassword');
        Route::post('check-confirm-pwd', [AdminController::class, 'checkConfirmPassword'])->name('checkConfirmPassword');
        //  end Check Password Settings Data with ajax
        Route::post('update-current-pwd', [AdminController::class, 'updateCurrentPassword'])->name('updateCurrentPassword');
        Route::match(['get', 'post'], 'update-admin-details', [AdminController::class, 'updateAdminDetails'])->name('updateAdminDetails');

        // Sections --- names-> admin.sections.example
        Route::name('sections.')->group(function (){
            Route::get('sections',[SectionController::class,'sections'])->name('sections');
            Route::match(['post','get'],'update-section-status',[SectionController::class,'updateSectionStatus'])->name('updateSectionStatus');
        });
        // Categories --- names-> admin.categories.example
        Route::name('categories.')->group(function (){
            Route::get('categories',[CategoryController::class,'categories'])->name('categories');
            Route::post('update-category-status',[CategoryController::class,'updateCategoryStatus'])->name('updateCategoryStatus');
            Route::match(['post','get'],'add-edit-category/{slug?}',[CategoryController::class,'addEditCategory'])->name('addEditCategory');
            Route::post('append-categories-level',[CategoryController::class,'appendCategoryLevel'])->name('appendCategoryLevel');
        });
    });
    // END ADMIN MIDDLEWARE
    /*  Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });    */


});
require __DIR__ . '/auth.php';


