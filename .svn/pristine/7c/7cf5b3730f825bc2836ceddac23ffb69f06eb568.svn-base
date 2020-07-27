<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMemberProgramTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('member_programs', function (Blueprint $table) {
            //
            $table->unsignedBigInteger('coache_id') ;
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
        Schema::table('member_programs', function (Blueprint $table) {
            //
            $table->dropForeign('member_programs_coache_id_foreign');
            $table->dropColumn('coache_id');

        });
    }
}
