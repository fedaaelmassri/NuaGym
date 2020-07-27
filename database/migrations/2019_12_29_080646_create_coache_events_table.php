<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoacheEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coache_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('coache_id');
            $table->unsignedBigInteger('event_id') ;
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

        Schema::table('coache_events', function (Blueprint $table) {
            $table->dropForeign('coache_events_coache_id_foreign');
            $table->dropColumn('coache_id');
            $table->dropForeign('coache_events_event_id_foreign');
            $table->dropColumn('event_id');

        });

        Schema::dropIfExists('coache_events');
    }
}
