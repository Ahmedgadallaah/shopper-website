<?php
use App\Http\Controllers\HomeController;

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
//frontEnd site routes............................
Route::get('/', 'HomeController@index');












// Backend routes..........................................
Route::get('/logout','SuperAdminController@logout');
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');



// Category routes..........................................
Route::get('/all-categories', 'CategoryController@index');
Route::get('/add-category', 'CategoryController@create');
Route::post('/store_category', 'CategoryController@store');
Route::get('/InActive_category/{category_id}', 'CategoryController@InActive');
Route::get('/Active_category/{category_id}', 'CategoryController@Active');
Route::get('/edit_category/{category_id}', 'CategoryController@edit');
Route::post('/update_category/{category_id}', 'CategoryController@update');
Route::get('/delete_category/{category_id}', 'CategoryController@destroy');

// Manufacture Or Brand Routes.....................................
Route::get('/all_brands', 'BrandController@index');
Route::get('/add_brand', 'BrandController@create');
Route::post('/store_brand', 'BrandController@store');
Route::get('/InActive_brand/{brand_id}', 'BrandController@InActive');
Route::get('/Active_brand/{brand_id}', 'BrandController@Active');
Route::get('/edit_brand/{brand_id}', 'BrandController@edit');
Route::post('/update_brand/{brand_id}', 'BrandController@update');
Route::get('/delete_brand/{brand_id}', 'BrandController@destroy');

// Products Routes.....................................
Route::get('/all_products', 'ProductController@index');
Route::get('/add_product', 'ProductController@create');
Route::post('/store_product', 'ProductController@store');
Route::get('/InActive_product/{product_id}', 'ProductController@InActive');
Route::get('/Active_product/{product_id}', 'ProductController@Active');
Route::get('/edit_product/{product_id}', 'ProductController@edit');
Route::post('/update_product/{product_id}', 'ProductController@update');
Route::get('/delete_product/{product_id}', 'ProductController@destroy');