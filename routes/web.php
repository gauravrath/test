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
    return view('auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'as'=>'admin.', 'middleware' => ['is_admin']], function(){
    Route::get('project','ProjectController@index')->name('project');
    Route::post('add_project','ProjectController@store')->name('add_project');


    Route::get('worker','WorkerController@index')->name('worker');
    Route::post('add_Worker','WorkerController@store')->name('add_worker');

    
    Route::post('assign_project','WorkerController@assign_project')->name('assign_project');
    Route::post('markedWorker','ProjectController@markedWorker')->name('markedWorker');


    Route::get('assignedwork/{id}','ProjectController@assignedwork')->name('assignedwork');
});

Route::group(['prefix' => 'worker', 'as'=>'worker.', 'middleware' => ['is_worker']], function(){
    Route::get('assignedproject','WorkerController@assignedproject')->name('assignedproject');
});