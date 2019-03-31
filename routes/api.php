<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/', 'HomeController@index');
    Route::get('/lectures', 'LectureController@index')->name('lectures.index');


    Route::get('/courses', 'CourseController@index')->name('courses.index');
    Route::get('/courses/{id}', 'CourseController@show')->name('courses.show');

    Route::get('/lectures/{id}', 'LectureController@show')->name('lectures.show');
});