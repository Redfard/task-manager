<?php

Route::view('/', 'home');

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::view('/', 'admin/index')->name('admin');
    Route::resource('/tasks', 'Admin\TaskController')->except('destroy');
    Route::resource('/status', 'Admin\StatusController')->except('destroy');
    Route::resource('/users', 'Admin\UserController')->except('destroy');
    Route::get('/tasks/{id}/destroy', 'Admin\TaskController@destroy')->name('tasks.destroy');
    Route::get('/status/{status}/destroy', 'Admin\StatusController@destroy')->name('status.destroy');
    Route::get('/users/{status}/destroy', 'Admin\UserController@destroy')->name('users.destroy');
});

//API routes
Route::group(['prefix' => 'api'], function() {

    Route::group(['prefix' => 'tasks'], function() {
        Route::match(['post', 'get'], '/', 'Api\TaskController@getTasks');
        Route::match(['post', 'get'], '/item/{task}', 'Api\TaskController@getTask');
        Route::match(['post', 'get'], '/status-change', 'Api\TaskController@updateStatus');
    });
});

// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');