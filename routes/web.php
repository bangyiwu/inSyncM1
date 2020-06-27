<?php

use Illuminate\Support\Facades\Route;
use App\Group;

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
Route::get('/viewgroups/schedule/{group_id}', 'ScheduleController@index' );
Route::get('/viewgroups/events/{group_id}', 'ScheduleController@show' );
Route::post('/viewgroups/date', 'ScheduleController@date');
Route::get('/groupevents/{id}', 'GroupEventController@show');
Route::get('/viewgroups/time', function(){return view('pages.time');
});


Route::get('/editgroups', 'GroupController@index');

Auth::routes();

Route::get('/dashboard', 'HomeController@index');

Route::get('/calendar', 'FullCalendarController@index') ->name('index');
Route::get('/load-events', 'EventController@loadEvents') ->name('routeLoadEvents');
Route::put('/events-update', 'EventController@update') ->name('routeEventUpdate');
Route::post('/events-store', 'EventController@store') ->name('routeEventStore');
Route::delete('/events-delete', 'EventController@destroy') ->name('routeEventDelete');

Route::delete('/fast-events-destroy', 'FastEventController@destroy') ->name('routeFastEventDelete');
Route::put('/fast-events-update', 'FastEventController@update') ->name('routeFastEventUpdate');
Route::post('/fast-events-store', 'FastEventController@store') ->name('routeFastEventStore');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/editgroups-delete', 'GroupController@destroy')->name('groupDelete');
Route::get('/editgroups-edit', 'GroupController@edit')->name('groupEdit');
Route::get('/editgroups-store', 'GroupController@store')->name('groupStore');

Route::put('/editgroupname/{groupID}', 'GroupController@editGroupName')->name('group.editName');

Route::get('editgroups/groups/{id}/members', 'GroupController@members')->name('groupMembers');
Route::resource('/editgroups/groups', 'GroupController', ['except' => ['show']]);

Route::get('/editgroups/groups/{id}/members/{userID}', 'GroupController@removeMember')->name('remove.member');

Route::post('/group-events-store', 'GroupEventController@store') ->name('routeGroupEventStore');
Route::put('/group-events-update', 'GroupEventController@update') ->name('routeGroupEventUpdate');
Route::delete('groupevents/delete/{id}', ['as' => 'groupEvent.delete', 'uses' => 'GroupEventController@destroy']);
Route::get('/searchforgroup/{groupID}', 'GroupController@searchForGroup');

Route::get('editgroups/groups/addmember/{groupID}/{userID}', 'GroupController@addMember')->name('groups.addMember');
Route::get('/makeadmin/{groupID}/{userID}', 'GroupController@makeAdmin')->name('groups.makeAdmin');
Route::get('/revokeadmin/{groupID}/{userID}', 'GroupController@revokeAdmin')->name('groups.revokeAdmin');

Route::get('/leavegroup/{groupID}', 'GroupController@leaveGroup')->name('groups.leave');
