<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/update/user/pic',  'HomeController@updateUserPic')->name('update-user');

Route::get('/clear/user/pic',  'HomeController@clearUserPic')->name('clear-user-pic');
