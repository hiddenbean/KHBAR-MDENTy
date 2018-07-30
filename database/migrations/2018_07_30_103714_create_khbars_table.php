<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKhbarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('khbars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('coordinate_id');
            $table->integer('partner_id');
            $table->integer('subject_id');
            $table->timestamps();
        });
        Schema::rename('khbars', 'khbarat');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('khbars');
    }
}
