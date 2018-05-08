<?php

// Authentication
Route::get('/', 'main_controller@create')->name('index');

Route::get('/login', 'auth_controller@create')->name('getLogin');
Route::post('/login', ['uses' => 'auth_controller@store', 'before' => 'csrf'])->name('login');
Route::get('/logout', 'auth_controller@destroy')->name('logout');

// Register job creator
Route::get('/job_creator/create', 'job_creator_controller@create')->name('createJobCreator');
Route::post('/job_creator/store', ['uses' => 'job_creator_controller@store', 'before' => 'csrf']);

// Register job finder
Route::get('/job_finder/create', 'job_finder_controller@create')->name('createJobFinder');
Route::post('/job_finder/store', ['uses' => 'job_finder_controller@store', 'before' => 'csrf']);
Route::post('/job_finder/update', ['uses' => 'profile_controller@store', 'before' => 'csrf']);

// Account Verification
Route::get('/registration/verify', 'user_controller@verifyRegistration');

// Forgot Password
Route::get('/forgot-password', 'user_controller@getForgotPassword');
Route::post('/forgot-password', 'user_controller@doForgotPassword');
Route::get('/password/reset', 'user_controller@getResetPassword');
Route::post('/password/reset', 'user_controller@doResetPassword');

// Admin Login and Registration
Route::get('/web_admin', 'admin_panel_controller@create');
Route::post('web_admin/login', ['uses' => 'admin_panel_controller@store', 'before' => 'csrf']);
Route::get('web_admin/register', 'admin_panel_controller@create_register');
Route::post('web_admin/register', ['uses' => 'admin_panel_controller@store_register', 'before' => 'csrf']);

// Middleware check if no session redirect to login page
Route::group(['middleware' => ['isAuthenticated']], function () {

    // Get menu
    Route::get('/project_list', 'job_market_controller@all_per_customer');
    Route::get('/profile', 'profile_controller@create');
    Route::get('/marketplace', 'job_market_controller@create');
    
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
    Route::get('/job_registration', 'job_registration_controller@create');
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
    Route::get('detail_applicant_job_market/{id}/view_applicant', 'resume_controller@get_view_applicant')->name('detail_applicant_job_market');
    Route::get('get_detail_applicant_job_market/{id}/{job_id}/view_applicant', 'resume_controller@get_detail_applicant')->name('get_detail_applicant_job_market');   
    Route::get('detail_job_market_delete/{id}/delete_job', 'resume_controller@get_view_applicant')->name('detail_job_market_delete');
    Route::post('job_market/store', ['uses' => 'job_market_controller@store', 'before' => 'csrf']);

    // Resume
    Route::get('resume/{id}/detail', 'resume_controller@get_detail')->name('detail_resume');
    Route::get('edit_detail_resume/{id}/edit', 'resume_controller@get_edit_detail')->name('edit_detail_resume');
    Route::post('resume/store', ['uses' => 'resume_controller@store', 'before' => 'csrf']);

    //job agreement
    Route::get('job_agreement/{id}/edit_detail', 'job_agreement_controller@edit_detail')->name('edit_detail_job_agreement');
    Route::get('job_agreement/{id}/detail', 'job_agreement_controller@get_detail')->name('detail_job_agreement');
    Route::get('job_agreement/{id}/detail_applicant', 'job_agreement_controller@get_detail_applicant')->name('detail_job_agreement_applicant');
    Route::post('job_agreement/store_applicant', ['uses' => 'job_agreement_controller@store_applicant', 'before' => 'csrf']);
    Route::post('job_agreement/store_status', ['uses' => 'job_agreement_controller@store_status', 'before' => 'csrf']);
    Route::get('update_status_job_agreement_finish/{id}/{job_id}/edit', 'job_agreement_controller@update_status_review')->name('update_status_job_agreement_finish');
    Route::get('update_status_job_agreement_review/{id}/{job_id}/edit', 'job_agreement_controller@update_status_finish_review')->name('update_status_job_agreement_review');
    

    //job agreement job finder approval
    Route::get('job_history/{id}/job_history_detail', 'job_history_controller@job_history_detail')->name('job_history_detail');

    // chat
    Route::get('/job/{job_id}/{finder_id}/chat', 'chat_controller@get_chat')->name('load_chat');
    Route::post('/job/{job_id}/{finder_id}chat', 'chat_controller@send_chat')->name('send_chat');
    
});
