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

Route::get('/', 'PostController@index')->name('index');


Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'AdminPostsController@post')->name('home.post');
// Route::delete('/delete/media', 'AdminMediasController@deleteMedia')->name('deleteMedia');

Route::group(['middleware' => ['admin', 'verified']], function() {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('admin/users', 'AdminUsersController');
    Route::resource('admin/posts', 'AdminPostsController');
    Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/media', 'AdminMediasController');
    Route::resource('admin/comments', 'PostCommentsController');
    Route::resource('admin/comment/replies', 'CommentRepliesController');
    Route::delete('/delete/media', 'AdminMediasController@deleteMedia')->name('deleteMedia');
});

Route::group(['middleware' => ['auth', 'verified']], function() {
    Route::resource('comment/reply', 'CommentRepliesController');
    Route::post('/comment/reply', 'CommentRepliesController@createReply')->name('create.reply');

});