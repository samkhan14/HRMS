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
            $table->string('fname');
            $table->string('lname');
            $table->string('son_of');
            $table->string('persnol_email');
            $table->integer('age');
            $table->integer('dob');
            $table->string('gender');
            $table->string('city');
            $table->string('address');
            $table->integer('persnol_number');
            $table->string('marital_status');
            $table->string('image');
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('etype_id');
            $table->unsignedBigInteger('desg_id');
            $table->unsignedBigInteger('dep_id');
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
