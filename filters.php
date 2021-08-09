<?php

Route::filter('login', function() {
	if (! Auth::check()) {
		if (! Auth::attempt()) {
			return Redirect::to('login')->with('returnURL', Request::url());
		}
	}
});
