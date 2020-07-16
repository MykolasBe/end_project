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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('jobs/applied', 'JobPositionController@applied')->name('jobs.applied');
Route::resource('/jobs','JobPositionController');
Route::get('application/apply/{id}', 'ApplicationController@apply')->name('application.apply');
Route::post('application/search', 'ApplicationController@search');
Route::resource('/application','ApplicationController');
