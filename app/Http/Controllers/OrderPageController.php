<?php

namespace App\Http\Controllers;
use DB;
use App\Orders;
use App\Toppings;
use App\Condiments;
use App\Wraps;
use App\Burgers;
use RCAuth;
use Redirect;
use Request;

class OrderPageController
{
  public function create()
  {
    date_default_timezone_set('America/New_York');

    request()->validate([
      'name'=>['required', 'min:2', 'max:49'],
      'entree_choice'=>'required',
      'fries'=>'required'
    ]);

    $order = new Orders;

    // $count = 1;
    // $l = Orders::where('id', $count)->first();
    // while($l != null){
    //   $count= $count + 1;
    //   $l = Orders::where('id', $count)->first();
    // }
    //$lastid = Orders::where('id', $count-1)->first()->id + 1;

    //$order->id = $lastid;
    //$order->created = date('Y-d-m H:i:s');
    $order->name = request()->name;

    if(request()->entree_choice == "burger")
      $order->entree = request()->burger_choice;
    else
      $order->entree = request()->wrap_choice;

    $condiments = request()->condiments;
    $c="";
    $r=0;
    if($condiments != null) {
      foreach ($condiments as $value) {
        if($r!=0)
          $c = $value . ", ".$c;
        else {
          $c = $value . $c;
          $r++;
        }
      }
    }
    if($c == "")
      $c = "None";
    $order->condiments = $c;

    $toppings = request()->toppings;
    $t=".";
    $r = 0;
    foreach ($toppings as $value) {
      if($r!=0){
        $t = $value . ", ".$t;
      }else {
        if($value != "None"){
          $t = $value . $t;
          $r++;
        }
      }
    }
    if($t == ".")
      $t = "None";
    $order->toppings = $t;
    $order->cheese = request()->cheese;
    $order->fries = request()->fries;

    $order->save();
    return redirect('/review-order/' . $order->id);
  }

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
