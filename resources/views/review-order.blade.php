<!doctype html>
<html>
  <head>
    <!-- PAGE TITLE -->
    <title>The Cavern</title>

    <link media="all" type="text/css" rel="stylesheet" href="//redstone.roanoke.edu/shared/template/public/assets/stylesheets/bootstrap.css">
    <link media="all" type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- STYLES -->
    <style>
      h4 {
        color: black;
      }
      .order_details {
        margin-left: 5%;
        margin-bottom: 20px;
      }
    </style>
  </head>
  <body>
    <div class = "main-container">

      <!--Begin Header Bar -->

      <div  style="background-color: maroon;" class="header-container container-fluid top-bar">
        <h1 style="color: white; margin-left:2.5%; margin-top: 2%;">The Cavern</h1>
        <h3 style="margin-left:5%;">Review Order</h3>
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
      <div class="order_details">
        <?php

            function determine_fries($f) {
              if($f==1) {
                return "Add fries";
              } else {
                return "No fries";
              }
            }



            echo "<h1>Order Details\n</h1>";
            echo "<h3>Order Number: $order\n</h3>";
            echo "<h4>Created on: $created.\n</h4>";
            echo "<h4>For: $name.\n</h4>";
            echo "<h4>Entree: $entree.\n</h4>";
            echo "<h4>Condiments: $condiments.\n</h4>";
            echo "<h4>Toppings: $toppings\n</h4>";
            echo "<h4>Cheese: $cheese.</h4>";
            echo "<h4> Fries: " . determine_fries($fries) . ".\n</h4>";
        ?>
      </div>
      <!--End Content-->
      <a href="./" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Return To Cavern Homepage</a>
      <a href="../orderPage" class="btn btn-primary "  style="margin-left: 20px;background-color: #333333;">Order</a>
    </div>
  </body>
</html>
