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

// Authentication
Route::get('/', 'LoginCtrl@getLogin');
Route::post('/login', ['uses' => 'LoginCtrl@doLogin', 'before' => 'csrf']);
// Projects
Route::get('/projects', 'ProjectCtrl@getProject');
Route::resource('JCRegis', 'JobCreateModelController');
//register job creator
Route::get('/register', 'RegisterCtrl@create');
Route::post('/register/store', ['uses' => 'RegisterCtrl@store', 'before' => 'csrf']);
//register job finder
Route::get('/JobFinder/create', 'JobFinderCtrl@create');
Route::post('/JobFinder/store', ['uses' => 'JobFinderCtrl@store', 'before' => 'csrf']);
//login job creator
Route::get('/LoginJC/create', 'LoginJCController@create');
Route::post('/LoginJC/store', ['uses' => 'LoginJCController@store', 'before' => 'csrf']);
//login job finder
Route::get('/LoginJF/create', 'LoginJFController@create');
Route::post('/LoginJF/store', ['uses' => 'LoginJFController@store', 'before' => 'csrf']);