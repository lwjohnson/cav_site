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
use App\OrderCondimentMap;
use App\OrderToppingMap;

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


    $order->cheese = request()->cheese;
    $order->fries = request()->fries;
    $order->save();

    $condiments = Condiments::all();
    $req_conds = request()->condiments;

    if(!empty($req_conds))
      foreach ($req_conds as $r_cond) {
        $cond_new = new OrderCondimentMap;
        $cond_new->fkey_order = $order->id;
        $cond_new->fkey_condiment = $r_cond;
        $cond_new->save();
      }


    $toppings = Toppings::all();
    $req_tops = request()->toppings;

    if(!empty($req_tops))
      foreach ($req_tops as $r_top) {
        $top_new = new OrderToppingMap;
        $top_new->fkey_topping = $r_top;
        $top_new->fkey_order = $order->id;

        $top_new->save();
      }

    return redirect()->action("ReviewController@show", ["orderid" => $order->id]);
  }

  public function show()
  {
    return view('orderPage', [
      'toppings'=>Toppings::where("active", 1)->get(),
      'condiments'=>Condiments::where("active", 1)->get(),
      'wraps'=>Wraps::all(),
      'burgers'=>Burgers::all()
    ]);
  }
}
