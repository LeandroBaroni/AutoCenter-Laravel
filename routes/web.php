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

Route::namespace('\App\Http\Controllers\Site')->group(function(){
    Route::get('/', 'HomeController')->name('site.home');

    Route::view('/Sobre', 'site.about.index')->name('site.about');

    Route::get('Contato', 'ContactController@index')->name('site.contact');
    Route::post('Contato', 'ContactController@form')->name('site.contact.form');
});
