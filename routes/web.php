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

// Get menu
Route::get('/profile', 'ProfileController@create');
Route::get('/marketplace', 'JobMarketController@create');
Route::get('/jobregistration', 'JobRegistrationController@create');
Route::get('/resume', 'ResumeController@create');
Route::get('/companyprofile', 'CompanyProfileController@create');
Route::get('/history', 'JobHistoryController@create');
Route::get('/jobagreement', 'JobAgreementController@create');

// Get Admin menu
Route::get('/adminlogin', 'AdminPanelController@create');
Route::post('adminpanel/adminloginconfirm', ['uses' => 'AdminPanelController@store', 'before' => 'csrf']);
Route::get('adminpanel/register', 'AdminPanelController@createregister');
Route::post('adminpanel/storeregister', ['uses' => 'AdminPanelController@storeregister', 'before' => 'csrf']);
Route::get('/jobregistration/all', 'JobMarketController@all');
Route::get('/resume/all', 'ResumeController@all');
Route::get('/jobagreement/all', 'JobAgreementController@all');

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

//search job
Route::get('jobmarket/{id}/detail', 'JobMarketController@getDetail')->name('detailJobMarket');
Route::get('editdetailJobMarket/{id}/detail', 'JobMarketController@getEditDetail')->name('editdetailJobMarket');
Route::post('jobmarket/store', ['uses' => 'JobMarketController@store', 'before' => 'csrf']);
// Resume
Route::get('resume/{id}/detail', 'ResumeController@getDetail')->name('detailResume');
Route::get('editdetailResume/{id}/detail', 'ResumeController@getEditDetail')->name('editdetailResume');
Route::post('resume/store', ['uses' => 'ResumeController@store', 'before' => 'csrf']);


//job agreement
Route::get('jobagreement/{id}/detail', 'JobAgreementController@getDetail')->name('detailJobAgreement');
Route::get('jobagreement/{id}/detailApplicant', 'JobAgreementController@getDetailApplicant')->name('detailJobAgreementApplicant');
Route::post('jobagreement/storeapplicant', ['uses' => 'JobAgreementController@storeapplicant', 'before' => 'csrf']);
Route::post('jobagreement/storestatus', ['uses' => 'JobAgreementController@storestatus', 'before' => 'csrf']);
