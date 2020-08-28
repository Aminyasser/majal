<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostpageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postpage', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('dis');
            $table->string('video');
            $table->string('pic');
            $table->string('pic2');
            $table->string('pic3');
            $table->string('pic4');
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
        Schema::dropIfExists('postpage');
    }
}
