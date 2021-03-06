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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/tasks', 'TasksController');

Route::post('/tasks/{task}/start', 'TasksController@start');

Route::post('/tasks/{task}/stop', 'TasksController@stop');

Route::resource('/users', 'UsersController');

// Route::get('/email_task', 'TasksController@email');
