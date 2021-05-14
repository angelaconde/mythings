<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'api_id',
        'name',
        'summary',
        'first_release_date',
        'cover',
        'platform',
        'screenshot_1',
        'screenshot_2',
        'video',
        'hltb_story',
        'hltb_story_mins',
        'hltb_completionist',
        'hltb_completionist_mins'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'api_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'first_release_date' => 'date',
    ];

    /**
     * Look for the game in the database by API id.
     * 
     * @return boolean
     */
    public function gameInDB($id)
    {
        return Game::where('api_id', $id)->exists();
    }

    /** 
     * Get game ID by his API_ID
     * 
     * @return Game
     */
    public function getIDbyApiID($apiID)
    {
        return Game::where('api_id', $apiID)->firstOrFail()->id;
    }
}
