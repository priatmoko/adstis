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

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
/**
 * Grouping all the route that need authentication to access it
 */
Route::group(['middleware' => 'auth'], function() {

    Route::get('profile', 'Admin\Profile\IndexController@index')->name('profile');
    Route::get('profile/setting', 'Admin\Profile\IndexController@setting')->name('profile-setting');
    Route::post('profile/store', 'Admin\Profile\FormController@store')->name('profile-store');
    Route::post('profile/password', 'Admin\Profile\PwdController@change')->name('profile-change-pwd');

    Route::get('apps', 'Admin\Apps\IndexController@index')->name('apps');
    Route::get('apps/create', 'Admin\Apps\FormController@create')->name('apps.create');
    Route::post('apps/ajax/store', 'Admin\Apps\FormController@store')->name('apps.ajax.store');
    Route::post('apps/ajax/getList', 'Admin\Apps\IndexController@getList')->name('apps.ajax.getList');

});
