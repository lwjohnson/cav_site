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
})->name("login");

/**
 * Logout route
 */
Route::get('logout', function() {

	RCAuth::logout();
	$returnURL = "https://login.roanoke.edu/logout";
	return Redirect::to($returnURL);
})->name("logout");

Route::middleware("force_login")->group(function () {
	Route::post('/createTopping', 'EditOrderOptionsController@create');
	Route::get('/orderOptions', 'EditOrderOptionsController@show');
	Route::post('/orderOptionsUpdate','EditOrderOptionsController@update');



	Route::get('/orderPage', 'OrderPageController@show');

	Route::get('/allorders', 'AllOrdersController@show');


	Route::post('/order','OrderPageController@create');
	Route::get('/review-order/{orderid}', 'ReviewController@show');
	Route::get('/deleteOrder/{orderid}', 'ReviewController@delete');
});

Route::get('/{any}', 'HomeController@show');
?>
