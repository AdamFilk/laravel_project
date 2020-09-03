<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginalpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('originalpackages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('price');
            $table->longText('photo');
             $table->foreignId('locationid')->references('id')->on('locations')
            ->onDelete('cascade');
                      
            $table->softDeletes();
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
        Schema::dropIfExists('originalpackages');
    }
}