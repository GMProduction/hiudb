<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('event_location');
            $table->text('description');
            $table->date('start_register_date');
            $table->date('end_register_date');
            $table->integer('quota');
            $table->text('url_cover')->nullable(true)->default(null);
            $table->bigInteger('id_comitee')->unsigned()->nullable(true);
            $table->foreign('id_comitee')->references('id')->on('comitees');
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
        Schema::dropIfExists('events');
    }
}
