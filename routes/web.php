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

Route::group(['prefix' => LaravelLocalization::setLocale()], function() {
    Route::get('/', 'ContactController@showForm')->name('form');
    Route::post('/', 'ContactController@confirm');
    Route::get('/confirm', 'ContactController@showConfirm')->name('confirm');
    Route::post('/confirm', 'ContactController@send');
    Route::get('/finish', 'ContactController@showFinish')->name('finish');
});
