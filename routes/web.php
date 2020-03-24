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
Route::get('/shopinfo','WebController@shopinfo')->name('shopinfo');

//Route::get('/index', 'SentenceController@index')->name('index');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/insert', 'insertController@insert')->name('insert');
Route::resource('insert','InsertController');
Route::resource('insertdocument','InsertDocumentController');
// Route::resource('insertdocumenttype','InsertDocumentTypeController');
// Route::resource('sentence.index','SentenceController');
