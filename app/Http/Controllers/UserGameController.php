<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\UserGame;
use App\Models\Game;
use stdClass;

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
        $userGames = UserGame::leftjoin('games', 'games.id', '=', 'user_games.game_id')
            ->select(
                'games.name',
                'games.summary',
                'games.cover',
                'games.platform',
                'games.screenshot_1',
                'games.screenshot_2',
                'games.video',
                'user_games.*'
            )
            ->where('user_id', Auth::user()->id)
            ->where('user_id', Auth::user()->id)
            ->orderBy('name')
            ->paginate($pagination);
        $stats = $this->getStats();
        return view('collection')->with(['games' => $userGames, 'stats' => $stats]);
    }

    /**
     * Get user's games stats
     * 
     * @return stdClass
     */
    public function getStats()
    {
        $userGames = UserGame::where('user_id', Auth::user()->id)->get();
        $stats = new stdClass;
        $stats->wanted = $userGames->where('wanted', true)->count();
        $stats->owned = $userGames->where('owned', true)->count();
        $stats->started = $userGames->where('started', true)->count();
        $stats->finished = $userGames->where('finished', true)->count();
        $stats->completed = $userGames->where('completed', true)->count();
        $stats->abandoned = $userGames->where('abandoned', true)->count();
        $stats->total = $userGames->count();
        return $stats;
    }

    /**
     * Delete game from user's collection
     */
    public function delete(Request $request)
    {
        UserGame::destroy($request->input('id'));
        return redirect()->route('collection')
            ->with('message', 'The game ' . $request->input('name') . ' has been removed from your collection.');
    }

    /**
     * Update game in user's collection
     */
    function update(Request $request)
    {
        $userGame = UserGame::find($request->id);
        $userGame->wanted = $request->wanted ? true : false;
        $userGame->owned = $request->owned ? true : false;
        $userGame->plus = $request->plus ? true : false;
        $userGame->now = $request->now ? true : false;
        $userGame->physical = $request->physical ? true : false;
        $userGame->digital = $request->digital ? true : false;
        $userGame->started = $request->started ? true : false;
        $userGame->finished = $request->finished ? true : false;
        $userGame->abandoned = $request->abandoned ? true : false;
        $userGame->completed = $request->completed ? true : false;
        $userGame->save();
        return redirect()->back()
            ->with('message', 'The game ' . $request->name . ' has been updated in your collection.');
    }
}
