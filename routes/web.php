<?php

use App\Http\Controllers\PDFController;

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


Route::get('/', 'PagesController@index');

Route::get('/marketing', 'PagesController@marketing');
Route::get('/dashboard', 'DashboardController@index');
Route::post('subcase/create/{id}', 'SubCaseController@create');
Route::get('/customer/read', 'CustomerController@read');
Route::get('/projectcase/read', 'ProjectCaseController@read');
Route::get('/projectcase/showread/{id}', 'ProjectCaseController@showread');
Route::get('/planning/read/{id}', 'PlanningController@read');


Auth::routes();

Route::post('/subcase/hrs/{id}', 'SubCaseController@hrs');
Route::resource('/subcase', 'SubCaseController');
Route::resource('/projectcase', 'ProjectCaseController');
Route::resource('/customer', 'CustomerController');


Route::resource('/PDF', 'PDFController');

//Mapping the plans
Route::resource('/planning', 'PlanningController');
Route::put('/update/{id}', 'PlanningController@update');
Route::put('projectcase/updatestatus/{id}', 'ProjectCaseController@updatestatus');
Route::patch('/visibility/{Deliverables}', 'PlanningController@visibility');



