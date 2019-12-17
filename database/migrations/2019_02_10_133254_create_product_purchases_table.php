<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bill_no')->nullable();
            $table->integer('product_number');
            $table->float('amount', 8, 2);
            $table->float('paid_amount', 8, 2);
            $table->float('due_amount', 8, 2);
            $table->text('description');
            $table->unsignedInteger('supplier_id');
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
        Schema::dropIfExists('product_purchases');
    }
}
