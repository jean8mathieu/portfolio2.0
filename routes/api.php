<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'namespace' => 'API',
    'as' => 'api.'
], function () {
    Route::group([
        'middleware' => ['auth'],
        'prefix' => 'admin',
        'as' => 'admin.',
    ], function () {
        Route::resource('project', 'ProjectController')->only(['store', 'update', 'destroy']);
        Route::resource('tag', 'TagController')->only(['store', 'update', 'destroy']);
    });
});
