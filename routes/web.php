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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/store-pendidikan', 'HomeController@store_pendidikan')->name('store_pendidikan');
Route::post('/store-pelatihan', 'HomeController@store_pelatihan')->name('store_pelatihan');
Route::post('/store-rk', 'HomeController@store_rk')->name('store_rk');

Route::get('/delete-pendidikan/{id?}', 'HomeController@delete_pendidikan')->name('delete_pendidikan');
Route::get('/delete-pelatihan/{id?}', 'HomeController@delete_pelatihan')->name('delete_pelatihan');
Route::get('/delete-rk/{id?}', 'HomeController@delete_rk')->name('delete_rk');

Route::group(['prefix'=>'biodata','as'=>'biodata.'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'Biodata\BiodataController@index']);
    Route::get('/form', ['as' => 'form', 'uses' => 'Biodata\BiodataController@form']);
    Route::get('/form-edit/{id?}', ['as' => 'form_edit', 'uses' => 'Biodata\BiodataController@form_edit']);
    Route::post('/store-biodata', ['as' => 'store_biodata', 'uses' => 'Biodata\BiodataController@store_biodata'])->name('store-biodata');
    Route::post('/update-biodata', ['as' => 'update_biodata', 'uses' => 'Biodata\BiodataController@update_biodata'])->name('update-biodata');
    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'Biodata\BiodataController@datatable']);
    Route::get('/detail/{id?}', ['as' => 'detail', 'uses' => 'Biodata\BiodataController@detail']);
});


Route::group(['prefix'=>'user','as'=>'user.'], function(){
    Route::get('/', ['as' => 'index', 'uses' => 'Administrator\UserController@index']);
    Route::get('/datatable', ['as' => 'datatable', 'uses' => 'Administrator\UserController@datatable']);
    Route::post('/store', ['as' => 'store', 'uses' => 'Administrator\UserController@store']);
    Route::get('/delete-user/{id?}', ['as' => 'delete_user', 'uses' => 'Administrator\UserController@delete_user']);
});
