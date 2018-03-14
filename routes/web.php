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
Route::post('profile/skill/add', ['uses' => 'ProfileController@addSkill']);

// Company Profile
Route::post('companyprofile/store', ['uses' => 'CompanyProfileController@store', 'before' => 'csrf']);

// Job Registration
Route::get('jobmarketregis/createstep2', 'JobRegistrationController@createstep2');
Route::post('jobmarketregis/storestep1', ['uses' => 'JobRegistrationController@storestep1', 'before' => 'csrf']);

Route::get('jobmarketregis/createstep3', 'JobRegistrationController@createstep3');
Route::post('jobmarketregis/addjobtype', ['uses' => 'JobRegistrationController@addJobType']);
Route::post('jobmarketregis/storestep2', ['uses' => 'JobRegistrationController@storestep2', 'before' => 'csrf']);

Route::post('jobmarketregis/addskill', ['uses' => 'JobRegistrationController@addSkill']);
Route::post('jobmarketregis/storestep3', ['uses' => 'JobRegistrationController@storestep3', 'before' => 'csrf']);

// Resume
Route::get('resume/{id}/detail', 'ResumeController@getDetail')->name('detailResume');