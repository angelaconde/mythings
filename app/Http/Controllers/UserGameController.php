<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserGame;
use App\Models\Game;
use stdClass;

class UserGameController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified'], ['except' => ['showWishlist']]);
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
        $sort = $request->has('sort') ? $request->get('sort') : 'name';
        $order = $request->has('order') ? $request->get('order') : 'asc';
        $search = ($request->has('search') ?? $request->get('search') != '') ? $request->get('search') : '';
        $userGames = UserGame::leftjoin('games', 'games.id', '=', 'user_games.game_id')
            ->select(
                'games.name',
                'games.summary',
                'games.cover',
                'games.platform',
                'games.screenshot_1',
                'games.screenshot_2',
                'games.video',
                'games.hltb_story',
                'games.hltb_story_mins',
                'games.hltb_completionist',
                'games.hltb_completionist_mins',
                'user_games.*'
            )
            ->where('user_id', Auth::user()->id)
            ->whereHas('game', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%');
            })
            ->where(function ($query) use ($filters) {
                if (isset($filters)) {
                    foreach ($filters as $filter) {
                        $query->where($filter, 1);
                    }
                }
            })
            ->orderBy($sort, $order)
            ->paginate($pagination);
        // Data for pagination
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
        return redirect()->back()
            ->with('message', 'The game ' . $request->input('name') . ' has been removed from your collection.')
            ->with($request->except('_token'));
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
            ->with('message', 'The game ' . $request->name . ' has been updated in your collection.')
            ->with($request->except('_token'));
    }

    /** 
     * Get releases of user's games
     * 
     * @return json
     */
    public function getReleases()
    {
        // Get games
        $games = UserGame::where('user_id', Auth::user()->id)
            ->get();

        // Get their dates and build the events
        foreach ($games as $key => $game) {
            $release_info = Game::where('id', $game->game_id)
                ->get();
            $event_data[$key]['event_id'] = $release_info[0]->id;
            $event_data[$key]['title'] = $release_info[0]->name;
            $event_data[$key]['start'] = date('Y-m-d', strtotime($release_info[0]->first_release_date));
            $event_data[$key]['end'] = date('Y-m-d', strtotime($release_info[0]->first_release_date . ' + 1 day'));
            $event_data[$key]['url'] = route('details', $release_info[0]->id);
        }

        return $event_data;
    }
}
