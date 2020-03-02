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


    foreach($cond as $condiment){
      $matched = 0;
      foreach(request()->condiments as $condimentr) {

        if($condiment->condiment == $condimentr){
          Condiments::where('condiment', $condimentr)->first()->update(['active'=> 1]);
          $matched = 1;
        }
      }
      if($matched == 0)
        Condiments::where('condiment', $condiment->condiment)->first()->update(['active'=> 0]);
    }

    foreach($top as $topping){
      $matched = 0;
      foreach(request()->toppings as $toppingr) {
        if($topping->topping == $toppingr){
          Toppings::where('id', $topping->id)->first()->update(['active'=> 1]);
          $matched = 1;
        }
      }
      if($matched == 0)
        Toppings::where('id', $topping->id)->first()->update(['active'=>0]);
    }




    return view('editOrderOptions', [
      'toppings'=>Toppings::all(),
      'condiments'=>Condiments::all(),
      'Saved' => "Changes Saved!"
    ]);
  }

  public function create()
  {
    if(request()->t){
      $top = new Toppings;
      $top->topping = request()->t;
      $top->active = 1;
      $top->save();

    } else {

      $cond = new Condiments;
      $cond->condiment = request()->c;
      $cond->active = 1;
      $cond->save();

    }
    return redirect('orderOptions');

  }

  public function store()
  {

    $count = 1;
    $last = Condiments::where('id', $count)->first();
    while($last != null){
      $count= $count + 1;
      $last = Condiments::where('id', $count)->first();
    }
    $lastid =Condimentss::where('id', $count-1)->first();
    $cond = new Condiments;
    $cond->id = $lastid->id + 1;
    $cond->condiment = request()->t;
    $cond->active = 1;
    $cond->save();

    return redirect('orderOptions');

  }



}
