<?php

use App\Post;
use App\Category;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::get('post/{id}', ['as' => 'home.post', 'uses' => 'AdminPostsController@post']);


Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/', function () {
    $posts = Post::paginate(2);
    $categories =Category::all();
    return view('home', compact('posts', 'categories'));
});

Route::group(['middleware' => 'admin'], function () {

    Route::get('/admin', 'AdminController@index');

    Route::resource('admin/users', 'AdminUsersController', ['names' => [
        'index' => 'admin.users.index',
        'create' => 'admin.users.create',
        'store' => 'admin.users.store',
        'edit' => 'admin.users.edit',
    ]]);

    Route::resource('admin/posts', 'AdminPostsController', ['names' => [
        'index' => 'admin.posts.index',
        'create' => 'admin.posts.create',
        'store' => 'admin.posts.store',
        'edit' => 'admin.posts.edit',
    ]]);
    Route::resource('admin/categories', 'AdminCategoriesController', ['names' => [
        'index' => 'admin.categories.index',
        'create' => 'admin.categories.create',
        'store' => 'admin.categories.store',
        'edit' => 'admin.categories.edit',
    ]]);
    Route::resource('admin/medias', 'AdminMediasController', ['names' => [
        'index' => 'admin.medias.index',
        'create' => 'admin.medias.create',
        'store' => 'admin.medias.store',
        'edit' => 'admin.medias.edit',
    ]]);
    Route::delete('/delete/media', 'AdminMediasController@deleteMedia');
    // Route::resource('admin/categories', 'AdminCategoriesController');
    Route::resource('admin/comments', 'PostCommentsController', ['names' => [
        'index' => 'admin.comments.index',
        'create' => 'admin.comments.create',
        'store' => 'admin.comments.store',
        'edit' => 'admin.comments.edit',
    ]]);
    Route::resource('admin/comment/replies', 'CommentRepliesController', ['names' => [
        'index' => 'admin.comment.replies.index',
        'create' => 'admin.comment.replies.create',
        'store' => 'admin.comment.replies.store',
        'edit' => 'admin.comment.replies.edit',
    ]]);

});
Route::group(['middleware' => 'auth'], function () {

    Route::post('comment/reply', 'CommentRepliesController@createReply');
});