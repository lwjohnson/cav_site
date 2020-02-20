<!doctype html>
<html>
  <head>
    <!-- PAGE TITLE -->
    <title>Order Form</title>

    <link media="all" type="text/css" rel="stylesheet" href="//redstone.roanoke.edu/shared/template/public/assets/stylesheets/bootstrap.css">
    <link media="all" type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>

    <!--JQUERY-->
    <script>
       function validateForm(){
         var x = document.forms["order"]["name"].value
         var y = document.forms["order"]["fries"].value
         alert("HIII")
         var t = true
         var response = ""

         if(x==""){
           response+= "\nName must be filled out."
           t = false
         }
         if(y==""){
           response+= "\nFries must be filled out."
           t = false
         }
         if (response != "")
           alert(response)
         return t
       }
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
    <!-- Styles -->
    <style>
      .top-bar {
        background-color: maroon;
        color: white;
      }
      h4 {
        color: black;
      }
      .submit {
        float: right;
      }
    </style>
    <!--End Styles-->
  </head>

  <body>
    <!--container for main page-->
    <div class = "main-container">
      <!--Begin Header Bar -->

      <div class="header-container container-fluid top-bar">
        <h1 style="color: white; margin-left:2.5%; margin-top: 2%;">The Cavern</h1>
        <h3 style="margin-left:5%;">Order Form</h3>
      </div>

      <!--END Header Bar -->

      <!--Begin Navigation Bar-->

      <div class="row gutter" style="margin: 0px 5px 10px 5px;">
        <div class="pull-right btn-group btn-group-justified btn-nav">
          <a  href="http://www.roanoke.edu" class="btn btn-primary " style="background-color: #333333;">
            <span class="fa fa-home" aria-hidden="true"></span>
            <span class="hidden-xs">
              Home
            </span>
          </a>
          <a href="http://www.insideroanoke.com" class="btn btn-primary "  style="background-color: #333333;">
            <span class="fa fa-send" aria-hidden="true"></span>
            <span class="hidden-xs">
              Inside
            </span>
          </a>
        </div>
      </div>

      <!--End Navigation Bar-->

      <!--Begin Content-->


      <!--Contianer for name, entree choice, condements, etc. -->
      <div class = "container-fluid padded">

        <!--Entree radio button selection-->
        <form onsubmit="return validateForm()" action="order" method="POST">
          @csrf
          <div class="entree_type col-md-12">
            <label for="entree_type">Entree:</label>
            <div id="entree_type">
              <input type="radio" class ="entree_choice"  name="entree_choice" value="burger" required> Burger<br>
              <input type="radio" class="entree_choice" name="entree_choice" value="wrap" required> Wrap<br>
            </div>
          </div>
          <br>

          <div class="nameArea col-md-6">
            <label for="name">Name</label>
            <input id="name" method="post" class="form-control" name="name" style="margin-bottom: 5%;" type="text" value="{{old('name')}}">
            @error('title')
              <p class="help is-danger">{{$errors->first('title')}}</p>
            @enderror
          </div>

          <div class="rest">
            <!--Name and entree choice-->
            <div class="row">
              <!--name-->


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
                    <input type="checkbox" method="post" name="condiments[]" value="{{$c->condiment}}">{{$c->condiment}}<br>
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
                    <input type="checkbox" method="post" name="toppings[]" value="{{$topping->topping}}">{{$topping->topping}}<br>
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
                    <input type="radio" name="fries" value="1" required> Yes<br>
                    <input type="radio" name="fries" value="0" required> No<br>
                </div>
              </div>
            </div>
            <br>

            <!--Submit button-->
            <button type="submit" class="btn btn-default submit" value="Submit Order">Place Order</button>
            <br><br>
          </div>
        </form>
      </div>
      <!--End Content-->
    </div>
  </body>
</html>
