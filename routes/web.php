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

/**
 * WEB Routes
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
    Route::post('contact', 'HomeController@postContact')->name('postContact');
    Route::get('experience', 'HomeController@experience')->name('experience');
});

Route::resource('blog', 'BlogController')->only(['index', 'show']);

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
    'namespace' => 'Admin',
    'middleware' => ['auth']
], function() {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::resource('project', 'ProjectController')->only(['create', 'edit']);
    Route::resource('blog', 'BlogController')->only(['index', 'create', 'edit']);
    Route::resource('tag', 'TagController')->only(['index', 'create', 'edit']);
    Route::resource('experience', 'ExperienceController')->only(['index', 'create', 'edit']);
    Route::resource('setting', 'SiteSettingController')->only(['index', 'create', 'edit']);
});

/**
 * API Routes
 */
Route::group([
    'prefix' => 'api',
    'namespace' => 'API',
    'as' => 'api.',
], function () {
    Route::group([
        'prefix' => 'admin',
        'as' => 'admin.',
        'middleware' => ['auth'],
    ], function () {
        Route::resource('project', 'ProjectController')->only(['store', 'update', 'destroy']);
        Route::resource('blog', 'BlogController')->only(['store', 'update', 'destroy']);
        Route::resource('tag', 'TagController')->only(['index', 'store', 'update', 'destroy']);
        Route::resource('experience', 'ExperienceController')->only(['index', 'store', 'update', 'destroy']);
        Route::resource('setting', 'SiteSettingController')->only(['index', 'store', 'update', 'destroy']);
    });
});
