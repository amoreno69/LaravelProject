<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubastaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Subasta', function (Blueprint $table) {
            $table->id();
            $table->integer('ilitació_minima');
            $table->dateTime('data_final');
            $table->boolean('activa');
            $table->integer('user_id')->unsigned()->index();
            $table->integer('cotxe_id')->unsigned()->index();
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
        Schema::dropIfExists('Subasta');
    }
}
