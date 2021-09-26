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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name')->nullable();
            $table->string('address');
            $table->unsignedBigInteger('department_id')->unsigned()->index();
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('country_id')->unsigned()->index();
            $table->foreign('country_id')->references('id')->on('countries')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('state_id')->unsigned()->index();
            $table->foreign('state_id')->references('id')->on('states')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('city_id')->unsigned()->index();
            $table->foreign('city_id')->references('id')->on('cities')->onUpdate('cascade')->onDelete('cascade');
            $table->char('zip_code');
            $table->date('birthdate')->nullable();
            $table->date('date_hired')->nullable();
           
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
