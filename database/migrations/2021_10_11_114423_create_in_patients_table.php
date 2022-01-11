<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sex');
            $table->string('age');
            $table->string('phone')->nullable();
            $table->string('guardian_name');
            $table->string('guardian_phone');
            $table->string('blood_group');
            $table->text('symptoms')->nullable();
            $table->text('condition')->nullable();
            $table->text('note')->nullable();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('floor_id');
            $table->unsignedBigInteger('bed_category_id');
            $table->unsignedBigInteger('bed_id');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('in_patients');
    }
}
