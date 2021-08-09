<?php

  namespace App;

  use Illuminate\Database\Eloquent\Model;

  class Admins extends Model
  {
    protected $table = 'site_admins';

    protected $connection = 'sqlsrv';

    protected $appends = ['display_name'];

    public $incrementing = false;

  }



 ?>
