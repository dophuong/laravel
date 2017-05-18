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

Route::get('/user/list/post/{id}','FrontEnd\PagesController@listPost')->name('userListPost');

Route::get('/user/view/post/{id}','FrontEnd\PagesController@viewPost')->name('userViewPost');

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
Route::group(['middleware' => 'auth'], function(){

    Route::get('/admin', 'Admin\HomeController@index')->name('admin');

    Route::post('logout', 'Auth\LoginController@logout');

    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    
    Route::get('/admin/user', 'Admin\UsersController@show')->name('getListUser');
    
    Route::get('/admin/user/profile/{id}', 'Admin\UsersController@profile')->name('getUserProfile');
    
    Route::get('/admin/user/profile/edit/{id}', 'Admin\UsersController@edit')->name('getEditUser');
    
    Route::put('/admin/user/profile/edit/{id}', ['as' => 'admin.update', 'uses' => 'Admin\UsersController@update'])->name('editUser');
    
    Route::get('/admin/user/profile/delete/{id}', 'Admin\UsersController@delete')->name('deleteUser');
    
    Route::get('/admin/user/add', 'Admin\UsersController@addView')->name('getAddUser');
    
    Route::post('/admin/user/add', ['as' => 'admin.create', 'uses' => 'Admin\UsersController@create'])->name('addUser');

    Route::get('/admin/post', 'Admin\PostsController@show')->name('getListPost');
    
    Route::get('/admin/post/add', 'Admin\PostsController@addPost')->name('getAddPost');
    
    Route::post('/admin/post/add', ['as' => 'admin.create', 'uses' => 'Admin\PostsController@create'])->name('addPost');

    //////////////////////////////////////////////////////////////////////
    
    Route::get('/user/profile', 'FrontEnd\PagesController@profile')->name('userProfile');
    
    Route::get('/user/post', 'FrontEnd\PagesController@post')->name('userPost');

    Route::get('/user/view/post/{id}','FrontEnd\PagesController@viewPost')->name('userViewPost');

    Route::get('/user/profile/edit', 'FrontEnd\PagesController@getEditProfile')->name('userGetEditProfile');

    Route::post('/user/profile/edit/{id}',  ['as' => 'userUpdateProfile', 'uses' => 'FrontEnd\PagesController@updateProfile']);

    Route::get('/user/profile/delete/{id}', 'FrontEnd\PagesController@deleteProfile')->name('userDeleteProfile');

    Route::get('/user/post/add', 'FrontEnd\PagesController@getAddPost')->name('userGetAddPost');
    
    Route::post('/user/post/add', ['as' => 'userAddPost', 'uses' => 'FrontEnd\PagesController@addPost']);

    Route::get('/user/post/edit/{id}', 'FrontEnd\PagesController@getEditPost')->name('userGetEditPost');
    
    Route::post('/user/post/edit/{id}', ['as' => 'userEditPost', 'uses' => 'FrontEnd\PagesController@editPost']);
    
    Route::get('/user/delete/post/{id}','FrontEnd\PagesController@deletePost')->name('userDeletePost');

    Route::post('/comment/add/{postId}','FrontEnd\PagesController@addComment')->name('addComment');


});
Route::get('/comment/getComment/{postId}', 'FrontEnd\PagesController@getComment');