<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createreceipt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receipts', function (Blueprint $table) {
            $table->id();
           
            $table->integer('company_id');
            $table->integer('branch_id');
            $table->string('division_id');
            $table->string('payment_type');
            $table->string('payment_mode');
            $table->string('payment_date');
            $table->string('payment_by');
            $table->string('payment_to');
            $table->string('payment_amount');
            $table->string('narration');
            $table->string('status');
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
        Schema::dropIfExists('receipts');
    }
}
