@extends('template')

@section('title')
  The Cavern
@endsection


@section('page_title')
        Review Order
@endsection


@section('heading')
at <a style="color:red;" target="_blank" href="https://www.roanoke.edu">Roanoke College</a>
<p style=" margin-right: 5%; float: right;">
  <?php
  use App\Admins;
  $Saved ?? '';
  $s = $Saved ?? '';
  $u = new Admins;
  $u = null;
  if (RCAuth::attempt()):
    echo 'Logged in as ' . RCAuth::user()->username;

    $u = Admins::where('username', RCAuth::user()->username)->first();
    ?>
    <a style="color:red;" onclick="location.reload();location.href='../logout'">Logout</a>
  <?php else: ?>
  <a style="color:red;" onclick="location.reload();location.href='https://login.roanoke.edu/login'">Login</a>
<?php endif; ?>
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
      echo "<h3>Order Number: $o->id\n</h3>";
      echo "<h4>Created on: $o->created.\n</h4>";
      echo "<h4>For: $o->name.\n</h4>";
      echo "<h4>Entree: $o->entree.\n</h4>";
      echo "<h4>Condiments: $o->condiments.\n</h4>";
      echo "<h4>Toppings: $o->toppings\n</h4>";
      echo "<h4>Cheese: $o->cheese.</h4>";
      echo "<h4> Fries: " . determine_fries($o->fries) . ".\n</h4>";
  ?>
</div>

<?php if($u != null): ?>
  <a style="width: 30px; height: 30; color: white; background-color: red; " href="../deleteOrder/<?php echo $o->id;?>">Delete Order</a><br><br>
<?php endif;?>
<!--End Content-->
<a href="../" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
<a href="../orderPage" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>
<a href="../allorders" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">All Orders</a>
@endsection
