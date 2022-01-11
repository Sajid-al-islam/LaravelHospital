<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('floor_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->foreignId('bed_category_id')
                  ->constrained()
                  ->onDelete('cascade');
            $table->string('name');
            $table->integer('limit');
            $table->integer('cost');
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
        Schema::dropIfExists('beds');
    }
}
