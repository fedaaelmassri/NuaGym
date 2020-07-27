<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoacheClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coache_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('coache_id');
            $table->unsignedBigInteger('event_id') ;
            $table->timestamps();
            $table->foreign('coache_id')->references('id')->on('coaches')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

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
        Schema::dropIfExists('coache_classes');
    }
}
