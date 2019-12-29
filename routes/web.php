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

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group([
    'as' => 'home.'
], function() {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('tag/{tag}', 'HomeController@tag')->name('tag');
    Route::get('about', 'HomeController@about')->name('about');
    Route::get('contact', 'HomeController@contact')->name('contact');
});

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function() {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::resource('project', 'ProjectController')->only(['create', 'edit']);
    Route::resource('tag', 'TagController')->only(['index', 'create', 'edit']);
});
