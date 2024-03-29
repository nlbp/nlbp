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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');

// books management.
Route::post('books/results', 'Books\BookController@results');
Route::get('books/results', 'Books\BookController@results')->name('bookresults');
Route::get('books/{id}/remove', 'Books\BookController@remove')->where('id', '[0-9]+')->name('removebook');
Route::resource('books', 'Books\BookController');

// search book
Route::get('search', 'Books\SearchController@search')->name('SearchBook');
Route::get('search/results', 'Books\SearchController@results')->name('SearchResults');
Route::post('search/results', 'Books\SearchController@results');
Route::get('search/{id}', 'Books\SearchController@show')->name('ShowSearch');

// reading
Route::get('reading', 'Reading\PersonController@index');
Route::get('reading/person/create', 'Reading\PersonController@create');
Route::post('reading/person/store', 'Reading\PersonController@store');
Route::get('reading/person/checkbook', 'Reading\PersonController@checkBook');
Route::get('reading/person/confirm', 'Reading\PersonController@confirm');
Route::get('reading/person/{id}', 'Reading\PersonController@show')->where('id', '[0-9]+');
Route::put('reading/person/{id}', 'Reading\PersonController@updateStatus')->where('id', '[0-9]+');
Route::get('reading/settings/status', 'Reading\StatusController@index')->middleware('role:admin');
Route::post('reading/settings/status', 'Reading\StatusController@store');

// systems
Route::get('setting/passport/client', 'System\SettingController@passportClients');
Route::get('setting/passport/authorized', 'System\SettingController@passportAuthorized');

// Exports
Route::get('export/excel/create', 'Export\ExcelController@create');
Route::post('export/excel/download', 'Export\ExcelController@export');

// Storage
Route::get('storage', 'Export\ExcelController@create');

// test
Route::get('test/datatable', 'Test\TestController@dataIndex');
Route::any('test/data', 'Test\TestController@data');
Route::get('test/jquery', 'Test\TestController@jquery');
Route::get('test/excel', 'Test\TestController@excel');
Route::get('test/vue', 'Test\TestController@vue');
Route::get('test/api', 'Test\TestController@TestApi');
Route::get('test/resource', 'Test\TestController@resourceIndex');
