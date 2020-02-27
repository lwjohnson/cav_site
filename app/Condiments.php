<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Condiments extends Model
  {
    protected $connection = 'sqlsrv';

    protected $appends = ['display_name'];

    protected $fillable = ['active'];

    public $incrementing = false;

  }



 ?>
