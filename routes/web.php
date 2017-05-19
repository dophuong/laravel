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

Route::get('/', 'FrontEnd\PagesController@index')->name('user');

Route::get('/contact', 'FrontEnd\PagesController@contact')->name('contact');

Route::get('/about', 'FrontEnd\PagesController@about')->name('about');

Route::group(['middleware' => 'guest'], function() {

    Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('getRegister');
    Route::post('/register', 'Auth\RegisterController@register')->name('register');
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', ['as' => 'login', 'uses' => 'Auth\LoginController@login']);

    Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('passwordRequest');
    Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('passwordEmail');
    Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
    Route::post('/password/reset', 'Auth\ResetPasswordController@reset');
});

Route::group(['prefix'=>'/admin','middleware' => 'admin','namespace'=>'Admin'], function() {

    Route::get('', 'HomeController@index')->name('admin');

    Route::get('/user', 'UsersController@show')->name('getListUser');

    Route::get('/user/profile/{id}', 'UsersController@profile')->name('getUserProfile');

    Route::get('/user/profile/edit/{id}', 'UsersController@edit')->name('getEditUser');

    Route::put('/user/profile/edit/{id}', ['as' => 'editUser', 'uses' => 'UsersController@update']);

    Route::get('/user/profile/delete/{id}', 'UsersController@delete')->name('deleteUser');

    Route::get('/user/add', 'UsersController@addView')->name('getAddUser');

    Route::post('/user/add', ['as' => 'addUser', 'uses' => 'UsersController@create']);

    Route::get('/post', 'PostsController@show')->name('getListPost');

    Route::get('/post/add', 'PostsController@addPost')->name('getAddPost');

    Route::post('/post/add', ['as' => 'addPost', 'uses' => 'PostsController@create']);
});

Route::group(['middleware' => 'auth'], function(){

    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
});

Route::get('/user/list/post/{id}', 'FrontEnd\PagesController@listPost')->name('userListPost');

Route::get('/user/view/post/{id}', 'FrontEnd\PagesController@viewPost')->name('userViewPost');

Route::group(['prefix'=>'/user', 'middleware' => 'auth', 'namespace'=>'FrontEnd'], function(){

    Route::get('/profile', 'PagesController@profile')->name('userProfile');
    
    Route::get('/post', 'PagesController@post')->name('userPost');

    Route::get('/profile/edit', 'PagesController@getEditProfile')->name('userGetEditProfile');

    Route::post('/profile/edit/{id}',  ['as' => 'userUpdateProfile', 'uses' => 'PagesController@updateProfile']);

    Route::get('/profile/delete/{id}', 'PagesController@deleteProfile')->name('userDeleteProfile');

    Route::get('/post/add', 'PagesController@getAddPost')->name('userGetAddPost');
    
    Route::post('/post/add', ['as' => 'userAddPost', 'uses' => 'PagesController@addPost']);

    Route::get('/post/edit/{id}', 'PagesController@getEditPost')->name('userGetEditPost');
    
    Route::post('/post/edit/{id}', ['as' => 'userEditPost', 'uses' => 'PagesController@editPost']);
    
    Route::get('/delete/post/{id}','PagesController@deletePost')->name('userDeletePost');

    Route::post('/comment/add/{postId}','PagesController@addComment')->name('addComment');
});

Route::get('/comment/getComment/{postId}', 'FrontEnd\PagesController@getComment');