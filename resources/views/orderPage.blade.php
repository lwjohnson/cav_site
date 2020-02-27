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
      <?php
      use App\Admins;
      $Saved ?? '';
      $s = $Saved ?? '';
      $u = new Admins;
      $u = null;
      $loggedin = false;
      if (RCAuth::attempt()):
        echo 'Logged in as ' . RCAuth::user()->username;
        $loggedin = true;
        $u = Admins::where('username', RCAuth::user()->username)->first();
        ?>
        <a style="color:red;" onclick="location.reload();location.href='logout'">Logout</a>
      <?php else: ?>
      <a style="color:red;" onclick="location.reload();location.href='https://login.roanoke.edu/login'">Login</a>
    <?php endif; ?>
</p>

@endsection


@php
        $side_navigation = [
          '<span class="far fa-home" aria-hidden="true"></span> Home'=>'https://www.roanoke.edu',
          'Inside' =>'http://www.insideroanoke.com/'];
@endphp


@section('content')
<script>

 $(document).ready(function(){
   $(".entree_choice").click(() => {
       var val = $("input[name=entree_choice]:checked").val();
       if(val == "burger"){
         $(".condiment").show();
         $(".burger_stuff").show();
         $(".wraps").hide();
         $(".t_c_f").show();
         $(".rest").show();
       } else if (val == "wrap") {
         $(".condiment").show();
         $(".wraps").show();
         $(".burger_stuff").hide();
         $(".t_c_f").show();
         $(".rest").show();
       }
   });




   function main(){

     $(".condiment").hide();
     $(".burgers").hide();
     $(".wraps").hide();
     $(".t_c_f").hide();
     $(".rest").hide();

   }
   main();
 });
</script>
  <!--End Jquery-->
    <?php if($loggedin): ?>
    <!--Contianer for name, entree choice, condements, etc. -->
    <div  class="all" class = "container-fluid padded">

      <!--Entree radio button selection-->
      <form onsubmit="" action="order" method="POST">
        @csrf
        <input type="hidden" name="name" value="<?php echo RCAuth::user()->username;?>">
        <div class="nameArea col-md-6">
          Order For: <?php echo RCAuth::user()->username;?>


            <p class="is-danger"><?php echo $errors->first(); ?></p>

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
              <div class="burger_stuff">
                <label for="burgers">Burgers</label>
                <select name="burger_choice" id="burgers" class="form-control">
                  <?php foreach($burgers as $b):
                    if($b->active ==1): ?>
                      <option value="{{$b->entree}}">{{$b->entree}}</option>
                    <?php endif;
                  endforeach;?>
                </select>
              </div>

              <!--Wrap options and select button-->
              <div class="wraps">
                <label for="wraps">Wraps</label>
                <select name="wrap_choice" id="wraps" class="form-control">
                  <?php foreach($wraps as $w):
                    if($w->active ==1): ?>
                      <option value="{{$w->entree}}">{{$w->entree}}</option>
                    <?php endif;
                  endforeach;?>

                </select>
              </div>
            </div>
          </div>
        </div>


          <!--Condiments selection-->
          <div class="row condiment">
            <!--Seperation from Entrees to condiments-->
            <hr/>
            <label for="condiments">Condiments</label>
            <div id="condiments">
              <div class="col-md-4">
              <?php
              $count = 3;
              foreach ($condiments as $c):
                if($c->active == 1):
                  if($count == 0):?>
                  </div>
                    <div class="col-md-4">
                    <?php $count = 3;
                  endif;?>
                  <input type="checkbox" method="post" name="condiments[]"
                    value="{{$c->condiment}}">{{$c->condiment}}<br>
                  <?php $count=$count - 1;
                endif;
              endforeach; ?>
            </div>
          </div>
        </div>


          <hr/>
          <!-- container for toppings, cheese, and fries -->
          <div class="row t_c_f">
            <!--Seperation from condiments to Toppings-->

            <!--Toppings container-->
            <div class="col-md-6">
              <label for="toppings">Toppings</label>
              <div class="toppings">
                <input type="hidden" name="toppings[]" value="None">
                <?php foreach ($toppings as $topping):
                  if($topping->active == 1) : ?>
                  <input type="checkbox" method="post" name="toppings[]"
                    value="{{$topping->topping}}">{{$topping->topping}}<br>
                  <?php endif;
                endforeach; ?>
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
  <?php else: ?>
    <div class="login">
      <h3>Must Login before ordering.</h3>
    </div>
  <?php endif;?>

@endsection

      <!--End Content-->
