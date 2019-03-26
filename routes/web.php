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
    return view('welcome');
});
Route::get('/cancellation/{email}', function ($email) {
    return view('users.cancellation',['email' => $email]);
});
Route::get('/confirmation', function () {
    return view('users.CancellationConfirmation');
})->name('confirmation');;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
 Route::get('/userdata', 'HomeController@userdata')->name('userdata');

Route::get('/newPassword', function (){
    return view('auth/passwords/changepassword');
})->name('newPassword');
Route::get('/mon-Compte',function (){
    return view('auth/passwords/changepassword');

})->name('monCompte');

Route::post('/changePassword','HomeController@changePassword')->name('changePassword');
Route::post('/send/{id}','HomeController@newsLetter')->name('send');

Route::resource('post', 'PostController');
Route::resource('media', 'MediaController');
Route::resource('page', 'PageController');

Route::get('/contact', 'ContactController@show')->name('contact');
Route::post('/contact',  'ContactController@mailToAdmin');
Route::get('/admin', 'HomeController@admin')->name('admin');
Route::get('/addUsers', 'UserController@addUsersBlade')->name('add');
Route::post('/add', 'UserController@addUsers')->name('addUsers');
Route::get('/usersList', 'UserController@usersList')->name('usersList');
Route::get('/admin/a', 'PostController@index4admin')->name('index4admin');
Route::get('/user/{user}/edit/', 'UserController@edit')->name('userEdit');
Route::put('/user/{user}/update/', 'UserController@userUpdate')->name('userUpdate');
Route::delete('/user/{user}/userDestroy', 'UserController@destroy')->name('userDestroy');
//Route::get('/cancellation', 'Auth\LoginController@cancellation')->name('cancellation');
