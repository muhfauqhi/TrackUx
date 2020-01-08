<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
Route::get('/track-ux', 'TrackUxController@index')->name('trackux');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function(){
    Route::get('dashboard', 'UserProfileController@edit')->name('dashboard.edit');
    Route::post('dashboard', 'UserProfileController@update');
    Route::delete('dashboard', 'UserProfileController@destroy')->name('avatar.delete');
});

Route::post('posts/{post}/comment', 'PostCommentController@store')->name('posts.comment.store');
Route::resource('roles','RoleController');
Route::resource('users','UserController');
Route::resource('products','ProductController');
Route::resource('posts', 'PostController');

