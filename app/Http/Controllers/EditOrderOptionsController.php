<?php

namespace App\Http\Controllers;
use DB;
use App\Toppings;
use App\Condiments;
use App\Wraps;
use App\Burgers;
use RCAuth;
use Redirect;
use Request;

class EditOrderOptionsController
{

  public function show()
  {
    return view('editOrderOptions', [
      'toppings'=>Toppings::all(),
      'condiments'=>Condiments::all()
    ]);
  }

  public function update()
  {
    $cond = Condiments::all();
    $top = Toppings::all();

    for($i = 0; $i < 9; $i++){
      $matched = 0;
      foreach(request()->condiments as $c) {
        if($cond[$i]->condiment == $c){
          Condiments::where('id', $i+1)->first()->update(['active'=> 1]);
          $matched = 1;
        }
      }
      if($matched == 0)
        Condiments::where('id', $i+1)->first()->update(['active'=> 0]);

    }

    for($i = 0; $i < 5; $i++){
      $matched = 0;
      foreach(request()->toppings as $t) {
        if($top[$i]->topping == $t){
          Toppings::where('id', $i+1)->first()->update(['active'=> 1]);
          $matched = 1;
        }
      }
      if($matched == 0)
        Toppings::where('id', $i+1)->first()->update(['active'=> 0]);

    }




    return view('editOrderOptions', [
      'toppings'=>Toppings::all(),
      'condiments'=>Condiments::all(),
      'Saved' => "Changes Saved!"
    ]);
  }
}
