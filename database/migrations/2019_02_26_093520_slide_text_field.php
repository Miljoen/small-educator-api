<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SlideTextField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_text_field', function (Blueprint $table) {
            $table->integer('slide_id')
                ->unsigned();
            $table->foreign('slide_id')
                ->references('id')
                ->on('slides')
                ->onDelete('RESTRICT');

            $table->integer('text_field_id')
                ->unsigned();
            $table->foreign('text_field_id')
                ->references('id')
                ->on('text_fields')
                ->onDelete('RESTRICT');

            $table->float('time_on_screen')
                ->default(10);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
