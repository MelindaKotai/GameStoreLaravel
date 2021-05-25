<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJocuriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jocuri', function (Blueprint $table) {
            $table->id();
            $table->string('denumire');
            $table->double('pret',10,2);
            $table->text('descriere');
            $table->string('img')->nullable($value = true);
            $table->integer('nr_min_jucatori');
            $table->integer('nr_max_jucatori');
            $table->foreignId('categorieID')->references('id')->on('categorii')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('jocuri');
    }
}
