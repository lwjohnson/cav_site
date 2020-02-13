<?php
namespace App\Http\Controllers;

class ReviewController
{
  public function show($order)
  {
    $orders = [
      '1' => "Hi there",
      '2' => "Goodbye"
    ];

    if(! array_key_exists($order, $orders)){
      abort(404, 'Sorry that order was not found.');

    }
    return view('review-order',[
      'order'=>$orders[$order]
    ]);
  }
}

?>
