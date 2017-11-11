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

Route::get('/', 'LoginCtrl@getLogin');
Route::post('/login', ['uses' => 'LoginCtrl@doLogin', 'before' => 'csrf']);
Route::get('/projects', 'ProjectCtrl@getProject');
Route::resource('JCRegis', 'JobCreateModelController');
Route::get('/register', 'RegisterCtrl@create');
Route::post('/register/store', 'RegisterCtrl@store');