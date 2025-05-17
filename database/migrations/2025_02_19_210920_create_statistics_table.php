<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // ✅ Bổ sung từ khóa public function
    {
        Schema::create('statistics', function (Blueprint $table) {
            $table->id();
            $table->integer('category_new')->default(0);
            $table->integer('genre_new')->default(0);
            $table->integer('country_new')->default(0);
            $table->integer('movie_new')->default(0);
            $table->integer('comment_new')->default(0);
            $table->date('date'); // ✅ Không cần unique, tránh lỗi duplicate key
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
        Schema::dropIfExists('statistics');
    }
}