<?php

namespace App\Http\Controllers;
use DB;
use App\Toppings;
use App\Condiments;
use App\Wraps;
use App\Burgers;
use RCAuth;
use Redirect;
use Request;

class OrderPageController
{

  public function show()
  {
    return view('orderPage', [
      'toppings'=>Toppings::all(),
      'condiments'=>Condiments::all(),
      'wraps'=>Wraps::all(),
      'burgers'=>Burgers::all()
    ]);
  }
}
