<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBubblesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bubbles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('coordinate_id');
            $table->integer('radius_id');
            $table->integer('bubbleable_id');
            $table->string('bubbleable_type');
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
        Schema::dropIfExists('bubbles');
    }
}
