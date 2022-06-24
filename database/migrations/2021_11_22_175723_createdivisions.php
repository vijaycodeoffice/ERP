<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createdivisions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
           
            $table->integer('company_id');
            $table->integer('branch_id');
            $table->string('division_name');
            $table->string('division_email')->unique();
            $table->string('division_code')->nullable();
            $table->string('division_number')->nullable();
            $table->string('division_country')->nullable();
            $table->string('division_address')->nullable();
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
        Schema::dropIfExists('divisions');
    }
}
