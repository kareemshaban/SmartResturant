<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->integer('billType')  ;
            $table->integer('client_id') ;
            $table->string('phone') ;
            $table->string('address') ;
            $table->integer('driver_id') ->nullable();
            $table->decimal('delivery_service')  ->nullable();;
            $table->decimal('service')  ->nullable();;
            $table->dateTime('bill_date');
            $table->string('bill_number');
            $table->decimal('total');
            $table->decimal('vat');
            $table->decimal('discount');
            $table->decimal('net');
            $table->integer('user_id');
            $table->integer('payed');
            $table->integer('state');
            $table -> integer('table_id');
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
        Schema::dropIfExists('bills');
    }
}
