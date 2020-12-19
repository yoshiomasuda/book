<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;



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

// Route::get('/', function () {
//     return view('books');
// });

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'BookController@index');//トップページに表示作成
Route::post('/', 'BookController@index_update');//トップページに表示作成
Route::group(['middleware' => 'auth'], function() {

Route::get('/create', 'BookController@create');//トップページに表示作成
Route::post('/create', 'BookController@store');//トップページに登録
Route::get('/{id}/edit', 'BookController@edit');//編集に表示作成
Route::post('/{id}/edit', 'BookController@update');//編集ページに登録

Route::get('/{id}/destroy', 'BookController@destroy');
});

// $validator = Validator::make($request->all(), ['item_name' => 'required |min:3 | max:255',]);

    // //バリデーション：エラー
    // if ($validator->fails()){
    //     return redirect('/')
    //         ->withInput()
    //         ->withErrors($validator);
    // }

    
    //　Eloquent モデル
    // $books = new Book;
    // $books->item_name = $request->item_name;
    // $books->item_number = '1';
    // $books->item_amount = '1000';
    // $books->published = '2017-03-07 00:00:00';
    // $books->save();     //「/」ルートにリダイレクト

// });

