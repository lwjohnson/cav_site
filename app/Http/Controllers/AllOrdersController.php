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
    $f15orders = Orders::latest()->simplePaginate(15);
    return view('allorders', [
      'orders'=>$f15orders
    ]);
  }
}
