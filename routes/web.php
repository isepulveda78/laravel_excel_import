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

Route::get('/file', 'FileController@index');
Route::post('/file/import', 'FileController@store');

Route::resource('/pdf', 'PdfController');
Route::post('/pdf/store', 'PdfController@store');

Route::get('/download-pdf/{pdf}', 'PdfController@pdf')->name('download.pdf');

Route::resource('/sap', 'SAPController');