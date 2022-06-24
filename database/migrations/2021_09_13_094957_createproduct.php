<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createproduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Products', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('category_name');
            $table->string('subcategory_name');
            $table->string('unit_of_measure');
            $table->integer('initial_quantity')->default(0);
            $table->integer('quantity_added')->default(0);
            $table->integer('quantity_balance')->default(0);
            $table->string('attachment');
            $table->text('narration');
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
        Schema::dropIfExists('Products');
    }
}
