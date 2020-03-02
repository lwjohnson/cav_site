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
        <div class="rest">
          <!--Name and entree choice-->



          <!--Condiments selection-->
          <div class="row condiment col-md-6">
            <!--Seperation from Entrees to condiments-->

            <label for="condiments">Condiments</label>
            <div id="condiments">
              <div class="col-md-4">
              <?php $count = 3; ?>
              @foreach ($condiments as $c)
                  @if($count == 0)
                  </div>
                    <div class="col-md-4">
                    <?php $count = 3; ?>
                  @endif
                  <input type="checkbox" method="post" name="condiments[]"
                  value="{{$c->condiment}}"
                  @if($c->active == 1) checked="true" @endif>{{$c->condiment}}<br>
                  <?php $count--;?>
              @endforeach
            </div>
          </div>
        </div>



          <!-- container for toppings, cheese, and fries -->
          <div class="row toppings">
            <!--Seperation from condiments to Toppings-->
            <!--Toppings container-->
            <div class="col-md-6">
              <label for="toppings">Toppings</label>
              <div class="toppings">
                <input type="hidden" name="toppings[]" value="None">
                @foreach ($toppings as $topping)
                  <input type="checkbox" method="post" name="toppings[]" value="{{$topping->topping}}"
                       @if($topping->active == 1) checked="true" @endif
                     >{{$topping->topping}}<br>
                @endforeach
                <br>
              </div>
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
    </div>
  @endif
@endsection
