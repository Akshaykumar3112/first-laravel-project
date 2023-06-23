<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\AdminProfileController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\SliderController;
use App\Http\Controllers\backend\SubCategoryController;
use App\Http\Controllers\backend\ProductController;
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
    Route::get('/',[AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/owner',[AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard',[AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout',[AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/profile',[AdminProfileController::class, 'AdminProfile'])->name('admin.profile')->middleware('admin');
    Route::get('/profile/edit',[AdminProfileController::class, 'AdminProfileEdit'])->name('admin.profile.edit')->middleware('admin');
    Route::post('/profile/update',[AdminProfileController::class, 'AdminProfileUpdate'])->name('admin.profile.update')->middleware('admin');
    Route::get('/change/password',[AdminProfileController::class, 'AdminChangePassword'])->name('admin.change.password')->middleware('admin');
    Route::post('/new/password',[AdminProfileController::class, 'AdminNewPassword'])->name('admin.new.password')->middleware('admin');    
                        
    });

 //----- Admin All brand Routs ------
 Route :: prefix('brand')->group(function (){
    Route::get('/view',[BrandController::class, 'BrandView'])->name('all.brand')->middleware('admin');
    Route::post('/store',[BrandController::class, 'BrandStore'])->name('brand.store')->middleware('admin');
    Route::get('/edit/{id}',[BrandController::class, 'BrandEdit'])->name('brand.edit')->middleware('admin');
    Route::get('/delete/{id}',[BrandController::class, 'BrandDelete'])->name('brand.delete')->middleware('admin');
    Route::post('/update',[BrandController::class, 'BrandUpdate'])->name('brand.update')->middleware('admin');
 });
/*------End Admin Route-------- */

//----- Admin All Category Routs ------
Route :: prefix('category')->group(function (){
    Route::get('/view',[CategoryController::class, 'CategoryView'])->name('all.category')->middleware('admin'); // View All Category
    Route::post('/store',[CategoryController::class, 'CategoryStore'])->name('category.store')->middleware('admin'); // Store Category
    Route::get('/edit/{id}',[CategoryController::class, 'CategoryEdit'])->name('category.edit')->middleware('admin'); // View Category Edit Page
    Route::get('/delete/{id}',[CategoryController::class, 'CategoryDelete'])->name('category.delete')->middleware('admin'); // Delete Category 
    Route::post('/update',[CategoryController::class, 'CategoryUpdate'])->name('category.update')->middleware('admin'); // Update Category
    
    // Sub Category Routs
    Route::get('/sub/view',[SubCategoryController::class, 'SubCategoryView'])->name('all.subcategory')->middleware('admin'); // View All SubCategory 
    Route::post('/sub/store',[SubCategoryController::class, 'SubCategoryStore'])->name('subcategory.store')->middleware('admin'); // Store SbCategory
    Route::get('/sub/edit/{id}',[SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory.edit')->middleware('admin'); // View SubCategory Edit Page
    Route::get('/sub/delete/{id}',[SubCategoryController::class, 'SubCategoryDelete'])->name('subcategory.delete')->middleware('admin'); // Delete SubCategory
    Route::post('sub/update',[SubCategoryController::class, 'SubCategoryUpdate'])->name('subcategory.update')->middleware('admin'); // Update SubCategory


    //Sus Sub Category Routs
    Route::get('/sub/sub/view',[SubCategoryController::class, 'SubSubCategoryView'])->name('all.subsubcategory')->middleware('admin');    // View All Sub-SubCategory
    Route::post('/sub/sub/store',[SubCategoryController::class, 'SubSubCategoryStore'])->name('sub.subcategory.store')->middleware('admin');  // Store Sub-SubCategory
    Route::get('/sub/sub/edit/{id}',[SubCategoryController::class, 'SubSubCategoryEdit'])->name('subsubcategory.edit')->middleware('admin'); // View Sub-SubCategory Edit Page
    Route::get('/sub/sub/delete/{id}',[SubCategoryController::class, 'SubSubCategoryDelete'])->name('subsubcategory.delete')->middleware('admin'); // Delete Sub-SubCategory
    Route::post('/sub/sub/update',[SubCategoryController::class, 'SubSubCategoryUpdate'])->name('sub.subcategory.update')->middleware('admin'); // Update Sub-SubCategory

    Route::get('/subcategory/ajax/{category_id}',[SubCategoryController::class, 'GetSubCategory']); // Get Sub Category for to load Drop Down 
    Route::get('/sub-subcategory/ajax/{subcategory_id}',[SubCategoryController::class, 'GetSubSubCategory']); // Get Sub Category for to load Drop Down 
}); // End Category Route

// Products Route
Route :: prefix('product')->group(function (){
    Route::get('/add',[ProductController::class, 'AddProduct'])->name('add.product')->middleware('admin'); // View Page For Add Product
    Route::post('/Store',[ProductController::class, 'StoreProduct'])->name('product.store')->middleware('admin'); // View Page For Add Product    
    Route::get('/manage',[ProductController::class, 'ManageProduct'])->name('manage.product')->middleware('admin'); // View product page
    Route::get('/edit/{product_id}',[ProductController::class, 'EditProduct'])->name('product.edit')->middleware('admin'); // View Edit Page For Product
    Route::get('/delete/{product_id}',[ProductController::class, 'DeleteProduct'])->name('product.delete')->middleware('admin'); // Delete Product
    Route::post('/update',[ProductController::class, 'UpdateProduct'])->name('product.update')->middleware('admin'); // View Page For Add Product
    Route::get('/delete/image/{image_id}',[ProductController::class, 'DeleteProductMultiImages'])->name('delete.multImage')->middleware('admin'); // Delete Product
    Route::get('/status/{product_id}',[ProductController::class, 'ProductStatus'])->name('product.status')->middleware('admin'); // Change Product Status

});

//End Products Routs

//Sldier Routes
Route :: prefix('slider')->group(function (){
    Route::get('/view',[SliderController::class, 'SliderView'])->name('slider.view')->middleware('admin');
    Route::post('/store',[SliderController::class, 'SliderStore'])->name('slider.store')->middleware('admin');
    Route::get('/edit/{id}',[SliderController::class, 'SliderEdit'])->name('slider.edit')->middleware('admin');
    Route::get('/delete/{id}',[SliderController::class, 'SliderDelete'])->name('slider.delete')->middleware('admin');
    Route::post('/update',[SliderController::class, 'SliderUpdate'])->name('slider.update')->middleware('admin');
    Route::get('/status/{id}',[SliderController::class, 'SliderStatus'])->name('slider.status')->middleware('admin');
});

//End Slider Routs

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

Route::get('/user/change/password',[IndexController::class, 'UserChangePassword'])->name('user.change.password')->middleware('auth');
Route::post('/user/password/update',[IndexController::class, 'UserPasswordUpdate'])->name('user.password.update')->middleware('auth');


//--------------------------     ------------------------