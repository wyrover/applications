<?php


use Illuminate\Support\Facades\App;

get('/', function () {
    return view('auth/login');
});

// LIVE ENV
if (App::environment('production')) {

    Route::post('updateNotifications', 'DashboardController@updateNotifications');


    /* Domain Routes */
    Route::group(['domain' => '{account}.madesimpleapp.co.uk'], function () {

        /* Redirect to login */
        get('/', function () {
            //dd(url('/application/submitReference'));
            return view('auth/login');
        });

        /* Reference Submission */
        get('application/{code}/submitReference', 'ApplicationSubmissionController@postReference');
        post('application/{code}/submitReference', 'ApplicationSubmissionController@refereeSubmitted');
        get('application/{code}/reference', 'ApplicationSubmissionController@postReferenceTwo');
        post('application/{code}/reference', 'ApplicationSubmissionController@refereeSubmittedTwo');

        /* Submission of a application */
        get('reference/{code}/submit', 'ReferencesController@submitReference');
        post('reference/{code}/submit', 'ReferencesController@postReference');

        get('application', 'ApplicationSubmissionController@create');
        post('application', 'ApplicationSubmissionController@store');

        get('reference/{code}', 'ApplicationSubmissionController@reference');
        post('reference/{code}', 'ApplicationSubmissionController@postReference');



        Route::group(['middleware' => 'auth'], function () {


            // Application Routes
            Route::any('applications/export/application/{id}', 'ApplicationsController@exportApplication');
            get('applications/export/{id}/profile', 'ApplicationsController@exportProfile');
            get('applications/export/exportReferee/{id}', 'ApplicationsController@exportReferee');
            get('applications/export/exportRefereeTwo/{id}', 'ApplicationsController@exportRefereeTwo');
            resource('applications', 'ApplicationsController');

            // References Routes

            Route::any('references/export/{id}', 'ReferencesController@export');
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

            // Notes
            get('applications/{id}/notes', 'NotesController@index');
            Route::any('applications/notes/create', 'NotesController@store');
            get('applications/notes/{id}/delete', 'NotesController@delete');
        });
        // Admin
        // Accounts

        get('admin/account/create', 'AdminController@create');
        post('admin/account', 'AdminController@store');
        get('admin/account/{id}/edit', 'AdminController@edit');
        get('admin/account/{id}/delete', 'AdminController@delete');
        Route::any('admin/account/update/{id}', 'AdminController@update');

        get('admin/notifications', 'AdminController@notification');
        post('admin/notifications', 'AdminController@storeNotification');

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