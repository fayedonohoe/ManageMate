<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserShiftTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shift', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->date('date');
          $table->bigInteger('user_id')->unsigned();
          $table->bigInteger('shift_id')->unsigned();
          $table->boolean('notAvailable');
          $table->string('note');
          $table->timestamps();

          $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');
          $table->foreign('shift_id')->references('id')->on('shifts')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_shift');
    }
}
