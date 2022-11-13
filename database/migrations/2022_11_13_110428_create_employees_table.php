<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar') ;
            $table->string('name_en') ;
            $table->integer('department_id') ->nullable();
            $table->integer('job_id');
            $table->integer('religion_id') ->nullable();
            $table->integer('gender_id') ->nullable();
            $table->integer('nationalty_id') ->nullable();
            $table->integer('martialState_id') ->nullable();
            $table->string('ID_number') ->nullable();
            $table->integer('child_number') ->nullable();
            $table->date('birth_date') ->nullable();
            $table->integer('education_id') ->nullable();
            $table->integer('work_hours') ->nullable();
            $table->string('week_off_days') ->nullable();
            $table->string('phone') ->nullable();
            $table->string('mobile') ->nullable();
            $table->string('email') ->nullable();
            $table->string('postal_code') ->nullable();
            $table->string('fax_number') ->nullable();
            $table->string('address') ->nullable();
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
        Schema::dropIfExists('employees');
    }
}
