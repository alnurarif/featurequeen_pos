<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchase_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('quantity');
            $table->float('unit_price', 8, 2);
            $table->float('total_price', 8, 2);
            $table->text('description');
            $table->unsignedInteger('product_id');
            $table->unsignedInteger('supplier_id');
            $table->unsignedInteger('purchase_id');
            $table->unsignedInteger('added_by');
            $table->boolean('is_active');
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
        Schema::dropIfExists('product_purchase_details');
    }
}
