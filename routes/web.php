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
use App\Toppings;
use App\Condiments;
use App\Wraps;
use App\Burgers;


Route::get('/','HomeController@show');

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
	$returnURL = "https://login.roanoke.edu/logout";
	return Redirect::to($returnURL);
});





Route::post('/order','ReviewController@create');

Route::get('/orderPage', 'OrderPageController@show');

Route::get('/review-order/{orderid}', 'ReviewController@show');


Route::get('/{any}', 'HomeController@show');
?>
