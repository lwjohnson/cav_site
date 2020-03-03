@extends('template')

@section('title')
  The Cavern
@endsection


@section('page_title')
        The Cavern
@endsection


@section('heading')
  Review Orders
<p style=" margin-right: 5%; float: right;">
  Logged in as {{ RCAuth::user()->username}}
    <a style="color:maroon;" href="logout">Logout</a>
</p>

@endsection


      <!--Begin Content-->
@section('content')
<div class="order_details">
  @foreach($orders as $order)
      <h4><a style='color:maroon;' href='review-order/{{$order->id}}'> Order {{$order->id}} for {{$order->name}} </a>
      @if($is_admin)
        <a style="color: white; background-color: gray; " href="deleteOrder/{{$order->id}}">Complete/Delete Order</a><br><br>
      @endif
    </h4>
  @endforeach
</div>
{{ $orders->links() }}

<!--End Content-->
<a href="./" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
<a href="{{action("OrderPageController@show")}}" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>

@endsection
