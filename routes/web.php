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

// Home routes

Route::get('/', function () {
    $threads=Forum\Thread::paginate(15);
    return view('welcome',compact('threads'));
});

Route::get('/learn', function(){
	return view('learn');
})->name('learn');

Auth::routes();

Route::get('/home', 'HomeController@index');

/*
=================
Thread Routes
==================
*/

Route::resource('/thread','ThreadController');

Route::post('/thread/mark-as-solution','ThreadController@markAsSolution')->name('markAsSolution');

/*
=================
User Profile Routes
==================
*/
Route::get('/user/profile/{user}', 'UserProfileController@index')->name('user_profile')->middleware('auth');

Route::get('/user/profile/{user}/edit_profile', 'UserProfileController@edit')->name('user_profile.edit')->middleware('auth');
Route::post('/user/profile/{user}/descUpdate', 'UserProfileController@descUpdate')->name('users.descUpdate')->middleware('auth');
//Update Route
Route::post('/user/profile/{user}/nameUpdate', 'UserProfileController@nameUpdate')->name('users.nameUpdate')->middleware('auth');
Route::post('/user/profile/{user}/emailUpdate', 'UserProfileController@emailUpdate')->name('users.emailUpdate')->middleware('auth');
Route::post('/user/profile/{user}/genderUpdate', 'UserProfileController@genderUpdate')->name('users.genderUpdate')->middleware('auth');
Route::post('/user/profile/{user}/passwordUpdate', 'UserProfileController@passwordUpdate')->name('users.passwordUpdate')->middleware('auth');
Route::post('/user/profile/{user}/imageUpdate', 'UserProfileController@imageUpdate')->name('users.imageUpdate')->middleware('auth');

/*
=================
Comment Routes
==================
*/
Route::resource('comment','CommentController',['only'=>['update','destroy']]);

Route::post('comment/create/{thread}','CommentController@addThreadComment')->name('threadcomment.store');

Route::post('reply/create/{comment}','CommentController@addReplyComment')->name('replycomment.store');

// Like route
Route::post('comment/like','LikeController@toggleLike')->name('toggleLike');

//Mark Notification as read
Route::get('/markAsRead',function(){
    auth()->user()->unreadNotifications->markAsRead();
});

/*Admin area*/
Route::get('/admin_dashboard', 'AdminController@index')->middleware('admin')->name('admin');
Route::get('/user_management', 'AdminController@usersManagement')->middleware('admin');
Route::get('/tags_management', 'AdminController@tagsManagement')->middleware('admin');
Route::post('/updateTags', 'AdminController@tagsUpdater')->middleware('admin')->name('tagUpdater');
Route::post('/user_management/usersDelete', 'AdminController@userDelete')->middleware('admin')->name('user.destroy');