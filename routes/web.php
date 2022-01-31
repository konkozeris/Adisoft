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

Route::prefix('articles')->group(function () {

    Route::get('','App\Http\Controllers\ArticleController@index')->name('article.index');
    Route::get('list','App\Http\Controllers\ArticleController@list')->name('article.list');
    Route::get('create', 'App\Http\Controllers\ArticleController@create')->name('article.create');
    Route::post('store', 'App\Http\Controllers\ArticleController@store')->name('article.store');
    Route::get('edit/{article}', 'App\Http\Controllers\ArticleController@edit')->name('article.edit');
    Route::post('update/{article}', 'App\Http\Controllers\ArticleController@update')->name('article.update');
    Route::post('delete/{article}', 'App\Http\Controllers\ArticleController@destroy' )->name('article.delete');
    Route::get('show/{article}', 'App\Http\Controllers\ArticleController@show')->name('article.show');

});

Route::prefix('comments')->group(function () {

    Route::post('store', 'App\Http\Controllers\CommentController@store')->name('comment.store');
    Route::post('delete/{comment}', 'App\Http\Controllers\CommentController@destroy' )->name('comment.delete');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


