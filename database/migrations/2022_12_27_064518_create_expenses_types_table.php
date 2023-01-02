<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses_types', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')  ;
            $table->string('name_en') ;
            $table->text('description_ar') ;
            $table->text('description_en') ;
            $table->integer('show_bill_number') ;
            $table->integer('show_supplier_name') ;
            $table->integer('show_tax_number') ;
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
        Schema::dropIfExists('expenses_types');
    }
}
