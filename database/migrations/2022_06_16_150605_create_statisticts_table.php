<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatistictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statisticts', function (Blueprint $table) {
            $table->id();
            $table->integer('url_id');
            $table->text('country')->nullable();
            $table->text('city')->nullable();
            $table->text('browser_type')->nullable();
            $table->text('browser_version')->nullable();
            $table->text('platform_type')->nullable();
            $table->text('platform_version')->nullable();
            $table->text('user_agent')->nullable();
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
        Schema::dropIfExists('statisticts');
    }
}
