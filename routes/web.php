<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');

/*
* Admin Routes
*/
Route::get('/admin', 'Admin\AdminController@index');
Route::get('/admin/categories', 'Admin\AdminController@categories');
Route::get('/admin/category/add', 'Admin\AdminController@addCategory');
Route::post('/admin/category/add', 'Admin\AdminController@addCategory')->name('add_category');
Route::get('/admin/category/edit/{id}', 'Admin\AdminController@editCategory');
Route::post('/admin/category/edit/{id}', 'Admin\AdminController@editCategory')->name('edit_category');
Route::get('/admin/properties', 'Admin\AdminController@properties');
Route::get('/admin/experience', 'Admin\AdminController@experience');
Route::post('/admin/experience/add', 'Admin\AdminController@addExperience')->name('add_experience');
Route::get('/admin/experience/add', 'Admin\AdminController@addExperience')->name('add_experience');

Route::get('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
Route::post('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
Route::get('/admin/properties/edit/{id}', 'Admin\AdminController@editProperties')->name('edit_properties');
Route::post('/admin/properties/edit/{id}', 'Admin\AdminController@editProperties')->name('edit_properties');
Route::get('/admin/profile', 'Admin\AdminController@profile');
Route::post('/admin/profile', 'Admin\AdminController@profile')->name('update_profile');