<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Orders extends Model
  {

    protected $connection = 'sqlsrv';
    protected $primaryKey = "id";
    protected $table      = "orders";


    public function condiments()
    {
      return $this->hasMany(Condiments::class);
    }

    public function toppings()
    {
      return $this->hasMany(Toppings::class);
    }

  }



 ?>
