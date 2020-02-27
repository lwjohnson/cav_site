<?php

namespace App\Http\Controllers;

use App\User;
use RCAuth;
use Redirect;
use Request;

class HomeController
{

  public function show()
  {
    return view('welcome');
  }
}
