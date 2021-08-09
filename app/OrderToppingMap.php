<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderToppingMap extends Model
{
  protected $primaryKey = "id";
  protected $table = "dbo.order_topping_map";
  protected $connection = 'sqlsrv';
  public $timestamps = false;
}
