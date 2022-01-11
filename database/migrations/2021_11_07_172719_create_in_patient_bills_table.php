<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInPatientBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('in_patient_bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('in_patient_id')->constrained()->onDelete('cascade');
            $table->integer('total_bed_cost')->nullable();
            // $table->integer('total_lab_cost')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total_cost')->nullable();
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
        Schema::dropIfExists('in_patient_bills');
    }
}
