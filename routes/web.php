<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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


//Route::get('/', function () {
 //   return view('welcome');
//});

Route::get('/', 'FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('admin/home', 'AdminController@index');
Route::get('admin','Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin','Admin\LoginController@Login');
Route::get('admin/logout','AdminController@Logout')->name('admin.logout');

//========================Admin Route=====================

//==================Category Section======================
Route::get('admin/categories', 'Admin\CategoryController@index')->name('admin.category');
Route::post('admin/categories-store', 'Admin\CategoryController@StoreCat')->name('store.category');
Route::get('admin/categories/edit/{cat_id}', 'Admin\CategoryController@Edit');
Route::post('admin/categories-update', 'Admin\CategoryController@UpdateCat')->name('update.category');
Route::get('admin/categories/delete/{cat_id}', 'Admin\CategoryController@Delete');
Route::get('admin/categories/inactive/{cat_id}', 'Admin\CategoryController@Inactive');
Route::get('admin/categories/active/{cat_id}', 'Admin\CategoryController@Active');

//==================Brand Section======================
Route::get('admin/brand', 'Admin\BrandController@index')->name('admin.brand');
Route::post('admin/brand-store', 'Admin\BrandController@StoreBrand')->name('store.brand');
Route::get('admin/brand/edit/{brand_id}', 'Admin\BrandController@Edit');
Route::post('admin/brand-update', 'Admin\BrandController@UpdateBrand')->name('update.brand');
Route::get('admin/brand/delete/{brand_id}', 'Admin\BrandController@Delete');
Route::get('admin/brand/inactive/{brand_id}', 'Admin\BrandController@Inactive');
Route::get('admin/brand/active/{brand_id}', 'Admin\BrandController@Active');

//===================Products Section==================

Route::get('admin/products/add', 'Admin\ProductController@addProduct')->name('add-products');
Route::post('admin/products-store', 'Admin\ProductController@StoreProduct')->name('store-products');
Route::get('admin/manage-product', 'Admin\ProductController@manageProduct')->name('manage-products');

Route::get('admin/product/edit/{product_id}', 'Admin\ProductController@editProduct');
Route::post('admin/product/update', 'Admin\ProductController@updateProduct')->name('update-products');
Route::post('admin/product/image/update', 'Admin\ProductController@updatePImage')->name('update-image');
Route::get('admin/product/delete/{product_id}', 'Admin\ProductController@Delete');
Route::get('admin/product/inactive/{product_id}', 'Admin\ProductController@Inactive');
Route::get('admin/product/active/{product_id}', 'Admin\ProductController@Active');

//===================Coupon Section==================
Route::get('admin/coupon', 'Admin\CouponController@index')->name('admin.coupon');
Route::post('admin/coupon-store', 'Admin\CouponController@StoreBrand')->name('store.coupon');
Route::get('admin/coupon/edit/{coupon_id}', 'Admin\CouponController@Edit');
Route::post('admin/coupon-update', 'Admin\CouponController@UpdateCoupon')->name('update.coupon');
Route::get('admin/coupon/delete/{coupon_id}', 'Admin\CouponController@Delete');
Route::get('admin/coupon/inactive/{coupon_id}', 'Admin\CouponController@Inactive');
Route::get('admin/coupon/active/{coupon_id}', 'Admin\CouponController@Active');






