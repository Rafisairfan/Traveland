<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_guides', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('username');
            $table->string('password');
            $table->string('name');
            $table->string('fee');
            $table->longText('profile');
            $table->string('available');
            $table->softDeletes();

            //ForeignKey
             //$table->foreignId("tempatwisata_id")->constrained();
            // $table->foreign('tempat_wisata_id')->references('id')->on('tempat_wisata');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourguides');
    }
};
