<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{

  public function up()
  {
    Schema::create('Orders',funtion (Blueprint $table) {
      $table->datetime('created');
      $table->string('name');
      $table->string('entree');
      $table->text('condiments');
      $table->text('toppings');
      $table->string('cheese');
      $table->int('fries');
    });
  }

  public function down()
  {
    Schema::dropIfExists('orders');

  }

}
