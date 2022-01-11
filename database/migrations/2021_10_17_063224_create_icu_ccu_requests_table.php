<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcuCcuRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icu_ccu_requests', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->unsignedBigInteger('bed_id');
            $table->string('phone');
            $table->string('bkash_number')->nullable();
            $table->text('tnx_id')->nullable();
            $table->integer('partial_payment')->nullable();
            $table->integer('full_payment')->nullable();
            $table->string('slug');
            $table->boolean('status');
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
        Schema::dropIfExists('icu_ccu_requests');
    }
}
