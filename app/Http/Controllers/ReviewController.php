<?php
namespace App\Http\Controllers;

class ReviewController
{
  public function show($orderid)
  {

   return view('review-order');
  }
}

?>
