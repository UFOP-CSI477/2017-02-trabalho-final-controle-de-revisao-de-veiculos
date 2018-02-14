<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEmvistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vistorias', function (Blueprint $table) {
          $table->date('data');
          $table->time('hora');
          $table->double('quilometragem',10,2);
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')->references('id')->on('users');
          $table->integer('veiculo_id')->unsigned();
          $table->foreign('veiculo_id')->references('id')->on('veiculos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vistorias', function (Blueprint $table) {
            //
        });
    }
}
