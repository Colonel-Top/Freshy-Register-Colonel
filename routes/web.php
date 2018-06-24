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
Route::prefix('staff')->group(function () {
    Route::get('/abandon', 'UserController@logouts')->name('logouts');

    Route::post('/searchname', 'UserController@searchname')->name('searchname');
    Route::post('/searchfaculty', 'UserController@searchfaculty')->name('searchfaculty');
    Route::post('/searchcode', 'UserController@searchcode')->name('searchcode');
    Route::get('/show/{id}', 'UserController@showunique')->name('showunique');
    Route::get('/approval', 'UserController@goapp')->name('goapp');
    Route::get('/ap/{id}', 'UserController@entry')->name('entry');
    Route::get('/ab/{id}', 'UserController@abandon')->name('abandon');
    Route::get('/', 'HomeController@index')->name('indexhome');


});
Route::get('/about', 'FreshyController@about')->name('about');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/reg', 'FreshyController@index')->name('freshy');
Route::get('/search', 'FreshyController@searchindex')->name('searchindex');
Route::get('/searchlost', 'FreshyController@searchlostindex')->name('searchlostindex');
Route::post('/searchresult', 'FreshyController@search')->name('search-query');
Route::post('/searchlostresult', 'FreshyController@searchlost')->name('search-lost-query');
Route::post('/process', 'FreshyController@insert')->name('freshy-reg');
Route::post('/validate', 'FreshyController@checkfirst')->name('freshy-validate');
Route::post('/redirectback', 'FreshyController@redirectback')->name('redirectback');
Route::get('/result', 'FreshyController@done')->name('freshy-done');
Route::get('/', 'FreshyController@frontindex')->name('index');
Route::get('/s', 'FreshyController@frontindex2')->name('index2');
Auth::routes();
