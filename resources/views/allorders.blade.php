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
    <a style="color:red;" onclick="location.reload();location.href='logout'">Logout</a>
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
  <?php foreach($orders as $o){
    if($o->id != 0){
      echo "<h2><a style='color:maroon;' href='review-order/$o->id'> Order " . $o->id . " for  " . $o->name . "</a></h2>";
      echo "<br>";
    }
  }
  ?>
</div>

<!--End Content-->
<a href="./" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
<a href="./orderPage" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>

@endsection
