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


/* Home */
Route::get('/', ['as' => 'home', 'uses' => 'HomeController@home']);


/* Login Pages */
Route::get('/collections', ['as' => 'login.collections', 'uses' => 'HomeController@getCollections']);
Route::get('/collections/{collectionid}', ['as' => 'login.collections_det', 'uses' => 'HomeController@getCollections_det']);
Route::get('/browse', ['as' => 'login.browse', 'uses' => 'HomeController@getBrowse']);
Route::get('/friends', ['as' => 'login.friends', 'uses' => 'HomeController@getFriends']);
Route::get('/getdata', ['as' => 'login.getdata', 'uses' => 'HomeController@getData']);
Route::get('/recents', ['as' => 'login.recents', 'uses' => 'HomeController@getRecents']);
Route::get('/user/{user_id}', ['as' => 'login.user_recents', 'uses' => 'HomeController@getUser_recents']);
Route::get('/user/{user_id}/collections', ['as' => 'login.user_collections', 'uses' => 'HomeController@getUser_collections']);
Route::get('/user/{user_id}/friends', ['as' => 'login.user_friends', 'uses' => 'HomeController@getUser_friends']);

/* User */
Route::get('/signin', ['as' => 'users.signin', 'uses' => 'UserController@getSignin']);
Route::get('/signup', ['as' => 'users.signup', 'uses' => 'UserController@getSignup']);
Route::post('/signin', ['uses' => 'UserController@postSignin']);
Route::post('/signup', ['uses' => 'UserController@postSignup']);
Route::get('/signout', ['as' => 'users.signout' ,'uses' => 'UserController@getSignout']);

/* Link */
Route::post('/link', ['as' => 'link.addlink','uses' => 'LinkController@postAddlink']);
Route::get('/link/preview', ['as' => 'link.preview','uses' => 'LinkController@postLinkPreview']);
Route::get('/link/add/{linkid}/collection/{collectionid}', ['as' => 'link.addlinktocollection','uses' => 'LinkController@getAddLinkToCollection']);
Route::get('/link/delete/{linkid}', ['as' => 'link.deletelink','uses' => 'LinkController@getDeleteLink']);

/* Collection */
Route::post('/collection/add', ['as' => 'collection.addcollection','uses' => 'CollectionController@postAddCollection']);
Route::post('/collection/edit', ['as' => 'collection.editcollection','uses' => 'CollectionController@postEditCollection']);
Route::get('/collection/delete/{collectionid}', ['as' => 'collection.deletecollection','uses' => 'CollectionController@getDeleteCollection']);






