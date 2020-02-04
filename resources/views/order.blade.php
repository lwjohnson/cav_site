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
        <h1 style="margin-left:2.5%; margin-top: 2%;">The Cavern</h1>
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
        <form name="order" onsubmit="return validateForm()" action="review-order" method="GET">
          <div class="entree_type col-md-12">
            <label for="entree_type">Entree:</label>
            <div id="entree_type">
              <input type="radio" class ="entree_choice"  name="entree_choice" value="burger"> Burger<br>
              <input type="radio" class="entree_choice" name="entree_choice" value="wrap"> Wrap<br>
            </div>
          </div>
          <br>
          <div class="rest">
            <!--Name and entree choice-->
            <div class="row">
              <!--name-->
              <div class="nameArea col-md-6">
                <label for="name">Name</label>
                <input id="name" method="post" class="form-control" name="name" style="margin-bottom: 5%;" type="text">
              </div>

              <!--Entrees-->
              <div class="entOptions col-md-6">
                <!--Burger options and select button-->
                <div class="burger_stuff">
                  <label for="burgers">Burgers</label>
                  <select name="burger_choice" id="burgers" class="form-control">
                    <option value="None">None</option>
                    <option value="Hamburger">Hamburger</option>
                    <option value="Black Bean Burger">Black Bean Burger</option>
                    <option value="Spicy Chicken Sandwich">Spicy Chicken Sandwich</option>
                    <option value="Grilled Chicken Sandwich">Grilled Chicken Sandwich</option>
                    <option value="Crispy Chicken Sandwich">Crispy Chicken Sandwich</option>
                    <option value="2x Peanut Butter And Jelly">2x Peanut Butter and Jelly</option>
                  </select>
                </div>

                <!--Wrap options and select button-->
                <div class="wraps">
                  <label for="wraps">Wraps</label>
                  <select name="wrap_choice" id="wraps" class="form-control">
                    <option value="None">None</option>
                    <option value="Turkey Wrap">Turkey Wrap</option>
                    <option value="Spicy Chicken Wrap">Spicy Chicken Wrap</option>
                    <option value="Grilled Chicken Wrap">Grilled Chicken Wrap</option>
                    <option value="Crispy Chicken Wrap">Crispy Chicken Wrap</option>
                    <option value="Veggie Wrap">Veggie Wrap</option>
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
                  <input type="hidden" name="condiments[]" value="None">
                  <input type="checkbox" method="post" name="condiments[]" value="Ranch"> Ranch<br>
                  <input type="checkbox" method="post" name="condiments[]" value="Honey Mustard"> Honey Mustard<br>
                  <input type="checkbox" method="post" name="condiments[]" value="Buffalo Sauce"> Buffalo Sauce<br>
                  <br>
                </div>
                <div class="col-md-4">
                  <input type="checkbox" method="post" name="condiments[]" value="Mayo"> Mayo<br>
                  <input type="checkbox" method="post" name="condiments[]" value="Deli Mustard"> Deli Mustard<br>
                  <input type="checkbox" method="post" name="condiments[]" value="Red Roasted Hummus"> Red Roasted Hummus<br>
                  <br>
                </div>
                <div class="col-md-4">
                  <input type="checkbox" method="post" name="condiments[]" value="Ketchup"> Ketchup<br>
                  <input type="checkbox" method="post" name="condiments[]" value="Bbq"> BBQ<br>
                  <input type="checkbox" method="post" name="condiments[]" value="Texas Pete"> Texas Pete<br>
                </div>
              </div>
            </div>

            <!-- container for toppings, cheese, and fries -->
            <div class="row t_c_f">
              <!--Seperation from condiments to Toppings-->
              <hr/>
              <!--Toppings container-->
              <div class="col-md-6">
                <label for="toppings">Toppings</label>
                <div class="toppings">
                  <input type="hidden" name="toppings[]" value="None">
                  <input type="checkbox" method="post" name="toppings[]" value="Tomato"> Tomato<br>
                  <input type="checkbox" method="post" name="toppings[]" value="Lettuce"> Lettuce<br>
                  <input type="checkbox" method="post" name="toppings[]" value="Red onion"> Red Onion<br>
                  <input type="checkbox" method="post" name="toppings[]" value="Pickles"> Pickles<br>
                  <input type="checkbox" method="post" name="toppings[]" value="Cucumbers"> Cucumbers<br>
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
                    <input type="radio" name="fries" value="Yes" > Yes<br>
                    <input type="radio" name="fries" value="No"> No<br>
                </div>
              </div>
            </div>
            <br>

            <!--Submit button-->
            <button type="submit" class="btn btn-default submit" value="Submit Order">Place Order
            <br><br>
          </div>
        </form>
      </div>
      <!--End Content-->
    </div> 
  </body>
</html>
