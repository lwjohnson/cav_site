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
        <h3 style="margin-left:5%;"> at <a target="_blank" href="https://www.roanoke.edu">Roanoke College</a></h3>
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
            function determine_entree() {
              if($_GET['entree_choice']=== "burger") {
                return $_GET['burger_choice'];
              } else {
                return $_GET['wrap_choice'];
              }
            }

            function print_array_elements($x) {
              $ret = '';
              $n = count($x);
              if($n <= 1){
                return "None.";
              }
              for($i = 1; $i < $n-1; $i++){
                 $ret = $ret . $x[$i] . ", ";
              }
              $ret = $ret . $x[$n-1] . ".";
              return $ret;
            }

            function determine_fries() {
              if($_GET['fries']=== "Yes") {
                return "Add fries";
              } else {
                return "No fries";
              }
            }



            $condiments = $_GET['condiments'];
            $toppings = $_GET['toppings'];

            date_default_timezone_set('America/New_York');
            $made_day = date("D");
            $time = date("h:i");
            echo "<h1>Order Details \n</h1>";
            echo "<h4>Created on: " . $made_day . " at ". $time ."\n</h4>";
            echo "<h4>For: " . $_GET['name'] .".\n</h4>";
            echo "<h4>Entree: " . determine_entree() .".\n</h4>";
            echo "<h4>Condiments: " . print_array_elements($condiments) ."\n</h4>";
            echo "<h4>Toppings: " . print_array_elements($toppings) ."\n</h4>";
            echo "<h4>Cheese: " . $_GET['cheese'] .".\n</h4>";
            echo "<h4> Fries: " . determine_fries() . ".\n</h4>";
        ?>
      </div>
      <!--End Content-->

    </div>
  </body>
</html>
