<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group.
|
*/

Route::view('/', 'welcome')->name('index');

// Homepage
Route::get('/home', 'HomeController@index')->name('home');

// Account Management
Route::namespace('Account')
     ->prefix('account')
     ->as('account.')
     ->group(base_path('routes/web/account.php'));

// Add Auth Routes, But Disable User Self-Registration
Auth::routes(['register' => false]);
