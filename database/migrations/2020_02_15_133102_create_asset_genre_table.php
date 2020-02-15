<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetGenreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asset_genre', function (Blueprint $table) {
            $table->unsignedBigInteger('asset_id');
            $table->unsignedBigInteger('genre_id');

            $table->foreign('asset_id')->references('id')->on('assets');
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('asset_genre', function (Blueprint $table) {
            $table->dropForeign(['asset_id']);
            $table->dropForeign(['genre_id']);
        });
        Schema::dropIfExists('asset_genre');
    }
}
