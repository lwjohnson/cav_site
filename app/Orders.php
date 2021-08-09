<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Orders extends Model
  {

    protected $connection = 'sqlsrv';
    protected $primaryKey = "id";
    protected $table      = "orders";


    public function cond()
    {
      return $this->hasManyThrough(\App\Condiments::class, \App\OrderCondimentMap::class, "fkey_order", "id", "id", "fkey_condiment");
    }

    public function top()
    {
      return $this->hasManyThrough(\App\Toppings::class, \App\OrderToppingMap::class, "fkey_order", "id", "id", "fkey_topping" );
    }

  }



 ?>
