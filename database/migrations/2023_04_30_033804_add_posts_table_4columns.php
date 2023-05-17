<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table){
            $table->string('music_title')->nullable();
            $table->string('music_artist')->nullable();
            $table->string('music_imag')->nullable();
            $table->string('music_url')->nullable();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $table->dropColum('music_title');
        $table->dropColum('music_artist');
        $table->dropColum('music_imag');
        $table->dropColum('music_url');
    }
};
