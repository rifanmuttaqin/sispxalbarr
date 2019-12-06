<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblUserEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_user_employee', function (Blueprint $table) {
            $table->bigIncrements('id', 20);
            $table->unsignedBigInteger('user_id');
            $table->string('nik');
            $table->integer('jenis_kelamin')->default(10);
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('agama')->default(10);
            $table->integer('status_pernikahan')->default(10);
            $table->string('phone');
            $table->date('tanggal_masuk');
            $table->integer('tipe_karyawan')->default(10);
            $table->string('keterangan')->nullable();

            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));

            $table->foreign('user_id')
                ->references('id')
                ->on('tbl_user')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_user_employee');
    }
}
