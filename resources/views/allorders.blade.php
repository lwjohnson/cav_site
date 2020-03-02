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
  Logged in as {{ RCAuth::user()->username}}
    <a style="color:red;" href="logout">Logout</a>
</p>

@endsection


      <!--Begin Content-->
@section('content')
<div class="order_details">
  @foreach($orders as $order)
    @if($order->id != 0)
      <h2><a style='color:maroon;' href='review-order/{{$order->id}}'> Order {{$order->id}} for {{$order->name}} </a></h2>
      @if($is_admin)
        <a style="width: 30px; height: 30; color: white; background-color: red; " href="deleteOrder/{{$order->id}}">Complete/Delete Order</a><br><br>
      @endif
      <br>
    @endif
  @endforeach
</div>

<!--End Content-->
<a href="./" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
<a href="{{action("OrderPageController@show")}}" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>

@endsection
