<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserGame;
use stdClass;

class UserGameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a filtered listing of the user's games
     * 
     * @return void
     */
    public function index(Request $request)
    {
        $pagination = env('PAGINATION_GAMES', 8);
        $filters = $request->has('filters') ? $request->get('filters') : [];
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
            ->where(function ($query) use ($filters) {
                if (isset($filters)) {
                    foreach ($filters as $filter) {
                        $query->where($filter, 1);
                    }
                }
            })
            ->orderBy('name')
            ->paginate($pagination);
        $data = $request->all();
        return view('collection')->with(['games' => $userGames, 'filters' => $filters, 'data' => $data]);
    }

    /**
     * Display user's games stats
     * 
     * @return void
     */
    public function showStats()
    {
        $stats = $this->getStats();
        return view('stats')->with(['stats' => $stats]);
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
     * 
     * @return void
     */
    public function delete(Request $request)
    {
        UserGame::destroy($request->input('id'));
        return redirect()->route('collection')
            ->with('message', 'The game ' . $request->input('name') . ' has been removed from your collection.');
    }

    /**
     * Update game in user's collection
     * 
     * @return void
     */
    public function update(Request $request)
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
