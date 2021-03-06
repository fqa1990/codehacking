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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/{id}', ['as'=>'hom.post', 'uses'=>'AdminPostsController@post']);

Route::group(['middleware'=>'admin'], function () {
    
    Route::get('/admin', function(){
        return view('admin.index');
    });
    
    Route::get('/laravel-filemanager', '\Unisharp\Laravelfilemanager\controllers\LfmController@show');
    
    Route::post('/laravel-filemanager/upload', '\Unisharp\Laravelfilemanager\controllers\UploadController@upload');
    
    Route::resource('admin/users', 'AdminUsersController');
    
    Route::resource('admin/posts', 'AdminPostsController');
    
    Route::resource('admin/categories', 'AdminCategoriesController');
    
    Route::resource('admin/media', 'AdminMediaController');
    
    Route::delete('admin/delete/media', 'AdminMediaController@deleteMedia');
    
    Route::resource('admin/comments', 'PostCommentsController');
    
    Route::resource('admin/comment/replies', 'CommentRepliesController');
    
   // Route::get('media/upload', ['as'=>'media.upload', 'uses'=>'AdminMediaController@store']);
});

Route::group(['middleware'=>'admin'], function () {
        
    Route::post('comment/reply', 'CommentRepliesController@createReply');        
        
});





















