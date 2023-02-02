<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReciptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipts', function (Blueprint $table) {
            $table->id();
            $table->string('bill_number')  ;
            $table->integer('doc_type') ;
            $table->dateTime('doc_date') ;
            $table->decimal('amount') ;
            $table->decimal('amount_with_tax') ;
            $table->decimal('tax') ;
            $table->string('bill_number_txt') ;
            $table->string('tax_number_txt') ;
            $table->integer('supplier_id') ;
            $table->integer('tax_type') ;
            $table->text('notes') ;
            $table->integer('shift_number') ;

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
        Schema::dropIfExists('recipts');
    }
}
