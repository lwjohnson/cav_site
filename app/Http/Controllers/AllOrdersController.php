<?php

namespace App\Http\Controllers;

use App\User;
use RCAuth;
use Redirect;
use Request;
use App\Orders;

class AllOrdersController
{

  public function show()
  {
    $f10orders = Orders::all();
    return view('allorders', [
      'orders'=>$f10orders
    ]);
  }
}
