<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UserGame;
use App\Models\Game;

class UserGameController extends Controller
{
    /**
     * Display a listing of the user's games.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagination = env('PAGINATION_GAMES', 8);
        // Get user games data
        $userGames = UserGame::leftjoin('games', 'games.id', '=', 'user_games.game_id')
        ->where('user_id', Auth::user()->id)->paginate($pagination);

        return view('collection')->with('games', $userGames);
    }
}
