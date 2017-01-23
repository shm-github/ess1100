<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::auth();


Route::group(['middleware' => 'auth'], function () {

//    Route::get('/dashboard', function(){
//
//        return view('admin_dashboard');
//    });

    //fake admin page
    Route::get('/admin_page' , function (){
        echo 'در حال ساخت و ساز';
    });

    Route::get('/' , function (){
        return view('welcome');
    });

});


Route::group(['middleware' => 'isAdmin'], function () {

    Route::resource('/admin/users', 'AdminUsersController');

    Route::get('/home', 'HomeController@index');

    Route::resource('/week', 'WeekController');

    Route::resource('/date', 'DateController');

    Route::resource('/word', 'WordController');


});

