<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sale_no');
            $table->integer('product_number');
            $table->float('amount', 8, 2);
            $table->float('paid_amount', 8, 2);
            $table->float('due_amount', 8, 2);
            $table->text('description');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('added_by');
            $table->tinyInteger('sale_status');
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
        Schema::dropIfExists('sales');
    }
}
