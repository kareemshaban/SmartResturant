<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar') ;
            $table->string('name_en') ;
            $table->integer('discount_type') ->nullable();
            $table->decimal('discount_value') ->nullable();
            $table->string('phone') ->nullable();
            $table->string('mobile') ->nullable();
            $table->string('fax_number') ->nullable();
            $table->string('postal_code') ->nullable();
            $table->string('email') ->nullable();
            $table->integer('city_id') ->nullable();
            $table->string('house_number') ->nullable();
            $table->string('apartment_number') ->nullable();
            $table->string('region') ->nullable();
            $table->string('street') ->nullable();
            $table->string('address') ->nullable();
            $table->decimal('oppening_balance') ->nullable();
            $table->decimal('limit_money') ->nullable();
            $table->integer('limit_days') ->nullable();
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
        Schema::dropIfExists('clients');
    }
}
