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

Route::get('/', 'PagesController@home');

Route::get('/contact', 'PagesController@contact');

Route::get('/about', 'PagesController@about');

Route::resource('tenants','TenantsController');

Route::resource('floors','FloorsController',['only' => ['index','show']]);

Route::resource('zones','ZonesController',['only' => ['index','show']]);

Route::resource('categories','CategoriesController',['only' => ['index','show','store','create']]);

Auth::routes();

Route::get('/home', 'PagesController@dashboard');
