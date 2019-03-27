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

Route::get('/', function(){return "asd";});

Route::resource('tenants','TenantsController');

Route::resource('floors','FloorsController');

Route::resource('zones','ZonesController');

Route::resource('categories','CategoriesController');

