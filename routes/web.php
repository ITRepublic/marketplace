<?php

// Authentication
Route::get('/', 'AuthCtrl@create');
Route::post('/store', 'AuthCtrl@store')->name('login');
Route::get('/destroy', 'AuthCtrl@destroy')->name('logout');

// Register job creator
Route::get('/jobCreator/create', 'JobCreatorCtrl@create');
Route::post('/jobCreator/store', ['uses' => 'JobCreatorCtrl@store', 'before' => 'csrf']);

// Register job finder
Route::get('/jobFinder/create', 'JobFinderCtrl@create');
Route::post('/jobFinder/store', ['uses' => 'JobFinderCtrl@store', 'before' => 'csrf']);

// Projects
Route::get('/projects', 'ProjectCtrl@create');