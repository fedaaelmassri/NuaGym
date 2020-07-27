<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoachesProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coaches_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('program_id')->nullable();

            $table->unsignedInteger('coache_id')->nullable();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

            $table->foreign('coache_id')->references('id')->on('coaches')->onDelete('cascade');
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
        Schema::dropIfExists('coaches_programs');
    }
}
