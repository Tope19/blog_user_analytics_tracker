<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'WebController@index')->name('homepage');
Route::get('post/{id}/{slug}', 'WebController@blog_info')->name('blog_info');
Route::post('make-comment', 'WebController@make_comment')->name('make_comment');
Route::get('/share/{id}','WebController@share_post')->name('share_post');
Route::get('/our-blog', 'WebController@blogsView')->name('our_blog');
Route::post('/our-blog/comment', 'WebController@blogsComment')->name('our_blog.comment');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::prefix('user')->group(function(){
        Route::prefix('blog')->as('blog.')->group(function(){
            Route::resource('categories', 'BlogCategoryController');
            Route::resource('posts', 'BlogController');
        });
    });

