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
Route::group(['middleware' => 'guest'], function(){
Route::post('/login', 'AuthController@login');
Route::get('/login', 'AuthController@loginForm')->name('login');
Route::post('/register', 'AuthController@register');
Route::get('/register', 'AuthController@registerForm');
});

Route::group(['middleware' => 'auth'], function(){
Route::get('/logout', 'AuthController@logout');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile', 'ProfileController@store');
Route::post('/comment', 'CommentsController@store');
Route::get('/profile/{id}/posts', 'PostsController@showPosts')->name('profie.posts.show');
Route::get('/newpost', 'PostsController@create')->name('new.post.create');
Route::post('/newpost', 'PostsController@store')->name('new.post.store');
});

Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'HomeController@category')->name('category.show');
Route::get('/', 'HomeController@index');
Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
Route::post('/subscribe', 'SubsController@subscribe');
Route::get('/verify/{token}', 'SubsController@verify');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin'], function() {
Route::get('/', 'DashboardController@index');
Route::resource('/categories', 'CategoriesController');
Route::resource('/tags', 'TagsController');
Route::resource('/users', 'UserController');
Route::resource('/posts', 'PostsController');
Route::get('/comments', 'CommentsController@index');
Route::get('/comments/toggle/{id}', 'CommentsController@toggle');
Route::delete('/comments/{id}/destroy', 'CommentsController@destroy')->name('comments.destroy');
Route::resource('subscribers', 'SubscribersController');
Route::get('/users/toggle/{id}', 'UserController@toggle');

});
