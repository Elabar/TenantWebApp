<?php

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

Route::get('/', 'PagesController@index');

Route::get('/about', 'PagesController@about');

//Route::get('/tenants', 'PagesController@tenants');

Route::get('/floor', 'PagesController@floor');

Route::get('/floor/{floor}', 'PagesController@floorT');

Route::get('/zone', 'PagesController@zone');

Route::get('/zone/{zone}', 'PagesController@zoneT');

Route::get('/category', 'PagesController@category');

Route::get('/category/{category}','PagesController@categoryT');

Route::get('/contact', 'PagesController@contact');

Route::resource('tenants','TenantsController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
