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

Route::get('/','MainController@sqlquery')->name('homeroute');

Route::get('/aboutus', function()
{
    return view('aboutus');
})->name('aboutus');

Route::post('/','MainController@indicatorquery')->name('indicatorsearch');

Route::get('/index', function()
{
    return view('index');
});

Route::match(array('GET','POST'),'/search/{query?}','MainController@searchquery')->name('searchroute');
Route::get('individualvocab/{id}','MainController@individualvocab')->name('individualvocabroute');
