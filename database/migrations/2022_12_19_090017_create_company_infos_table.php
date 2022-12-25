<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar')  -> nullable();
            $table->string('name_en') -> nullable();
            $table->string('activity_ar') -> nullable();
            $table->string('activity_en') -> nullable();
            $table->string('phone1') -> nullable();
            $table->string('phone2') -> nullable();
            $table->string('fax1') -> nullable();
            $table->string('fax2') -> nullable();

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
        Schema::dropIfExists('company_infos');
    }
}
