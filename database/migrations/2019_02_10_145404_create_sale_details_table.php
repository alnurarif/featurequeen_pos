<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->float('unit_price', 8, 2);
            $table->float('total_price', 8, 2);
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('sale_id');
            $table->unsignedInteger('added_by');
            $table->tinyInteger('product_status');
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
        Schema::dropIfExists('sale_details');
    }
}
