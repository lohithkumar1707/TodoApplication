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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    Route::get('/addcontact','Auth\ContactController@createContact');
    Route::post('/addcontact', 'Auth\ContactController@saveCreate');

    Route::get('/contactlist','Auth\ContactController@showContactList');
    Route::post('/contactlist','Auth\ContactController@deleteContact');

    Route::get('/editcontact/{contact}','Auth\ContactController@edit');
    Route::post('/editcontact', 'Auth\ContactController@doEdit');

    Route::get('/profile','Auth\ProfileController@showProfile');
    Route::post('/profile','Auth\ProfileController@editPicture');
    Route::post('/profile/changepass','Auth\ProfileController@changePassword');



});



Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  Route::post('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
  
  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');

  Route::group(['middleware' => 'auth:admin'], function () {

      Route::get('/contacts', 'Auth\AdminContactController@showContactList');
      Route::get('/editcontact/{contact}','Auth\AdminContactController@edit');
      Route::post('/editcontact', 'Auth\AdminContactController@doEdit');
      Route::post('/contacts','Auth\AdminContactController@deleteContact');
  });







});
