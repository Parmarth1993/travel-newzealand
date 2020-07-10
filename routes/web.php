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
Route::get('/quetionarie1', 'HomeController@questionaire')->name('questionaire');

Route::post('/questionaire/add', 'HomeController@addQuestionaire')->name('addQuestionaire');
Route::post('/questionnaire/add', 'HomeController@addQuestionnaire')->name('addQuestionnaire');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about')->name('about');
Route::get('/why-us', 'HomeController@whyUs')->name('whyUs');
Route::get('/faq', 'HomeController@faq')->name('faq');
Route::get('/experiences', 'HomeController@experiences')->name('experiences');
Route::get('/accommodations', 'HomeController@accommodations')->name('accommodations');
Route::get('/quetionarie', 'HomeController@quiz')->name('quiz');

/*
* Admin Routes
*/
Route::get('/admin', 'Admin\AdminController@index');
Route::get('/admin/categories', 'Admin\AdminController@categories')->name('category_list');
Route::get('/admin/category/add', 'Admin\AdminController@addCategory');
Route::post('/admin/category/add', 'Admin\AdminController@addCategory')->name('add_category');
Route::get('/admin/category/edit/{id}', 'Admin\AdminController@editCategory');
Route::post('/admin/category/edit/{id}', 'Admin\AdminController@editCategory')->name('edit_category');
Route::get('/admin/properties', 'Admin\AdminController@properties')->name('properties_list');
Route::get('/admin/experience', 'Admin\AdminController@experience')->name('experience_list');
Route::post('/admin/experience/add', 'Admin\AdminController@addExperience')->name('add_experience');
Route::get('/admin/experience/add', 'Admin\AdminController@addExperience')->name('add_experience');
Route::get('/admin/experience/edit/{id}', 'Admin\AdminController@editExperience')->name('edit_experience');
Route::post('/admin/experience/edit/{id}', 'Admin\AdminController@editExperience')->name('edit_experience');
Route::post('/delete/experience','Admin\AdminController@deleteExperience')->name('delete_experience');


Route::get('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
Route::post('/admin/properties/add', 'Admin\AdminController@addProperties')->name('add_properties');
Route::get('/admin/properties/edit/{id}', 'Admin\AdminController@editProperties')->name('edit_properties');
Route::post('/admin/properties/edit/{id}', 'Admin\AdminController@editProperties')->name('edit_properties');
Route::get('/admin/profile', 'Admin\AdminController@profile');
Route::post('/admin/profile', 'Admin\AdminController@profile')->name('update_profile');

Route::get('/admin/questionaire/list', 'Admin\AdminController@questionaireList')->name('questionaire_list');
Route::post('/delete/property','Admin\AdminController@deleteProperty')->name('delete_property');
Route::post('/delete/category','Admin\AdminController@deleteCategory')->name('delete_categories');

Route::get('/admin/travel-type', 'Admin\AdminController@travelType')->name('travel_list');

Route::post('/admin/travel-type/add', 'Admin\AdminController@addTravelType')->name('add_travel');
Route::get('/admin/travel-type/add', 'Admin\AdminController@addTravelType')->name('add_travel');

Route::get('/admin/travel-type/edit/{id}', 'Admin\AdminController@editTravelType')->name('edit_travel');

Route::post('/admin/travel-type/edit/{id}', 'Admin\AdminController@editTravelType')->name('edit_travel');
Route::post('/delete/travel-type','Admin\AdminController@deleteTravelType')->name('delete_travel');