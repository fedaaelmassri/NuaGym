<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('payable_id');
            $table->string('payable_type');
            $table->unsignedBigInteger('member_id');
            $table->float('InvoiceValue');
            $table->string('status');
            $table->string('PaymentGateway');
            $table->string('Invoiceid');
            $table->string('InvoiceReference');
            $table->string('TransactionId');
            $table->string('TrackId');
            $table->string('OrderId');
            $table->string('Currency');
            $table->string('Currency');
           $table->date('TransactionDate');

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
        Schema::dropIfExists('transactions');
    }
}
