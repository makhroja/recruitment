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
            $table->integer('tertulis')->nullable();
            $table->integer('wawancara_unit')->nullable();
            $table->integer('praktek')->nullable();
            $table->integer('wawancara_hrd')->nullable();
            $table->integer('psikotes')->nullable();
            $table->integer('wawancara_performance')->nullable();
            $table->integer('kesehatan')->nullable();
            $table->integer('tahap_akhir')->nullable();
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
