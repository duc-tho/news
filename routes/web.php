<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

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

Route::get('/headers', function (Request $request) {
    print_r($request->cookie());
    return response("")
        ->cookie("test_cookie", "test", -1);
});

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'news'], function () {
    Route::get('/{page?}', 'NewsController@index')
        ->name('news')
        ->where('page', '[0-9]+');

    Route::get('/category/{categoryId?}/{page?}', 'NewsController@category')
        ->name('categoryNews')
        ->where(['categoryId' => '[0-9]+', 'page' => '[0-9]+']);
});
