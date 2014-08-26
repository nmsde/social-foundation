<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);


/**
 * Sign up
 */
Route::get('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@create'
]);
Route::post('register', [
    'as' => 'register_path',
    'uses' => 'RegistrationController@store'
]);


/**
 * Authentication
 */
Route::get('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@create'
]);
Route::post('login', [
    'as' => 'login_path',
    'uses' => 'SessionsController@store'
]);
Route::get('logout', [
    'as' => 'logout_path',
    'uses' => 'SessionsController@destroy'
]);


/**
 * Statuses
 */
Route::get('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@index'
]);
Route::post('statuses', [
    'as' => 'statuses_path',
    'uses' => 'StatusesController@store'
]);


/**
 * User related
 */
Route::get('users', [
    'as' => 'users_path',
    'uses' => 'UsersController@index'
]);

Route::get('@{username}', [
    'as' => 'profile_path',
    'uses' => 'UsersController@show'
]);


/**
 * Following
 */
Route::post('follows', [
    'as' => 'follow_path',
    'uses' => 'FollowersController@store'
]);
Route::delete('follows/{id}', [
    'as' => 'unfollow_path',
    'uses' => 'FollowersController@destroy'
]);


/**
 * Remind me about password
 */
Route::controller('password', 'RemindersController');