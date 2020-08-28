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

Route::group([

		'middleware' => 'App\Http\Middleware\Auth',

], function(){

Route::get('/home', 'TacheController@index')->name('tache.index');

Route::get('ajout-tache', 'TacheController@getTache')->name('get.tache');
Route::post('ajout-tache', 'TacheController@postTache')->name('post.tache');

Route::post('edit-tache/{id}', 'TacheController@update')->name('edit.tache');

Route::post('complete-tache/{id}', 'TacheController@complete')->name('complete.tache');

Route::post('tache-destroy/{id}', 'TacheController@destroy')->name('tache.destroy');

Route::post('store', 'Auth\RegisterController@store')->name('store');

Route::get('/mon-compte', 'CompteController@index')->name('mon-compte');

Route::post('/mon-copte', 'CompteController@modificationMotDePasse')->name('modification-mot-de-passe');
});

Auth::routes();


