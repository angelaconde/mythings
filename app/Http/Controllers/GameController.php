<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;
use App\Models\Game;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Add game to database.
     * 
     * @return 
     */
    function addGame($name)
    {
        // Look for game in API
        $gameInfo = $this->getGameInfoByNameFromAPI($name);

        // If not found in API
        // TO DO

        // If found, check it's not already in DB
        $alreadyInDB = $this->gameInDB($gameInfo[0]['id']);

        // If already in DB
        if ($alreadyInDB) {
            // Add to user collection
            // TO DO

            // Return success message
            $message = "GAME ALREADY IN DB!";
            return view('collection', ['message' => $message]);
        } else {
            // If not in DB add to DB and save cover and images
            $game = $this->makeGame($gameInfo);
            $this->storeImage($game->cover, 'coverBig');
            $this->storeImage($game->cover, 'coverSmall');
            $this->storeImage($game->screenshot_1, 'screenshot');
            $this->storeImage($game->screenshot_1, 'thumbnail');
            $this->storeImage($game->screenshot_2, 'screenshot');
            $this->storeImage($game->screenshot_2, 'thumbnail');

            // Add to user collection
            // TO DO

            // Return success message
            $message = "GAME ADDED!";
            return view('collection', ['message' => $message]);
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
     * Get the game info from external API.
     *
     * @return array
     */
    function getGameInfoByNameFromAPI($name)
    {
        $fields = 'fields id, artworks.image_id, cover.image_id, first_release_date, 
        name, platforms, screenshots.image_id, summary, videos.video_id;';
        $search = 'search "' . $name . '";';
        $platforms = 'where platforms = (48);';
        $limit = 'limit 1;';

        $body = $fields . $search . $platforms . $limit;

        $response = Http::withHeaders([
            'Client-ID' => env('IGDB_CLIENT_ID'),
            'Authorization' => env('IGDB_TOKEN')
        ])->withBody($body, 'text')->post('https://api.igdb.com/v4/games');

        return $response;
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
        $game->screenshot_1 = $gameInfo[0]['artworks'][0]['image_id'] ?? "screenshot_not_found";
        $game->screenshot_2 = $gameInfo[0]['artworks'][1]['image_id'] ?? "screenshot_not_found";
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
}
