<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('job_id')->index();
            $table->date('tahap_1')->nullable();
            $table->date('tahap_2')->nullable();
            $table->date('tahap_3')->nullable();
            $table->date('tahap_4')->nullable();
            $table->date('tahap_5')->nullable();
            $table->date('tahap_6')->nullable();
            $table->date('tahap_7')->nullable();
            $table->date('tahap_8')->nullable();
            $table->date('tahap_9')->nullable();
            $table->date('tahap_10')->nullable();
            $table->date('tahap_11')->nullable();
            $table->date('tahap_12')->nullable();
            $table->date('tahap_13')->nullable();
            $table->date('tahap_14')->nullable();
            $table->date('tahap_15')->nullable();
            $table->integer('status')->default(0);
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
        Schema::drop('schedules');
    }
}
