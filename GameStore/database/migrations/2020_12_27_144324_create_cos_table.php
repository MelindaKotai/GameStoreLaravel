<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produs')->references('id')->on('jocuri')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('id_client')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('cantitate');
            $table->date('data');
            $table->string('starecomanda');
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
        Schema::dropIfExists('cos');
    }
}
