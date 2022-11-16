<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('code') ->unique(); 
            $table->string('name_ar') ->unique();
            $table->string('name_en') ->unique();
            $table->integer('type') ;
            $table->integer('category_id') ;
            $table->string('description_ar') ->nullable();
            $table->string('description_en') ->nullable();
            $table->string('img') ;
            $table->integer('isAddValue') ->nullable();
            $table->decimal('addValue') ->nullable();
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
        Schema::dropIfExists('items');
    }
}
