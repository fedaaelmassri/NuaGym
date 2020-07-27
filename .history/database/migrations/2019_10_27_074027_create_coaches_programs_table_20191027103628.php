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
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
             $table->integer('program_id')->unsigned();
            $table->integer('coache_id')->unsigned();
            $table->timestamps();
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
            $table->foreign('coache_id')->references('id')->on('coaches')->onDelete('cascade');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        Schema::table('coaches_programs', function (Blueprint $table) {
            $table->dropForeign('coaches_programs_program_id_foreign');
            $table->dropColumn('program_id');
            $table->dropForeign('coaches_programs_coache_id_foreign');
            $table->dropColumn('coache_id');

        });
        Schema::dropIfExists('coaches_programs');
    }
}
