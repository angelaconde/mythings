<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->integer('api_id')->unique();
            $table->string('name');
            $table->text('summary')->nullable();
            $table->date('first_release_date')->nullable();
            $table->string('cover')->nullable();
            $table->string('platform')->default('PS4');
            $table->string('screenshot_1')->nullable();
            $table->string('screenshot_2')->nullable();
            $table->string('video')->nullable();
            $table->string('hltb_story')->nullable();
            $table->integer('hltb_story_mins')->nullable();
            $table->string('hltb_completionist')->nullable();
            $table->integer('hltb_completionist_mins')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
