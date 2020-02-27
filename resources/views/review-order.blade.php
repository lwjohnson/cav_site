@extends('template')

@section('title')
  The Cavern
@endsection


@section('page_title')
        Review Order
@endsection


@section('heading')
at <a style="color:gray;" target="_blank" href="https://www.roanoke.edu">Roanoke College</a>
<p style=" margin-right: 5%; float: right;">
  <?php
  if (RCAuth::attempt()):
    echo 'Logged in as ' . RCAuth::user()->username;
    ?>
    <a style="color:gray;" href="https://login.roanoke.edu/logout">Logout</a>
  <?php else: ?>
  <a style="color:gray;" href="https://login.roanoke.edu/login">Login</a>
<?php endif;
  ?>
</p>
@endsection


      <!--End Header-->

      <!--Begin Navigation Bar-->

@php
        $side_navigation = [
          '<span class="far fa-home" aria-hidden="true"></span> Home'=>'https://www.roanoke.edu',
          'Inside' =>'http://www.insideroanoke.com/'];
@endphp

      <!--End Navigation Bar-->

      <!--Begin Content-->
@section('content')
<div class="order_details">
  <?php

      function determine_fries($f) {
        if($f==1) {
          return "Add fries";
        } else {
          return "No fries";
        }
      }



      echo "<h1>Order Details\n</h1>";
      echo "<h3>Order Number: $order\n</h3>";
      echo "<h4>Created on: $created.\n</h4>";
      echo "<h4>For: $name.\n</h4>";
      echo "<h4>Entree: $entree.\n</h4>";
      echo "<h4>Condiments: $condiments.\n</h4>";
      echo "<h4>Toppings: $toppings\n</h4>";
      echo "<h4>Cheese: $cheese.</h4>";
      echo "<h4> Fries: " . determine_fries($fries) . ".\n</h4>";
  ?>
</div>
<!--End Content-->
<a href="../" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
<a href="../orderPage" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>

@endsection
