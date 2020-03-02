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
        <a style="color:red;" href="logout">Logout</a>
    </p>

@endsection

@section("javascript")
  <script>
   $(document).ready(function(){
     $(".entree_choice").click(() => {
         var val = $("input[name=entree_choice]:checked").val();
         $(".condiment").show();
         $(".t_c_f").show();
         $(".rest").show();
         if(val == "burger"){
           $(".burger_stuff").show();
           $(".wraps").hide();
         } else {
           $(".wraps").show();
           $(".burger_stuff").hide();
         }
     });
   });
  </script>
@endsection


@section('content')

  <!--End Jquery-->
    <!--Contianer for name, entree choice, condements, etc. -->
    <div  class="all" class = "container-fluid padded">

      <!--Entree radio button selection-->
      <form onsubmit="" action="{{action("OrderPageController@create")}}" method="POST">
        @csrf
        <input type="hidden" name="name" value="<?php echo RCAuth::user()->username;?>">
        <div class="nameArea col-md-6">
          <label>Order For: {{RCAuth::user()->username}}</label><br>
          <label for="entree_type">Entree:</label>
          <div id="entree_type">
            <label>
              <input type="radio" class ="entree_choice"  name="entree_choice" value="burger" required> Burger<br>
            </label><br><label>
              <input type="radio" class="entree_choice" name="entree_choice" value="wrap" required> Wrap<br>
            </label>
          </div>

        </div>
        <br>



        <div class="rest">
          <!--Name and entree choice-->
          <div class="row">
            <!--name-->

            <div class="col-md-6">
            <!--Entrees-->
            <div class="entOptions col-md-6">
              <!--Burger options and select button-->
              <div class="burger_stuff" style="display: none">
                <label for="burgers">Burgers:</label>
                <select name="burger_choice" id="burgers" class="form-control">
                  @foreach($burgers as $burger)
                    @if($burger->active ==1)
                      <option value="{{$burger->entree}}">{{$burger->entree}}</option>
                    @endif
                  @endforeach
                </select>
              </div>

              <!--Wrap options and select button-->
              <div class="wraps" style="display: none">
                <label for="wraps">Wraps:</label>
                <select name="wrap_choice" id="wraps" class="form-control">
                  @foreach($wraps as $wrap)
                    @if($wrap->active ==1)
                      <option value="{{$wrap->entree}}">{{$wrap->entree}}</option>
                    @endif
                  @endforeach
                </select>
              </div>
            </div>
          </div>
        </div>


          <!--Condiments selection-->
          <div class="row condiment" style="display: none">
            <div class="col-md-12">
              <!--Seperation from Entrees to condiments-->
              <hr/>
              <label for="condiments">Condiments:</label>
              <div class="condiments">
                @foreach ($condiments as $condiment)
                  <div class="col-md-4">
                    <label>
                      <input type="checkbox" method="post" name="condiments[]"
                        value="{{$condiment->id}}"> {{$condiment->condiment}}
                    </label>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>


          <hr/>
          <!-- container for toppings, cheese, and fries -->
          <div class="row t_c_f" style="display: none">
            <!--Seperation from condiments to Toppings-->

            <!--Toppings container-->
            <div class="col-md-6">
              <label for="toppings">Toppings:</label>
              <div class="toppings">
                @foreach ($toppings as $topping)
                  <div class="col-md-6">
                    <label>
                      <input type="checkbox" method="post" name="toppings[]"
                    value="{{$topping->id}}"> {{$topping->topping}}<br>
                  </label>
                </div>
                @endforeach
                <br>
              </div>
            </div>

            <div class="col-md-6">
              <!--Cheese container-->
              <div class="burger_stuff">
                <label for="cheese">Cheese:</label>
                <div class="cheese">
                  <label>
                    <input type="radio" name="cheese" value="American"> American<br>
                  </label><br><label>
                    <input type="radio" name="cheese" value="Provolone"> Provolone<br>
                  </label>
                </div>
              </div>
              <br>

              <!--Fries container-->
              <label for="fries">Fries:</label>
              <div id="fries">
                <label>
                  <input type="radio" name="fries" value="1" > Yes<br>
                </label><br><label>
                  <input type="radio" name="fries" value="0" required> No<br>
                </label>
              </div>
            </div>
          </div>
          <br>

          <!--Submit button-->
          <button type="submit" class="btn btn-default submit"
            value="Submit Order">Place Order</button>
          <br><br>
        </div>
      </form>
    </div>

@endsection

      <!--End Content-->
