@extends('template')

@section('title')
  The Cavern
@endsection


@section('page_title')
        The Cavern
@endsection


@section('heading')
    Order Page
    <p style=" margin-right: 5%; float: right;">
      Logged in as {{ RCAuth::user()->username}}
        <a style="color:red;" href="../logout">Logout</a>
    </p>

@endsection

@section('content')
 @if($is_admin)
  <!--End Jquery-->
    <!--Contianer for name, entree choice, condements, etc. -->
    <div  class="" class = "container-fluid padded">

      <!--Entree radio button selection-->
      <form onsubmit="" action="{{action("EditOrderOptionsController@update")}}" method="POST">
        @csrf

        <input type="hidden" name="name" value="{{RCAuth::user()->username}}">

          Admin: {{RCAuth::user()->username}}

          <br><br>

        <div class="col-md-12 rest">
          <!--Name and entree choice-->



          <!--Condiments selection-->
          <div class="condiment col-md-6">
            <label>Condiments</label>
            <div class="condiments">
              <input type="hidden" name="toppings[]" value="None">
              @foreach ($condiments as $c)
                    <div class="col-md-4">
                      <input type="checkbox" method="post" name="condiments[]"value="{{$c->condiment}}"
                  @if($c->active == 1) checked="true" @endif>{{$c->condiment}}<br>
                  </div>

              @endforeach
            </div>
          </div>


            <div class="col-md-6">
              <label for="toppings">Toppings</label>
              <div class="toppings">
                <input type="hidden" name="toppings[]" value="None">
                @foreach ($toppings as $topping)
                  <input type="checkbox" method="post" name="toppings[]" value="{{$topping->topping}}"
                       @if($topping->active == 1) checked="true" @endif>{{$topping->topping}}<br>
                @endforeach
                <br>

            </div>
          </div>
          <br>

          <!--Submit button-->
          <button type="submit" class="btn btn-default submit"
            value="Submit Order">Save Changes</button>
          <br><br>
        </div>
      </form>


      <form action="{{action("EditOrderOptionsController@create")}}" method="POST">
        {{ csrf_field() }}
        <label for="t">New Topping</label>
        <input type="text" id="t" name="t" required></input>
        <button for="newt" type="submit" class="btn btn-default submit" value="newt">Add Topping</button>
      </form>
      <form action="{{action("EditOrderOptionsController@create")}}" method="POST">
        {{ csrf_field() }}
        <label for="t">New Condiment</label>
        <input type="text" id="c" name="c" required></input>
        <button for="newc" type="submit" class="btn btn-default submit" value="newc">Add Condiment</button>
      </form>

    <a href="./" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
    <a href="{{action("OrderPageController@show")}}" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>
    <a href="{{action("AllOrdersController@show")}}" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">All Orders</a>
</div>
  @endif
@endsection
