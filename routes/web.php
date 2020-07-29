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

Auth::routes(['register' => false]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/recruit', 'HomeController@recruit')->name('recruit');
Route::get('/lease', 'HomeController@lease')->name('lease');
Route::get('/consult', 'HomeController@consult')->name('consult');

Route::get('jobs/applied', 'JobPositionController@applied')->name('jobs.applied');
Route::post('jobs/searchJob', 'JobPositionController@searchJob');
Route::post('jobs/searchApplied', 'JobPositionController@searchApplied');
Route::resource('/jobs','JobPositionController');

Route::get('application/apply/{id}', 'ApplicationController@apply')->name('application.apply');
Route::post('application/search', 'ApplicationController@searchApplication');
Route::resource('/application','ApplicationController');
