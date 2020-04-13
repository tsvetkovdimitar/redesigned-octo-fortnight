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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin', function(){

    return view('admin.index');

});

Route::group(['middleware'=>'admin'], function(){

    Route::resource('admin/users', 'AdminUsersController');

    Route::resource('admin/posts', 'AdminPostsController');

    Route::resource('admin/categories', 'AdminCategoriesController');

    Route::resource('admin/media', 'AdminMediasController');

    Route::resource('admin/comments', 'PostCommentsController');

    Route::resource('admin/comments/replies', 'CommentRepliesController');

//    Route::get('admin/media/upload', ['as'=>'media.upload', 'uses'=>'AdminMediasController@store']);

});

////Route::resource('admin/users', 'AdminUsersController');
//Route::name('admin.')->group(function(){
//    // we use Route::name to add prefix admin. to the route, to prevent route conflict with the front side
//    Route::resource('/admin/users', 'AdminUsersController');
//});
