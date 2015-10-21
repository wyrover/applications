<?php

/* Redirect to login route on / */
get('/', function () {
    return view('auth/login');
});
if (App::environment('local')) {
    /* Domain Routes */
    Route::group(['domain' => '{account}.applications.app'], function () {

        /* Submission of a application */
        get('application', 'ApplicationSubmissionController@create');
        post('application', 'ApplicationSubmissionController@store');

        get('reference/{code}', 'ApplicationSubmissionController@reference');
        post('reference/{code}', 'ApplicationSubmissionController@postReference');

        Route::group(['middleware' => 'auth'], function () {


            // Application Routes
            Route::any('applications/export/application/{id}', 'ApplicationsController@exportApplication');
            get('applications/export/{id}/profile', 'ApplicationsController@exportProfile');
            get('applications/export/exportReferee/{id}', 'ApplicationsController@exportReferee');
            resource('applications', 'ApplicationsController');

            // References Routes
            get('references/new', 'ReferencesController@create');
            post('references/new', 'ReferencesController@store');
            Route::any('references/{id}/delete', 'ReferencesController@destroy');
            resource('references', 'ReferencesController');

            // User Profile
            get('profile', 'ProfileController@index');
            post('profile', 'ProfileController@store');

            // Settings
            get('settings/{id}', 'SettingsController@showFieldSet');
            Route::any('settings/refs/{id}', 'SettingsController@updateRefs');
            post('settings', 'SettingsController@update');
            resource('settings', 'SettingsController');
        });
        // Admin
        // Accounts

        get('admin/account/create', 'AdminController@create');
        post('admin/account', 'AdminController@store');
        get('admin/account/{id}/edit', 'AdminController@edit');
        get('admin/account/{id}/delete', 'AdminController@delete');
        Route::any('admin/account/update/{id}', 'AdminController@update');

        // Support Request Route
        post('support', 'SupportController@send');

    });
// Dashboard
    get('dashboard', 'DashboardController@index');
// Authentication routes...
    get('auth/login', 'Auth\AuthController@getLogin');
    get('login', 'Auth\AuthController@getLogin');
    post('auth/login', 'Auth\AuthController@postLogin');
    get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
    get('password/email', 'Auth\PasswordController@getEmail');
    post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
    get('password/reset/{token}', 'Auth\PasswordController@getReset');
    post('password/reset', 'Auth\PasswordController@postReset');
}
else {
    /* Domain Routes */
    Route::group(['domain' => '{account}.madesimpleltd.co.uk'], function () {

        /* Submission of a application */
        get('application', 'ApplicationSubmissionController@create');
        post('application', 'ApplicationSubmissionController@store');

        get('reference/{code}', 'ApplicationSubmissionController@reference');
        post('reference/{code}', 'ApplicationSubmissionController@postReference');

        Route::group(['middleware' => 'auth'], function () {


            // Application Routes
            Route::any('applications/export/application/{id}', 'ApplicationsController@exportApplication');
            get('applications/export/{id}/profile', 'ApplicationsController@exportProfile');
            get('applications/export/exportReferee/{id}', 'ApplicationsController@exportReferee');
            resource('applications', 'ApplicationsController');

            // References Routes
            get('references/new', 'ReferencesController@create');
            post('references/new', 'ReferencesController@store');
            Route::any('references/{id}/delete', 'ReferencesController@destroy');
            resource('references', 'ReferencesController');

            // User Profile
            get('profile', 'ProfileController@index');
            post('profile', 'ProfileController@store');

            // Settings
            get('settings/{id}', 'SettingsController@showFieldSet');
            Route::any('settings/refs/{id}', 'SettingsController@updateRefs');
            post('settings', 'SettingsController@update');
            resource('settings', 'SettingsController');
        });
        // Admin
        // Accounts

        get('admin/account/create', 'AdminController@create');
        post('admin/account', 'AdminController@store');
        get('admin/account/{id}/edit', 'AdminController@edit');
        get('admin/account/{id}/delete', 'AdminController@delete');
        Route::any('admin/account/update/{id}', 'AdminController@update');

        // Support Request Route
        post('support', 'SupportController@send');

    });
// Dashboard
    get('dashboard', 'DashboardController@index');
// Authentication routes...
    get('auth/login', 'Auth\AuthController@getLogin');
    get('login', 'Auth\AuthController@getLogin');
    post('auth/login', 'Auth\AuthController@postLogin');
    get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
    get('password/email', 'Auth\PasswordController@getEmail');
    post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
    get('password/reset/{token}', 'Auth\PasswordController@getReset');
    post('password/reset', 'Auth\PasswordController@postReset');
}