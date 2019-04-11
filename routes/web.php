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

Route::get('/', 'WebController@index')->name('welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/card', 'HomeController@index');
Route::post('/card', 'WebController@event_step')->name('event.step');

Route::get('/card/{id}', 'WebController@card_step')->name('card.step');
Route::post('/card/generate', 'WebController@generate')->name('generate.step');
Route::get('/card/generate/{id}', 'WebController@result')->name('result.step');





Route::prefix('admin')->middleware(['role:Super Admin'])->group(function() {

    Route::get('/', 'AdminController@index')->name('admin.index');
    Route::resource('/events', 'EventController');
    Route::resource('/cards', 'CardController');
    Route::resource('/fonts', 'FontController');

});
