<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditIsActiveOfProductPurchaseDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_purchase_details', function (Blueprint $table) {
            $table->string('is_active')->default(1)->change();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_purchase_details', function (Blueprint $table) {
            DB::statement('ALTER TABLE `product_purchase_details` MODIFY `is_active` BOOLEAN NOT NULL;');
        });
    }
}
