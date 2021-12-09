<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableSchedules extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('doctor_id');
            $table->time('monday_start')->nullable()->default('00:00');
            $table->time('monday_end')->nullable()->default('00:00');
            $table->time('tuesday_start')->nullable()->default('00:00');
            $table->time('tuesday_end')->nullable()->default('00:00');
            $table->time('wednesday_start')->nullable()->default('00:00');
            $table->time('wednesday_end')->nullable()->default('00:00');
            $table->time('thursday_start')->nullable()->default('00:00');
            $table->time('thursday_end')->nullable()->default('00:00');
            $table->time('friday_start')->nullable()->default('00:00');
            $table->time('friday_end')->nullable()->default('00:00');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
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
        //
    }
}
