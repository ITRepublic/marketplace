<?php

use App\menurepo;

// Authentication
Route::get('/', 'AuthCtrl@create');
Route::post('/store', ['uses' => 'AuthCtrl@store', 'before' => 'csrf'])->name('login');
Route::get('/destroy', 'AuthCtrl@destroy')->name('logout');

// Register job creator
Route::get('/jobCreator/create', 'JobCreatorCtrl@create');
Route::post('/jobCreator/store', ['uses' => 'JobCreatorCtrl@store', 'before' => 'csrf']);

// Register job finder
Route::get('/jobFinder/create', 'JobFinderCtrl@create');
Route::post('/jobFinder/store', ['uses' => 'JobFinderCtrl@store', 'before' => 'csrf']);
Route::post('/jobFinder/update', ['uses' => 'ProfileController@store', 'before' => 'csrf']);

// Projects
Route::get('/projects', 'ProjectCtrl@create');

// Get menu from DB
$menulist = menurepo::select('usermenuid', 'menuname', 'urlroutemenu', 'routemenu')
->leftJoin('mastermenu', 'mastermenu.menuid', '=', 'usermenu.menuid')
->get();

foreach($menulist as $menu) {
    Route::get($menu->urlroutemenu,$menu->routemenu);
}

// Profile
Route::post('profile/store', ['uses' => 'ProfileController@store', 'before' => 'csrf']);


// Job Registration
Route::post('jobmarketregis/store', ['uses' => 'JobRegistrationController@store', 'before' => 'csrf']);
