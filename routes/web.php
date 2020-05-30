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
Route::get('/myevents', 'PagesController@myevents');
Route::get('/addevent', 'PagesController@addevent');
#Route::get('/dashboard', 'PagesController@dashboard');
Route::get('/viewgroups', 'PagesController@viewgroups');
Route::get('/editgroups', 'PagesController@editgroups');

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::get('/', 'FullCalendarController@index') ->name('index');
Route::get('/load-events', 'EventController@loadEvents') ->name('routeLoadEvents');
Route::put('/events-update', 'EventController@update') ->name('routeEventUpdate');
Route::post('/events-store', 'EventController@store') ->name('routeEventStore');
Route::delete('/events-delete', 'EventController@destroy') ->name('routeEventDelete');

