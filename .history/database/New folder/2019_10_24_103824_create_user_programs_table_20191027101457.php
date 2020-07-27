<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_programs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('program_id')->nullable();

            $table->unsignedInteger('member_id')->nullable();

            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');

            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
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
        Schema::table('member_programs', function (Blueprint $table) {
            $table->dropForeign('member_programs_program_id_foreign');
            $table->dropColumn('program_id');
            $table->dropForeign('member_programs_member_id_foreign');
            $table->dropColumn('member_id');

        });

        Schema::dropIfExists('member_programs');
    }
}
