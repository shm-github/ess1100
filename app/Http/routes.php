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


    Route::get('/' , function (){
        return view('home');
    });

});


Route::group(['middleware' => 'isAdmin'], function () {

    Route::resource('/users', 'AdminUsersController');

    Route::resource('updates', 'UpdateController');

    Route::get('/home', 'HomeController@index');

    Route::resource('/weeks', 'WeekController');

    Route::resource('/dates', 'DateController' , ['except' => [
        'create'
    ]]);
    Route::get('dates/create/{weekId}' , 'DateController@create');

    Route::resource('/words', 'WordController', ['except' => [
        'create'
    ]]);

    Route::get('words/create/{dateId}' , 'WordController@create');


});

