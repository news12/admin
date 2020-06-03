<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Site\HomeController@index');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('panel')->group(function (){
    Route::get('/', 'Admin\HomeController@index')->name('admin');

    Route::get('login', 'Admin\Auth\LoginController@index')->name('login');
    Route::post('login', 'Admin\Auth\LoginController@authenticate');

    Route::get('register', 'Admin\Auth\RegisterController@index')->name('register');
    Route::post('register', 'Admin\Auth\RegisterController@register');

    Route::get('neill', 'Admin\NeillController@index')->name('neill');
    Route::post('cNeill', 'Admin\NeillController@create')->name('cNeill');
    Route::post('eNeill', 'Admin\NeillController@edit')->name('eNeill');
    Route::post('dNeill', 'Admin\NeillController@destroy')->name('dNeill');

    Route::post('logout', 'Admin\Auth\LoginController@logout')->name('logout');

    Route::resource('users', 'Admin\UserController');

    Route::get('profile', 'Admin\ProfileController@index')->name('profile');
    Route::put('profilesave', 'Admin\ProfileController@save')->name('profile.save');
});
