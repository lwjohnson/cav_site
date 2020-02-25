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


/**
 * Login route
 */
Route::get('login', function() {
	$returnURL = Session::get('returnURL', Request::url() . '/../');
	return RCAuth::redirectToLogin($returnURL);
});

/**
 * Logout route
 */
Route::get('logout', function() {
	RCAuth::logout();
	$returnURL = Request::url() . '/../';
	return RCAuth::redirectToLogout($returnURL);
});



Route::middleware('force_login')->group(function () {
  Route::get('/', function () {
    return view('index');
  });
});

Route::get('/','HomeController@show');

Route::post('/order', 'ReviewController@store');
Route::get('/orderPage','OrderPageController@show');
Route::get('/review-order/{orderid}', 'ReviewController@show');


Route::get('/{any}', 'HomeController@show');
?>
