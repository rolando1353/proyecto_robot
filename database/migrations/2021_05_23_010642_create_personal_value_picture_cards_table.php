<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalValuePictureCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_value_picture_cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_value_id');
            $table->timestamps();

            $table->foreign('personal_value_id')->references('id')->on('personal_values');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_value_picture_cards');
    }
}
