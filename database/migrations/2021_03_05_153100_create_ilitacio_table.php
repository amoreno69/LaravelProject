<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIlitacioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Ilitacio', function (Blueprint $table) {
            $table->id();
            $table->integer('preu');
            $table->date('data_ilitacio');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('subasta_id')->unsigned()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Ilitacio');
    }
}
