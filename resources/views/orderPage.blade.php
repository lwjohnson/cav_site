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
          Order For: {{RCAuth::user()->username}}<br>
          <label for="entree_type">Entree:</label>
          <div id="entree_type">
            <input type="radio" class ="entree_choice"  name="entree_choice"
              value="burger" required> Burger<br>
            <input type="radio" class="entree_choice" name="entree_choice"
              value="wrap" required> Wrap<br>
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
                <label for="burgers">Burgers</label>
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
                <label for="wraps">Wraps</label>
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
            <!--Seperation from Entrees to condiments-->
            <hr/>
            <label for="condiments">Condiments</label>
            <div id="condiments">
              <div class="col-md-4">
              <?php $count = 3; ?>
              @foreach ($condiments as $condiment)
                @if($condiment->active == 1)
                  @if($count == 0)
                  </div>
                    <div class="col-md-4">
                    <?php $count = 3;?>
                  @endif
                  <input type="checkbox" method="post" name="condiments[]"
                    value="{{$condiment->condiment}}">{{$condiment->condiment}}<br>
                  <?php $count--;?>
                @endif
              @endforeach
            </div>
          </div>
        </div>


          <hr/>
          <!-- container for toppings, cheese, and fries -->
          <div class="row t_c_f" style="display: none">
            <!--Seperation from condiments to Toppings-->

            <!--Toppings container-->
            <div class="col-md-6">
              <label for="toppings">Toppings</label>
              <div class="toppings">
                <input type="hidden" name="toppings[]" value="None">
                @foreach ($toppings as $topping)
                  @if($topping->active == 1)
                  <input type="checkbox" method="post" name="toppings[]"
                    value="{{$topping->topping}}">{{$topping->topping}}<br>
                  @endif
                @endforeach
                <br>
              </div>
            </div>

            <div class="col-md-6">
              <!--Cheese container-->
              <div class="burger_stuff">
                <label for="cheese">Cheese</label>
                <div class="cheese">
                  <input type="radio" name="cheese" value="American"> American<br>
                  <input type="radio" name="cheese" value="Provolone"> Provolone<br>
                  <input type="radio" name="cheese" value="None" checked="true"> No Cheese<br>

                </div>
              </div>
              <br>

              <!--Fries container-->
              <label for="fries">Fries</label>
              <div id="fries">
                  <input type="radio" name="fries" value="1" > Yes<br>
                  <input type="radio" name="fries" value="0" required> No<br>
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
