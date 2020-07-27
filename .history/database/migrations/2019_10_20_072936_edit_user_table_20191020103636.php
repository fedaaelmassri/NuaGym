<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('identity')->after('name');
            $table->string('mobile')->after('identity');
            $table->string('city')->after('mobile');
            $table->string('country')->after('city');
            $table->string('address')->after('country');




        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('identity');
            $table->dropColumn('mobile');
            $table->dropColumn('city');
            $table->dropColumn('country');
            $table->dropColumn('address');

        });
    }
}
