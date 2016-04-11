<?php

Route::group(['middleware' => 'web'], function () {
    /************************************
    * Home page.
    ************************************/
    Route::get('/', 'PageController@index');

    /************************************
    * Me
    ************************************/
    Route::get('/me', ['as' => 'me', 'uses' => 'PageController@me']);
    Route::post('/me', ['as' => 'me.update', 'uses' => 'PageController@update']);

    /************************************
    * Doctor
    ************************************/
    Route::get('/doctors', ['as' => 'doctors.index', 'uses' => 'DoctorController@index']);
    Route::get('/doctors/{id}', ['as' => 'doctors.show', 'uses' => 'DoctorController@show']);

    /************************************
    * Department
    ************************************/
    Route::get('/departments', ['as' => 'departments.index', 'uses' => 'DepartmentController@index']);

    /************************************
    * Auth login and logout
    ************************************/
    Route::get('/login', 'Auth\AuthController@getLogin');
    Route::post('/login', 'Auth\AuthController@postLogin');
    Route::get('/logout', 'Auth\AuthController@logout');

    /************************************
    * Admin
    ************************************/
    Route::get('/admin', ['as' => 'admin.dashboard', 'uses' => 'Admin\AdminController@index']);

    Route::group(['prefix' =>'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
        Route::resource('users', 'UserController', ['except' => 'show']);
        Route::resource('departments', 'DepartmentController', ['except' => 'show']);
        Route::resource('drugs', 'DrugController', ['except' => 'show']);
        Route::resource('orders', 'OrderController', ['except' => ['show', 'edit']]);
    });
});
