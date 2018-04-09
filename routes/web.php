<?php

// Authentication
Route::get('/', 'AuthCtrl@create');
Route::post('/store', ['uses' => 'AuthCtrl@store', 'before' => 'csrf'])->name('login');
Route::get('/destroy', 'AuthCtrl@destroy')->name('logout');

// Register job creator
Route::get('/job_creator/create', 'job_creator_ctrl@create');
Route::post('/job_creator/store', ['uses' => 'job_creator_ctrl@store', 'before' => 'csrf']);

// Register job finder
Route::get('/job_finder/create', 'job_finder_ctrl@create');
Route::post('/job_finder/store', ['uses' => 'job_finder_ctrl@store', 'before' => 'csrf']);
Route::post('/job_finder/update', ['uses' => 'profile_controller@store', 'before' => 'csrf']);

// Admin Login and Registration
Route::get('/web_admin', 'admin_panel_controller@create');
Route::post('web_admin/login', ['uses' => 'admin_panel_controller@store', 'before' => 'csrf']);
Route::get('web_admin/register', 'admin_panel_controller@create_register');
Route::post('web_admin/register', ['uses' => 'admin_panel_controller@store_register', 'before' => 'csrf']);

// Middleware check if no session redirect to login page
Route::group(['middleware' => ['isAuthenticated']], function () {
    // Projects
    Route::get('/projects', 'project_ctrl@create');

    // Get menu
    Route::get('/profile', 'profile_controller@create');
    Route::get('/marketplace', 'job_market_controller@create');
    Route::get('/job_registration', 'job_registration_controller@create');
    Route::get('/resume', 'resume_controller@create');
    Route::get('/company_profile', 'company_profile_controller@create');
    Route::get('/history', 'job_history_controller@create');
    Route::get('/job_agreement', 'job_agreement_controller@create');

    // Get Admin menu
    Route::get('/job_registration/all', 'job_market_controller@all');
    Route::get('/resume/all', 'resume_controller@all');
    Route::get('/job_agreement/all', 'job_agreement_controller@all');

    // Profile
    Route::post('profile/store', ['uses' => 'profile_controller@store', 'before' => 'csrf']);
    Route::post('profile/skill/add', ['uses' => 'profile_controller@add_skill']);

    // Company Profile
    Route::post('company_profile/store', ['uses' => 'company_profile_controller@store', 'before' => 'csrf']);

    // Job Registration
    Route::get('job_market_regis/create_step_2', 'job_registration_controller@create_step_2');
    Route::post('job_market_regis/store_step_1', ['uses' => 'job_registration_controller@store_step_1', 'before' => 'csrf']);

    Route::get('job_market_regis/create_step_3', 'job_registration_controller@create_step_3');
    Route::post('job_market_regis/add_job_type', ['uses' => 'job_registration_controller@add_job_type']);
    Route::post('job_market_regis/store_step_2', ['uses' => 'job_registration_controller@store_step_2', 'before' => 'csrf']);

    Route::post('job_market_regis/add_skill', ['uses' => 'job_registration_controller@add_skill']);
    Route::post('job_market_regis/store_step_3', ['uses' => 'job_registration_controller@store_step_3', 'before' => 'csrf']);

    //search job
    Route::get('job_market/{id}/detail', 'job_market_controller@get_detail')->name('detail_job_market');
    Route::get('edit_detail_job_market/{id}/edit', 'job_market_controller@get_edit_detail')->name('edit_detail_job_market');
    Route::post('job_market/store', ['uses' => 'job_market_controller@store', 'before' => 'csrf']);

    // Resume
    Route::get('resume/{id}/detail', 'resume_controller@get_detail')->name('detail_resume');
    Route::get('edit_detail_resume/{id}/edit', 'resume_controller@get_edit_detail')->name('edit_detail_resume');
    Route::post('resume/store', ['uses' => 'resume_controller@store', 'before' => 'csrf']);

    //job agreement
    Route::get('job_agreement/{id}/detail', 'job_agreement_controller@get_detail')->name('detail_job_agreement');
    Route::get('job_agreement/{id}/detail_applicant', 'job_agreement_controller@get_detail_applicant')->name('detail_job_agreement_applicant');
    Route::post('job_agreement/store_applicant', ['uses' => 'job_agreement_controller@store_applicant', 'before' => 'csrf']);
    Route::post('job_agreement/store_status', ['uses' => 'job_agreement_controller@store_status', 'before' => 'csrf']);
});
