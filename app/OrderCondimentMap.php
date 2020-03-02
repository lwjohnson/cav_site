<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderCondimentMap extends Model
{
    protected $primaryKey = "id";
    protected $table = "dbo.order_condiment_map";
    protected $connection = 'sqlsrv';
    public $timestamps = false;

}
