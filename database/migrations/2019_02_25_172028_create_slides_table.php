<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slides', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('lecture_id')->unsigned();
            $table->foreign('lecture_id')
                ->references('id')
                ->on('lectures')
                ->onDelete('RESTRICT');
            $table->string('title');
            $table->text('content');
            $table->string('extra_resource')->nullable();
            $table->integer('order');

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
        Schema::dropIfExists('slides');
    }
}
