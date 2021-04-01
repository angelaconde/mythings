<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_games', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
            $table->boolean('wanted')->default(true);
            $table->boolean('owned')->default(false);
            $table->boolean('plus')->default(false);
            $table->boolean('now')->default(false);
            $table->boolean('physical')->default(false);
            $table->boolean('digital')->default(false);
            $table->boolean('started')->default(false);
            $table->boolean('finished')->default(false);
            $table->boolean('abandoned')->default(false);
            $table->boolean('completed')->default(false);
            // Foreign keys
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('game_id')->constrained('games');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_games');
    }
}
