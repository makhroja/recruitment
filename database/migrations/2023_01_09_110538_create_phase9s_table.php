<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePhase9sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phase9s', function (Blueprint $table) {
            $table->id('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('application_id')->index();
            $table->integer('nilai_akhir')->nullable();
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
        Schema::drop('phase9s');
    }
}