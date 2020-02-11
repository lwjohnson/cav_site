<?php
namespace App\Http\Controllers;

class ReviewController
{
  public function show($orderid)
  {
    $order = \DB::table('orders')->where('slug', $orderid)->first();

    dd($order);

    return view('review-order', [
      'order' =>$order
    ]);
  }
}

?>