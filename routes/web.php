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

// User
Route::name('user.')->namespace('User')->middleware('auth', 'check.role.admin')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

	/* Transaction In */
	Route::prefix('/transaction/in')->name('trin.')->group(function(){
		Route::get('/', 'TransactionInController@index')->name('index');
		Route::get('/add', 'TransactionInController@create')->name('create');
		Route::post('/store', 'TransactionInController@store')->name('store');
		Route::get('/edit/{id}', 'TransactionInController@edit')->name('edit');
		Route::put('/update/{id}', 'TransactionInController@update')->name('update');
		Route::delete('/delete/{id}', 'TransactionInController@destroy')->name('delete');
	});

	/* Transaction In */
	Route::prefix('/transaction/out')->name('trout.')->group(function(){
		Route::get('/', 'TransactionOutController@index')->name('index');
		Route::get('/add', 'TransactionOutController@create')->name('create');
		Route::post('/store', 'TransactionOutController@store')->name('store');
		Route::get('/edit/{id}', 'TransactionOutController@edit')->name('edit');
		Route::put('/update/{id}', 'TransactionOutController@update')->name('update');
		Route::delete('/delete/{id}', 'TransactionOutController@destroy')->name('delete');
	});
});

// Admin
Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function(){
	Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
	Route::get('/detail/{id}', 'DashboardController@show')->name('detail');
});