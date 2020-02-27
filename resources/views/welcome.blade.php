@extends('template')

@section('title')
  The Cavern
@endsection


@section('page_title')
        The Cavern
@endsection


@section('heading')
        at <a style="color:gray;" target="_blank" href="https://www.roanoke.edu">Roanoke College</a>
        <p style=" margin-right: 5%; float: right;">
          <?php
          if (RCAuth::attempt()):
            echo 'Logged in as ' . RCAuth::user()->username;
            ?>
            <a style="color:gray;" onclick="location.reload();location.href='logout'">Logout</a>
          <?php else: ?>
          <a style="color:gray;" onclick="location.reload();location.href='https://login.roanoke.edu/login'">Login</a>
        <?php endif;
          ?>
    </p>
@endsection


      <!--End Header-->

      <!--Begin Navigation Bar-->

@php
        $side_navigation = [
          '<span class="far fa-home" aria-hidden="true"></span> Home'=>'https://www.roanoke.edu',
          'Inside' =>'http://www.insideroanoke.com/'];
@endphp

      <!--End Navigation Bar-->

      <!--Begin Content-->
@section('content')

        <div class="row">
          <div class="col-md-6">
            <img style="width: 100%; float:left;" class="image1" src="https://www.roanoke.edu/images/diningservices/IMG_1620.JPG"></img>
          </div>
          <div style="float: right;" class="col-md-6">
            <div class="text">
              <p><h2>Eat and Run!<h2></p>
              <p><h4 style="color: black;"> The Cavern, our "grab and go" eatery located on the lower level of the Colket Center, is operated by RC Dining Services. Guests can purchase drinks, burgers, salads, wraps, subs, etc., or use the meal plan to obtain lunch or dinner Monday through Friday from 11:00 am to 11:00 pm and Saturday evenings from 5:00 pm to 11:00 pm. "Trade Meals" are designed as meal equivalents for those on the meal plan.</h4></p>
              <p><h4 style="color: black;">The Cavern also offers staging, lighting and sound systems to accommodate dances, karaoke, bingo, poetry readings and any other events organized by the college community.</h4></p>
              <form target="_blank">
                <button style=" background-color: maroon;color: white;padding: 8px;" type="button" id="menu" onclick="location.reload();location.href='https://www.roanoke.edu/inside/a-z_index/dining_services/the_cavern/cavern_menu'">View Menu</button>
                <button style=" background-color: maroon;color: white;padding: 8px;" type="button" id="order" onclick="location.reload();location.href='orderPage'"> Place Order</button>
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
      <!--End Content-->
@endsection
