<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCotxeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Cotxe', function (Blueprint $table) {
            $table->id();
            $table->string('nom',255);
            $table->string('matricula',20);
            $table->enum('tipus_de_cotxe',['esportiu', 'suv', 'turisme', 'monovolum', 'tot terreny', 'furgoneta', 'camioneta']);
            $table->enum('motor', ['Elèctric', 'Benzina', 'Gaseoil']);
            $table->string('path',255)->nullable();
            $table->enum('marca', ['Audi', 'Mercedes', 'BMW']);
            $table->boolean('subasta')->default(false);
            $table->integer('user_id')->unsigned()->index();
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
        Schema::dropIfExists('Cotxe');
    }
}
