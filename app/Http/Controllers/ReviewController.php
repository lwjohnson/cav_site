<?php
namespace App\Http\Controllers;

use DB;
use App\Orders;
use App\Http\Controllers\Auth;
class ReviewController extends Controller
{

  public function show($orderid)
  {
    if($orderid == 0)
      abort(404);

    $order = Orders::with(["cond","top"])->findOrFail($orderid);

    return view('review-order', [
      'order'=> $order
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
