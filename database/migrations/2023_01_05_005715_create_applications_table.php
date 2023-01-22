<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('job_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('unit_id')->index();
            $table->unsignedBigInteger('position_id')->index();
            $table->string('administrasi')->nullable();
            $table->integer('phase2s')->nullable();
            $table->integer('phase3s')->nullable();
            $table->integer('phase4s')->nullable();
            $table->integer('phase5s')->nullable();
            $table->integer('phase6s')->nullable();
            $table->integer('phase7s')->nullable();
            $table->integer('phase8s')->nullable();
            $table->integer('phase9s')->nullable();
            $table->integer('status')->default(0);
            $table->string('pdf');
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
        Schema::drop('applications');
    }
}
