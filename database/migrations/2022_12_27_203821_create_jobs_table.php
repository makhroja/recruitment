<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('no_surat');
            $table->string('judul');
            $table->text('informasi');
            $table->date('tgl_mulai');
            $table->date('tgl_akhir');
            $table->string('lampiran');
            $table->integer('status')->default(0);
            $table->boolean('is_aktif')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('jobs');
    }
}
