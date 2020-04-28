<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLelangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lelang', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('asset_id');
            $table->integer('harga_awal');
            $table->integer('harga_sekarang');
            $table->date('waktu_berakhir');
            $table->timestamps();
            $table->boolean('status');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('asset_id')->references('id')->on('assets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lelang', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['asset_id']);
        });
        Schema::dropIfExists('lelang');
    }
}
