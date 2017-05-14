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

Route::get('/admin', '\App\Http\Controllers\Admin\HomeController@index')->name('admin');

//Auth::routes();

Route::get('/admin/contact', '\App\Http\Controllers\Admin\HomeController@contact')->name('contact');
Route::get('/admin/about', '\App\Http\Controllers\Admin\HomeController@about')->name('about');

//Route::group(['middleware' => 'guest'], function() {

    Route::get('/admin/register', '\App\Http\Controllers\Admin\Auth\RegisterController@showRegistrationForm')->name('getRegister');
    Route::post('/admin/register', '\App\Http\Controllers\Admin\Auth\RegisterController@register')->name('register');
    Route::get('/admin/login', '\App\Http\Controllers\Admin\Auth\LoginController@showLoginForm')->name('getLogin');
    Route::post('/admin/login', ['as' => 'admin.auth.login', 'uses' => 'Admin\Auth\LoginController@login'])->name('login');

    Route::get('/admin/password/reset', '\App\Http\Controllers\Admin\Auth\ForgotPasswordController@showLinkRequestForm')->name('passwordRequest');
    Route::post('/admin/password/email', '\App\Http\Controllers\Admin\Auth\ForgotPasswordController@sendResetLinkEmail')->name('passwordEmail');
    Route::get('/admin/password/reset/{token}', '\App\Http\Controllers\Admin\Auth\ResetPasswordController@showResetForm');
    Route::post('/admin/password/reset', '\App\Http\Controllers\Admin\Auth\ResetPasswordController@reset');
//});
//Route::group(['middleware' => 'auth'], function(){

    Route::post('logout', '\App\Http\Controllers\Admin\Auth\LoginController@logout');
//    Route::get('/admin', '\App\Http\Controllers\Admin\HomeController@index')->name('admin');

//});

Route::get('/logout', '\App\Http\Controllers\Admin\Auth\LoginController@logout')->name('logout');

Route::get('/admin/user', '\App\Http\Controllers\Admin\UsersController@show')->name('getListUser');

Route::get('/admin/user/profile/{id}', '\App\Http\Controllers\Admin\UsersController@profile')->name('getUserProfile');

Route::get('/admin/user/profile/edit/{id}', '\App\Http\Controllers\Admin\UsersController@edit')->name('getEditUser');

Route::put('/admin/user/profile/edit/{id}', ['as' => 'admin.update', 'uses' => 'Admin\UsersController@update'])->name('editUser');

Route::get('/admin/user/profile/delete/{id}', '\App\Http\Controllers\Admin\UsersController@delete')->name('deleteUser');

Route::get('/admin/user/add', '\App\Http\Controllers\Admin\UsersController@addView')->name('getAddUser');

Route::post('/admin/user/add', ['as' => 'admin.create', 'uses' => 'Admin\UsersController@create'])->name('addUser');

