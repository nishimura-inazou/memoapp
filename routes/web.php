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

//Route::resource('memo','MemoController');
Route::get('memo','MemoController@index')->name('memo.index');
Route::post('memo','MemoController@store')->name('memo.store');
Route::get('memo/create','MemoController@create')->name('memo.create');
Route::get('memo{memo}','MemoController@show')->name('memo.show');
Route::put('memo{memo}','MemoController@update')->name('memo.update');
Route::delete('memo{memo}','MemoController@destroy')->name('memo.destroy');
Route::get('memo{memo}/edit','MemoController@edit')->name('memo.edit');





Route::resource('dustbox','DustboxController');
Route::get('/all-del','DustboxController@all_del');

/*
Route::get('test','MemoController@test_get');
Route::post('test','MemoController@test_post');
*/
Route::any('test','MemoController@test');
