<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('bill_details_items', function (Blueprint $table) {
                $table->id();
                $table->integer('bill_details_id');
            $table->integer('item_sizes_id');
            $table->unique(['bill_details_id', 'item_sizes_id']);
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
        Schema::dropIfExists('bill_details_items');
    }
}
