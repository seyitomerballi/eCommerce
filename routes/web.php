<?php

use App\Http\Controllers\Admin\AdminController;
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

Route::prefix('/admin')->namespace('Admin')->group(function () {
    // All the admin routes will be defined here.
    Route::match(['get', 'post'], '/', [AdminController::class, 'login'])->name('admin.login');
    Route::middleware(['admin'])->group(function (){
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
        Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
        Route::post('check-current-pwd',[AdminController::class,'chkCurrentPassword'])->name('admin.chkCurrentPassword');
    });
    /*  Route::group(['middleware' => ['admin']], function () {
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    });    */


});
require __DIR__ . '/auth.php';


