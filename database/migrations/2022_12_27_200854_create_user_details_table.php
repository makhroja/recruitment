<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->unsignedBigInteger('user_id')->index();
            $table->string('nama_lengkap')->nullable();
            $table->integer('jk')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->text('alamat_sekarang')->nullable();
            $table->text('alamat_ktp')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('instansi')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('tahun_lulus')->nullable();
            $table->string('foto')->nullable();
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
        Schema::drop('user_details');
    }
}
