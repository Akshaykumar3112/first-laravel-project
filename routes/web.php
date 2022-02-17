<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\frontend\IndexController;
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

/*------Admin Route-------- */
    Route :: prefix('admin')->group(function (){
    Route::get('/login',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/profile',[AdminProfileController::class, 'AdminProfile'])->name('admin.profile')->middleware('admin');
    Route::get('/profile/edit',[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit')->middleware('admin');
    Route::post('/profile/update',[AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profile.update')->middleware('admin');
    Route::get('/change/password',[AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password')->middleware('admin');
    Route::post('/new/password',[AdminProfileController::class, 'AdminNewPassword'])->name('admin.new.password')->middleware('admin');    
    });



/*------End Admin Route-------- */


/*--------User Route----------*/

Route::get('/',[IndexController::class, 'Index']);

                //------Contact US page -----

Route::get('/contactUs',[IndexController::class, 'contactUs'])->name('contect.us.view');

                // ----- User Logout -----

Route::get('/user/logout',[IndexController::class, 'UserLogout'])->name('user.logout');

                //-----User Profile -----

Route::get('/user/profile',[IndexController::class, 'UserProfile'])->name('user.profile')->middleware('auth');
Route::post('/user/profile/update',[IndexController::class, 'UserProfileUpdate'])->name('user.profile.update');

                //-----User Dash board-----
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

                //-----User Cahnge Password -----

Route::get('/user/change/password',[IndexController::class, 'UserChangePassword'])->name('user.change.password');
Route::post('/user/password/update',[IndexController::class, 'UserPasswordUpdate'])->name('user.password.update');


//--------------------------     ------------------------