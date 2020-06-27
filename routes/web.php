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
	return view('home.index');
});

//Route::get('/brunch-menu', function () {
//	return view('preRendered.index', ['directory' => '/brunch-menu']);
//});
//
//
//Route::get('/menu', function () {
//	return view('preRendered.index', ['directory' => '/menu']);
//});
//
Route::get('/contact', function () {
	return view('home.index');
});
//
//Route::get('/liveMusic', function () {
//	return view('preRendered.index', ['directory' => '/liveMusic']);
//});
//
//Route::get('/catering', function () {
//	return view('preRendered.index', ['directory' => '/catering']);
//});

Route::get('/menus', 'MenuController@get');
Route::get('/menu/{label}', 'MenuController@showMenu');
Route::post('/menu', 'MenuController@set');
Route::put('/menu', 'MenuController@update');
Route::delete('/menu/{id}', 'MenuController@delete');

Route::get('/mailingList', 'MailingListController@get');
Route::post('/mailingList', 'MailingListController@create');
Route::post('/email/contact', 'ContactController@send');
Route::post('/email/catering/contact', 'ContactController@sendCatering');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/user/dashboard', 'DashboardController@show');

Route::post('/event/save', 'LiveMusicController@create');
Route::get('/events/LiveMusic', 'LiveMusicController@show');
Route::post('/event/delete', 'LiveMusicController@delete');
