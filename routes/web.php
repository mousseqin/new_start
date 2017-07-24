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
$commitType = ['get', 'post'];

Route::get('/', function () {
    return view('welcome');
});

//Route::get('user/{id}', 'UserController@show');
Route::match($commitType,'user/{id}', 'UserController@show');
Route::get('show/{id}', 'ShowProfile');
Route::resource('photos', 'PhotoController',['only' => ['index', 'show']]);



//Route::get('user/profile', function () {
//    print_r(166);exit;
//})->name('profile');

//Route::get('user/detail/{id?}', function ($id = null) {
//    return $id;
//})->where('id','[0-9]+');

Route::any('foo', function () {
    print_r(123);exit;
});

//Route::get('user/{id}', function ($id) {
//    return 'User '.$id;
//});

//Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
//    //
//    return 'posts '.$postId.';comment '.$commentId;
//});