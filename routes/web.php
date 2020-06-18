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
// Route::get('/admin/accomodations', 'Admin\AdminController@accomodations');
// Route::get('/admin/highlights', 'Admin\AdminController@highlights');
// Route::get('/admin/itineraries', 'Admin\AdminController@itineraries');

// Route::get('/admin/accomodation/add', 'Admin\AdminController@addAccomodation')->name('add_accomodation');
// Route::post('/admin/accomodation/add', 'Admin\AdminController@addAccomodation')->name('add_accomodation');
// Route::get('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
// Route::post('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
// Route::get('/admin/highlight/add', 'Admin\AdminController@addHighlight')->name('add_highlight');
// Route::post('/admin/highlight/add', 'Admin\AdminController@addHighlight')->name('add_highlight');
// Route::get('/admin/itinerarie/add', 'Admin\AdminController@addItinerarie')->name('add_itinerarie');
// Route::post('/admin/itinerarie/add', 'Admin\AdminController@addItinerarie')->name('add_itinerarie');

// Route::get('/admin/accomodation/edit/{id}', 'Admin\AdminController@editAccomodation')->name('edit_accomodation');
// Route::get('/admin/highlight/edit/{id}', 'Admin\AdminController@editHighlight')->name('edit_highlight');
// Route::get('/admin/itinerarie/edit/{id}', 'Admin\AdminController@editItinerarie')->name('edit_itinerarie');
// Route::post('/admin/accomodation/edit/{id}', 'Admin\AdminController@editAccomodation')->name('edit_accomodation');
// Route::post('/admin/highlight/edit/{id}', 'Admin\AdminController@editHighlight')->name('edit_highlight');
// Route::post('/admin/itinerarie/edit/{id}', 'Admin\AdminController@editItinerarie')->name('edit_itinerarie');

Route::get('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
Route::post('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
Route::get('/admin/properties/edit/{id}', 'Admin\AdminController@editProperties')->name('edit_properties');
Route::post('/admin/properties/edit/{id}', 'Admin\AdminController@editProperties')->name('edit_properties');