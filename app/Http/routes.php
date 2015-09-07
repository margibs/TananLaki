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

Route::get('geo_test','HomeController@copyscape');

Route::group(['middleware' => 'UserCheck'], function()
{
	//AdminController
	Route::get('admin','AdminController@posts');
	Route::get('admin/media_file','AdminController@mediaFiles');
	Route::post('admin/media_file_upload', 'AdminController@media_file_upload');
	Route::get('admin/users','AdminController@users');

	Route::get('admin/media_gallery','AdminController@mediaGallery');
	
	Route::get('admin/settings','AdminController@adminSettings');

	Route::get('admin/posts','AdminController@posts');
	Route::get('admin/drafts','AdminController@drafts');
	Route::get('admin/trash','AdminController@trash');
	Route::get('admin/posts/media_file','AdminController@mediaFiles');
	Route::get('admin/posts/{id}/delete','AdminController@deletePost');
	Route::get('admin/posts/{id}','AdminController@editPost');

	Route::get('admin/new_post','AdminController@newPost');
	Route::post('admin/new_post/{id?}','AdminController@addPost');

	Route::get('admin/categories','AdminController@categories');
	Route::post('admin/categories','AdminController@addCategory');

	Route::get('admin/links','AdminController@links');
	Route::get('admin/new_link','AdminController@newLink');
	
	Route::post('admin/new_link/{id?}','AdminController@addLink');

	Route::get('admin/edit_link/{id}','AdminController@editLink');

	Route::get('admin/comments','AdminController@comments');

	Route::get('admin/ajax_get_media_file','AdminController@ajaxGetMediaFile');
	Route::post('admin/ajax_delete_image','AdminController@ajaxDeleteImage');
	Route::post('admin/ajax_upload_image','AdminController@ajaxUploadImage');
	Route::post('admin/ajax_check_content','AdminController@ajaxCheckContent');

	Route::post('comment/ajax_add_comment','HomeController@ajax_add_comment');

});



// Authentication routes...
Route::get('login', 'Auth\AuthController@getLogin');
Route::post('login', 'Auth\AuthController@postLogin');
Route::get('logout', 'Auth\AuthController@getLogout');
Route::get('login/facebook/{category?}/{slug?}','HomeController@socialLogin');
Route::post('login/auto_login','HomeController@autoLogin');

// Registration routes...
Route::get('register', 'Auth\AuthController@getRegister');
Route::post('register', 'Auth\AuthController@postRegister');

//HomeController
Route::post('home/ajax_get_page','HomeController@ajaxGetPage');
Route::get('/','HomeController@index');
Route::get('/author','HomeController@author');
Route::get('/{category}','HomeController@category');
Route::get('/{category}/{slug}','HomeController@single');
