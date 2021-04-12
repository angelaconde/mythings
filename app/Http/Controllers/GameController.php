<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Models\Game;
use App\Models\UserGame;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Add game to user games table and games table if needed.
     * 
     * @return void
     */
    function addGame(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'min:3']
        ]);
        // Look for game in API
        $name = $request->title;
        $gameInfo = $this->getGameInfoByNameFromAPI($name);
        // Not found
        if (!$gameInfo) {
            $message = "We couldn't find this game, sorry!";
            return redirect('collection')->with('message', $message);
            // Found
        } else {
            // Get his API id
            $apiID = $gameInfo[0]['id'];
            // Check it's not already in DB
            $alreadyInDB = $this->gameInDB($apiID);
            // Is in DB
            if ($alreadyInDB) {
                // Get game id
                $gameID = $this->getIDbyApiID($apiID);
                // Check it's not already in user collection
                $alreadyInUserCollection = $this->gameInUserCollection($gameID);
                // Is in collection
                if ($alreadyInUserCollection) {
                    $message = "You already have this game in your collection.";
                    return redirect('collection')->with('message', $message);
                    // Isn't in collection
                } else {
                    // Make UserGame and add to DB
                    $this->makeUserGame(Auth::user()->id, $gameID, $request);
                    // Return success message
                    $message = "The game was added to your collection.";
                    return redirect('collection')->with('message', $message);
                }
                // Isn't in DB
            } else {
                // If not in DB add to DB and save cover and images
                $game = $this->makeGame($gameInfo);
                $this->storeImage($game->cover, 'coverBig');
                $this->storeImage($game->cover, 'coverSmall');
                $this->storeImage($game->screenshot_1, 'screenshot');
                $this->storeImage($game->screenshot_1, 'thumbnail');
                $this->storeImage($game->screenshot_2, 'screenshot');
                $this->storeImage($game->screenshot_2, 'thumbnail');
                // Make UserGame and add to DB
                $this->makeUserGame(Auth::user()->id, $game->id, $request);
                // Return success message
                $message = "The game was added to your collection.";
                return redirect('collection')->with('message', $message);
            }
        }
    }

    /**
     * Look for the game in the database by API id.
     * 
     * @return boolean
     */
    function gameInDB($id)
    {
        return Game::where('api_id', $id)->exists();
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

    /** 
     * Get game ID by his API_ID
     */
    function getIDbyApiID($apiID)
    {
        return Game::where('api_id', $apiID)->firstOrFail()->id;
    }

    /**
     * Get the game info from external API.
     *
     * @return array
     */
    function getGameInfoByNameFromAPI($name)
    {
        $fields = 'fields id, artworks.image_id, cover.image_id, first_release_date, 
        name, platforms, screenshots.image_id, summary, videos.video_id;';
        $filter = 'where (name ~ "' . $name . '"*) & (platforms = (48));';
        $sort = 'sort first_release_date asc;';
        $limit = 'limit 1;';

        $body = $fields . $filter . $sort . $limit;

        $response = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => env('IGDB_TOKEN')
        ])->withBody($body, 'text')->post('https://api.igdb.com/v4/games');

        return empty($response[0]) ? false : $response;
    }

    /**
     * Make Game from info
     * 
     * @return Game
     */
    function makeGame($gameInfo)
    {
        $game = new Game;
        $game->api_id = $gameInfo[0]['id'];
        $game->name = $gameInfo[0]['name'];
        $game->summary = $gameInfo[0]['summary'] ?? "Summary not available";
        $game->first_release_date = $gameInfo[0]['first_release_date'] ?? strtotime("1984-01-09");
        $game->cover = $gameInfo[0]['cover']['image_id'] ?? "cover_not_found";
        $game->platform = 'PS4';
        $game->screenshot_1 = $gameInfo[0]['screenshots'][0]['image_id'] ?? "screenshot_not_found";
        $game->screenshot_2 = $gameInfo[0]['screenshots'][1]['image_id'] ?? "screenshot_not_found";
        $game->video = $gameInfo[0]['videos'][0]['video_id'] ?? "x7QhUL8NUK4";
        $game->save();

        return $game;
    }

    /** 
     * Check if image exists
     * 
     * @return boolean
     */
    function imageExists($image)
    {
        return !str_contains($image, 'not_found');
    }

    /**
     * Get and store image
     * 
     * @return void
     */
    function storeImage($image, $size)
    {
        if ($this->imageExists($image)) {
            switch ($size) {
                case "coverSmall":
                    $url = 'https://images.igdb.com/igdb/image/upload/t_cover_small/' . $image . '.jpg';
                    $disk = 'cover_small';
                    break;
                case "coverBig":
                    $url = 'https://images.igdb.com/igdb/image/upload/t_cover_big/' . $image . '.jpg';
                    $disk = 'cover_big';
                    break;
                case "screenshot":
                    $url = 'https://images.igdb.com/igdb/image/upload/t_screenshot_huge/' . $image . '.jpg';
                    $disk = 'screenshot';
                    break;
                case "thumbnail":
                    $url = 'https://images.igdb.com/igdb/image/upload/t_logo_med/' . $image . '.jpg';
                    $disk = 'thumbnail';
                    break;
            }
            $filename = $image . '.jpg';
            $file = file_get_contents($url);
            Storage::disk($disk)->put($filename, $file);
        }
    }

    /**
     * Make UserGame from ID ad store it in DB
     * 
     * @return void
     */
    function makeUserGame($userID, $gameID, Request $request)
    {
        $userGame = new UserGame;
        $userGame->user_id = $userID;
        $userGame->game_id = $gameID;
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
    }

    /** Show details of Game by ID
     * 
     * @return void
     */
    function details($id)
    {
        $game = Game::findOrFail($id);
        return view('details')->with('game', $game);
    }
}
