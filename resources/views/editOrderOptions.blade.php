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
      if (RCAuth::attempt()):
        echo 'Logged in as ' . RCAuth::user()->username;

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

  <?php
  if($u != null):
    if($Saved ?? '' != null)
      echo $Saved ?? '';?>
  <!--End Jquery-->
    <!--Contianer for name, entree choice, condements, etc. -->
    <div  class="" class = "container-fluid padded">

      <!--Entree radio button selection-->
      <form onsubmit="" action="orderOptionsUpdate" method="POST">
        @csrf

        <input type="hidden" name="name" value="<?php echo RCAuth::user()->username;?>">

          Admin: <?php echo RCAuth::user()->username;?>

          <br><br>
        <div class="rest">
          <!--Name and entree choice-->



          <!--Condiments selection-->
          <div class="row condiment col-md-6">
            <!--Seperation from Entrees to condiments-->

            <label for="condiments">Condiments</label>
            <div id="condiments">
              <div class="col-md-4">
              <?php
              $count = 3;
              foreach ($condiments as $c):
                  if($count == 0):?>
                  </div>
                    <div class="col-md-4">
                    <?php $count = 3;
                  endif;?>
                  <input type="checkbox" method="post" name="condiments[]"
                    value="{{$c->condiment}}"
                     <?php
                        if($c->active == 1) : ?>
                        checked="true"

                    <?php endif;?>  >{{$c->condiment}}<br>
                  <?php $count=$count - 1;

              endforeach; ?>
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
                <?php foreach ($toppings as $topping): ?>
                  <input type="checkbox" method="post" name="toppings[]"
                    value="{{$topping->topping}}"
                    <?php
                       if($topping->active == 1) : ?>
                       checked="true"

                   <?php endif;?>  >{{$topping->topping}}<br>

                <?php endforeach; ?>
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
      <form action="createTopping" method="POST">
        {{ csrf_field() }}
        <label for="t">New Topping</label>
        <input type="text" id="t" name="t" required></input>
        <button for="newt" type="submit" class="btn btn-default submit" value="newt">Add Topping</button>
      </form>
    </div>
  <?php else: ?>
    <h3>Not logged in to admin account.<h3>
    <?php endif;?>




@endsection
