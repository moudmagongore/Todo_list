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

Route::get('/', 'AccueilController@index')->name('index');

Route::get('/index', 'TacheController@index')->name('tache.index');

Route::post('ajout-tache', 'TacheController@postTache')->name('post.tache');

Route::post('edit-tache/{id}', 'TacheController@update')->name('edit.tache');

Route::post("complete-tache/{id}", "TacheController@complete")->name('complete.tache');

Route::post("complete-tache-destroy/{id}", "TacheController@destroy")->name('complete.tache.destroy');

Route::get('terminer/{id}', 'TacheController@terminer')->name('terminer');

