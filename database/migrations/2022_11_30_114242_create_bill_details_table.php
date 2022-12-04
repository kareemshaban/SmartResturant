<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_details', function (Blueprint $table) {
            $table->id();
            $table->integer('bill_id')  ;
            $table->integer('item_id') ;
            $table->integer('size_id') ;
            $table->integer('item_size_id') ;
            $table->integer('qnt') ;
            $table->decimal('price');
            $table->decimal('priceWithVat');
            $table->decimal('total');
            $table->decimal('totalWithVat');
            $table->integer('isExtra');
            $table->integer('extra_item_id');
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
        Schema::dropIfExists('bill_details');
    }
}
