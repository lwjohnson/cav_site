<?php
namespace App\Http\Controllers;

use DB;
use App\Orders;
class ReviewController
{
  public function create()
  {
    return view('orderPage');
  }

  public function show($orderid)
  {
    $order = Orders::where('id', $orderid)->first();

    if(! $order) {
      abort(404);
    }

    return view('review-order', [
      'order'=>$order->id,
      'name'=>$order->name,
      'created'=>$order->created,
      'condiments'=>$order->condiments,
      'toppings'=> $order->toppings,
      'cheese'=>$order->cheese,
      'fries'=>$order->fries
    ]);
  }

  public function store()
  {
    date_default_timezone_set('America/New_York');

    $order = new Orders();
    $count = 1;
    $l = Orders::where('id', $count)->first();
    while($l != null){
      $count= $count + 1;
      $l = Orders::where('id', $count)->first();
    }
    $lastid = Orders::where('id', $count-1)->first()->id + 1;

    $order->id = $lastid;
    $order->created = date('Y-d-m H:i:s');
    $order->name = request()->name;

    if(request()->entree_choice == "burger")
      $order->entree = request()->burger_choice;
    else
      $order->entree = request()->wrap_choice;


    $condiments = request()->condiments;
    $c="";
    foreach ($condiments as $value) {
      if($value!="None")
        $c = $value . ", ".$c;
    }
    if($c == "")
      $c = "None.";

    $order->condiments = $c;

    $toppings = request()->toppings;
    $t=".";
    foreach ($toppings as $value) {
      if($value!="None")
        $t = $value . ", ".$t;
    }
    if($t == ".")
      $t = "None.";

    $order->toppings = $t;

    $order->cheese = request()->cheese;

    $order->fries = request()->fries;

    $order->save();

    return redirect('/review-order/' . $lastid);
  }


  public function delete()
  {

  }




}

?>
