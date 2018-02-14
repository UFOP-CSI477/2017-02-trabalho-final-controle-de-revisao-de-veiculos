<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddServicosIDToVistoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('vistorias', function (Blueprint $table) {
          $table->integer('servico_id')->unsigned();
          $table->foreign('servico_id')->references('id')->on('servicos');
            //
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
