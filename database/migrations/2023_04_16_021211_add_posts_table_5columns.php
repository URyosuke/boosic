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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('book_title')->nullable();
            $table->string('book_imag_url')->nullable();
            $table->string('author')->nullable();
            $table->string('book_url')->nullable();
            $table->string('publish_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColum('book_title');
            $table->dropColum('book_imag_url');
            $table->dropColum('author');
            $table->dropColum('book_url');
            $table->dropColum('publish_date');
        });
    }
};
