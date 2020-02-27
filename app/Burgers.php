<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Burgers extends Model
  {
    protected $connection = 'sqlsrv';

    protected $appends = ['display_name'];

    public $incrementing = false;

  }



 ?>
