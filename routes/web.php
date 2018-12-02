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

Auth::routes();

Route::middleware([
    'auth',
])->group(function () {
    Route::get('/admin', 'AdminController@home');
});

Route::middleware([
    'auth',
    'role:admin'
])->group(function () {
    Route::get('/admin/users', 'AdminController@users');
    Route::post('/admin/users', 'AdminController@addUser');
    Route::get('/admin/login/{id}', 'AdminController@login');
});

Route::get('/admin/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/blog/{blog}', 'AppController@blog');

// Custom site routes
Route::get('/', 'AppController@home');
Route::get('/{page}', 'AppController@page');
// 
