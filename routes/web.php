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
Route::get('/order', function() {
  return view('order');
});
Route::get('/review-order', function() {
  return view('review-order');
});


Route::get('/{any}', function() {
  return view('welcome');
});
?>
