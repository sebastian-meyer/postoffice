<?php

// Main Page
Route::get('/', 'AccountController@index')->name('index');

// Change Password
Route::get('changePassword', 'AccountController@changePasswordForm')->name('password.form');
Route::post('changePassword', 'AccountController@changePasswordAction')->name('password.action');
