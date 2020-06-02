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


#Route::get('/', 'FullCalendarController@index') ->name('index');

Route::get('/', 'PagesController@index');
Route::get('/myevents', 'EventController@index');
Route::get('/addevent', 'PagesController@addevent');
#Route::get('/dashboard', 'PagesController@dashboard');
Route::get('/editgroups', 'PagesController@editgroups');
Route::get('/viewgroups', 'UserController@index' );

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::get('/calendar', 'FullCalendarController@index') ->name('index');
Route::get('/load-events', 'EventController@loadEvents') ->name('routeLoadEvents');
Route::put('/events-update', 'EventController@update') ->name('routeEventUpdate');
Route::post('/events-store', 'EventController@store') ->name('routeEventStore');
Route::delete('/events-delete', 'EventController@destroy') ->name('routeEventDelete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
