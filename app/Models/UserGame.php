<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserGame extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'game_id',
        'wanted',
        'owned',
        'plus',
        'now',
        'physical',
        'digital',
        'started',
        'finished',
        'abandoned',
        'completed'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id',
        'game_id'
    ];

    /**
     * The relationship with a Game from the Games table
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    /**
     * Look for the game in the user collection by API id.
     * 
     * @return boolean
     */
    function gameInUserCollection($id)
    {
        return UserGame::where('user_id', Auth::user()->id)->where('game_id', $id)->exists();
    }
}
