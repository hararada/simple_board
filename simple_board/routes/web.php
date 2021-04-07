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

Route::get('/', 'MessagesController@index');

Route::resource('messages', 'MessagesController');

//個別詳細ページ表示
// Route::get('messages/{id}', 'MessagesController@show');
//新規登録処理
// Route::post('messages', 'MessagesController@store');
//更新処理
// Route::put('messages/{id}', 'MessagesController@update');
//削除処理
// Route::delete('messages/{id}', 'MessagesController@destroy');

//一覧ページindex(showの補助)
// Route::get('messages', 'MessagesController@index'))->name('messages.index');
//新規作成フォーム
// Route::get('messages/create', 'MessagesController@create'))->name('messages.create');
//更新フォーム
// Route::get('messages/{id}/edit', 'MessagesController@edit')->name('messages.edit');
