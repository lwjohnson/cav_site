
<!doctype html>
<html>
  <head>
    <title>The Cavern</title>
    <link media="all" type="text/css" rel="stylesheet" href="//redstone.roanoke.edu/shared/template/public/assets/stylesheets/bootstrap.css">
    <link media="all" type="text/css" rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>

  <body>
    <div class = "main-container">
      <div  style="background-color: maroon;" class="header-container container-fluid top-bar">
        <h1 style="color: white; margin-left:2.5%; margin-top: 2%;">The Cavern</h1>
        <h3 style="margin-left:5%;"> at <a target="_blank" href="https://www.roanoke.edu">Roanoke College</a></h3>
      </div>

      <div class="container-fluid padded">
        <div class="row">
          <div class="col-md-5">
            <img style="width: 100%; float:left;" class="image1" src="https://www.roanoke.edu/images/diningservices/IMG_1620.JPG"></img>
          </div>
          <div style="float: right;" class="col-md-5">
            <div class="text">
              <p><h2>Eat and Run!<h2></p>
              <p><h4 style="color: black;"> The Cavern, our "grab and go" eatery located on the lower level of the Colket Center, is operated by RC Dining Services. Guests can purchase drinks, burgers, salads, wraps, subs, etc., or use the meal plan to obtain lunch or dinner Monday through Friday from 11:00 am to 11:00 pm and Saturday evenings from 5:00 pm to 11:00 pm. "Trade Meals" are designed as meal equivalents for those on the meal plan.</h4></p>
              <p><h4 style="color: black;">The Cavern also offers staging, lighting and sound systems to accommodate dances, karaoke, bingo, poetry readings and any other events organized by the college community.</h4></p>
              <form target="_blank">
                <button style=" background-color: maroon;color: white;padding: 8px;" type="button" id="menu" onclick=" window.open('https://www.roanoke.edu/inside/a-z_index/dining_services/the_cavern/cavern_menu', '_blank'); return false;">View Menu</button>
                <button style=" background-color: maroon;color: white;padding: 8px;" type="button" id="order" onclick=" window.open('order','_blank'); return false;"> Place Order</button>
              </form>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="hours">
              <table class="table table-striped table-bordered table-hover table-condensed">
                <thead>
                  <tr>
                    <h2 id="hourstitle">Cavern Hours</h2>
                  </tr>
                  <tr>
                    <th>Day</th>
                    <th>Hours</th>
                  </tr>
                </thead>

                  <tr class="data">
                    <td>Monday</td>
                    <td>11:00 am to 11:00 pm</td>
                  <tr>
                  <tr class="data">
                    <td>Tuesday</td>
                    <td>11:00 am to 11:00 pm</td>
                  <tr>
                  <tr class="data">
                    <td>Wednesday</td>
                    <td>11:00 am to 11:00 pm</td>
                  <tr>
                  <tr class="data">
                    <td>Thursday</td>
                    <td>11:00 am to 11:00 pm</td>
                  <tr>
                  <tr class="data">
                    <td>Friday</td>
                    <td>11:00 am to 11:00 pm</td>
                  <tr>
                  <tr class="data">
                    <td>Saturday</td>
                    <td>5:00 pm to 11:00 pm</td>
                  <tr>
                  <tr>
                    <td colspan="2" id="sunday">Closed Sunday</td>
                  <tr>

                </table>
              </div>
            </div>
            <div class="col-md-6">
              <img style="width:100%; margin-top: 20px; margin-bottom: 20px;" class="image2" src="https://www.roanoke.edu/images/diningservices/IMG_1618.JPG"></img>
            </div>
          </div>
      </div>
    </div>
  </body>
</html>
