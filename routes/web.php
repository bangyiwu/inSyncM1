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
Route::get('/myevents/{id}', 'EventController@show');
Route::get('/addevent', 'PagesController@addevent');
#Route::get('/dashboard', 'PagesController@dashboard');

Route::get('/editgroups', 'PagesController@editgroups');
Route::get('/viewgroups', 'GroupController@mygroups' )->name('viewgroups');
Route::get('/viewgroups/schedule', 'ScheduleController@index' );
Route::post('/viewgroups/date', 'ScheduleController@date');
Route::get('/viewgroups/time', function(){return view('pages.time');
});
Route::get('/viewgroups/{start}', 'ScheduleController@schedule' );


Route::get('/editgroups', 'GroupController@index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::get('/calendar', 'FullCalendarController@index') ->name('index');
Route::get('/load-events', 'EventController@loadEvents') ->name('routeLoadEvents');
Route::put('/events-update', 'EventController@update') ->name('routeEventUpdate');
Route::post('/events-store', 'EventController@store') ->name('routeEventStore');
Route::delete('/events-delete', 'EventController@destroy') ->name('routeEventDelete');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/editgroups-delete', 'GroupController@destroy')->name('groupDelete');
Route::get('/editgroups-edit', 'GroupController@edit')->name('groupEdit');
Route::get('/editgroups-store', 'GroupController@store')->name('groupStore');


Route::resource('/editgroups/groups', 'GroupController', ['except' => ['show']]);
