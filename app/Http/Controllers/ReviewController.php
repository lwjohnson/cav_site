<?php
namespace App\Http\Controllers;

use DB;
use App\Orders;
use App\Http\Controllers\Auth;
class ReviewController
{
  public function create()
  {
    date_default_timezone_set('America/New_York');

    request()->validate([
      'name'=>['required', 'min:2', 'max:49'],
      'entree_choice'=>'required',
      'fries'=>'required'
    ]);

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
        echo $value;
        $t = $value . ", ".$t;
      }else {
        echo $value;
        if($value != "None"){
          echo "hi";
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
    return redirect('/review-order/' . $lastid);
  }

  public function show($orderid)
  {
    if($orderid == 0)
      abort(404);

    $order = Orders::findOrFail($orderid);


    return view('review-order', [
      'o'=>$order
    ]);
  }

  public function store()
  {

  }


  public function delete($orderid)
  {
    if($orderid == 0)
      abort(404);

    $order = Orders::findOrFail($orderid);

    $order->delete();

    $f10orders = Orders::all();
    return redirect('allorders');
  }


}

?>
