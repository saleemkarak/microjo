<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SettingController;
use App\Models\Category;
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
Auth::routes(['register'=>false]);
//Frontend section
Route::get('/', [App\Http\Controllers\Frontend\IndexController::class, 'home'])->name('home');

//// get Product By Category
Route::get('product-category/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'productCategory'])->name('product.category');
/// get Product Details
Route::get('product-detail/{slug}/', [App\Http\Controllers\Frontend\IndexController::class, 'productDetail'])->name('product.detail');

// Cart sextion
Route::post('cart/store', [App\Http\Controllers\Frontend\CartController::class, 'cartStore'])->name('cart.store');

//FIN Front End

//User Auth section
Route::get('user/auth', [App\Http\Controllers\Frontend\IndexController::class, 'userAuth'])->name('user.auth');
Route::post('user/login', [App\Http\Controllers\Frontend\IndexController::class, 'loginSubmit'])->name('login.submit');
Route::post('user/register', [App\Http\Controllers\Frontend\IndexController::class, 'registerSubmit'])->name('register.submit');
Route::get('user/logout', [App\Http\Controllers\Frontend\IndexController::class, 'userLogout'])->name('user.logout');



//admin

Route::prefix('/admin')->middleware('auth','admin')->group(function () {
    Route::get('/',[App\Http\Controllers\AdminController::class,'admin'])->name('admin');
    //banenrs
    Route::resource('/banner',BannerController::class);
    Route::get('banner_status',[App\Http\Controllers\BannerController::class,'bannerStatus'])->name('banner.status');
//category
Route::resource('/category',CategoryController::class);
Route::get('category_status',[App\Http\Controllers\CategoryController::class,'categoryStatus'])->name('category.status');
Route::post('/category/{id}/child',[App\Http\Controllers\CategoryController::class,'getChildByParentID']);

//brands
Route::resource('/brand',BrandController::class);
Route::get('brand_status',[App\Http\Controllers\BrandController::class,'brandStatus'])->name('brand.status');

//products

Route::resource('/product',ProductController::class);
Route::get('product_status',[App\Http\Controllers\ProductController::class,'productStatus'])->name('product.status');

//user

Route::resource('/user',UserController::class);
Route::get('user_status',[App\Http\Controllers\UserController::class,'userStatus'])->name('user.status');

  //settings
  Route::resource('/setting',SettingController::class);
  Route::get('setting_status',[App\Http\Controllers\SettingController::class,'settingStatus'])->name('setting.status');
});


//Seller Route

Route::prefix('/seller')->middleware('auth','seller')->group(function () {
    Route::get('/',[App\Http\Controllers\AdminController::class,'admin'])->name('seller');
});

//User Account
Route::prefix('/user')->group(function () {



    Route::get('/dashboard',[App\Http\Controllers\Frontend\IndexController::class,'userDashboard'])->name('user.dashboard');
    Route::get('/order',[App\Http\Controllers\Frontend\IndexController::class,'userOrder'])->name('user.order');
    Route::get('/address',[App\Http\Controllers\Frontend\IndexController::class,'userAddress'])->name('user.address');
    Route::get('/account-detail',[App\Http\Controllers\Frontend\IndexController::class,'userAccountDetail'])->name('user.account');

 // Addresses
Route::post('/billing/address/{id}',[App\Http\Controllers\Frontend\IndexController::class,'billingAddress'])->name('billing.address');
Route::post('/shipping/address/{id}',[App\Http\Controllers\Frontend\IndexController::class,'shippingAddress'])->name('shipping.address');
 // user Account
 Route::post('/update/account/{id}',[App\Http\Controllers\Frontend\IndexController::class,'updateAccount'])->name('update.account');


});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
