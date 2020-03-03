@extends('template')

@section('page_title')
        The Cavern
@endsection


@section('page_title')
        Review Order
@endsection


@section('heading')
  Review Order
<p style=" margin-right: 5%; float: right;">
  Logged in as {{ RCAuth::user()->username}}
    <a style="color:maroon;" href="../logout">Logout</a>
</p>
@endsection


      <!--End Header-->

      <!--Begin Navigation Bar-->

      <!--End Navigation Bar-->

      <!--Begin Content-->
@section('content')
<div class="order_details">
  <h1>Order Details</h1>
  <h3>Order Number: {{$order->id}}</h3>
  <h4>Created On: {{\Carbon\Carbon::parse($order->created_at)->format("n/j/Y g:i a")}}</h4>
  <h4>For: {{$order->name}}</h4>
  <h4>For: {{$order->entree}}</h4>

  <h4>Condiments:
    <ul>
    @foreach ($order->cond as $cond)
      <li>~{{$cond->condiment}} </li>
    @endforeach
    </ul>
  </h4>

  <h4>Toppings:
    <ul>
    @foreach ($order->top as $top)
      <li>~{{$top->topping}} </li>
    @endforeach
    </ul>
  </h4>

  <h4>Cheese: {{$order->cheese}}</h4>
  <h4>Fries: {{determine_fries($order->fries)}}</h4>
  <?php

      function determine_fries($f) {
        if($f==1) {
          return "Add fries";
        } else {
          return "No fries";
        }
      }

  ?>
</div>

@if($is_admin)
  <a style="color: white; background-color: gray; " href="{{action('ReviewController@delete', ['orderid' => $order->id])}}">Complete/Delete Order</a><br><br>
@endif
<!--End Content-->
<a href="../" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
<a href="{{action("OrderPageController@show")}}" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>
<a href="{{action("AllOrdersController@show")}}" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">All Orders</a>
@endsection
