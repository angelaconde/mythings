<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserGame;
use App\Models\User;

class WishlistController extends Controller
{
    /**
     * Show user's wishlist
     * 
     * @return void
     */
    public function showWishlist(Request $request, $id)
    {
        if ($this->isWishlistPublic($id) || $this->isWishlistOwner($id)) {
            return $this->getWishlist($request, $id);
        } else {
            return view('nowishlist');
        }
    }

    /** 
     * Get wishlist
     * 
     * @return
     */
    public function getWishlist(Request $request, $id)
    {
        $pagination = env('PAGINATION_WISHLIST', 12);
        $filters = ['wanted'];
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
            ->where('user_id', $id)
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
        $user = User::find($id);
        $amazon = $this->getAmazonURL();
        return view('wishlist')
            ->with(['games' => $userGames, 'filters' => $filters, 'data' => $data, 'user' => $user, 'amazon' => $amazon]);
    }

    /**
     * Check whether user's wishlist is public
     *
     * @return boolean
     */
    public function isWishlistPublic($id)
    {
        return User::find($id)->wishlist;
    }

    /**
     * Check if current authenticated user is wishlist's owner
     *
     * @return boolean
     */
    public function isWishlistOwner($id)
    {
        return Auth::check() ? (Auth::user()->id == $id) : false;
    }

    /**
     * Get visitor's country by IP
     * 
     * @return string
     */
    public function getVisitorCountry()
    {
        $ip = request()->ip();
        $key = '42fa7efcac0f85a67e38857d619984ca';
        $geojson = file_get_contents("http://api.ipstack.com/" . $ip . "?access_key=" . $key);
        $jsondata = json_decode($geojson);
        $country = $jsondata->country_name;
        return $country;
    }

    /** 
     * Get Amazon URL by country
     * 
     * @return string
     */
    public function getAmazonURL()
    {
        $country = $this->getVisitorCountry();
        $extension = $this->getAmazonCountryExtension($country);
        $url = 'https://www.amazon' . $extension . '/s?i=videogames&k=';
        return $url;
    }

    /**
     * Get Amazon URL by country
     * 
     * @return string
     */
    public function getAmazonCountryExtension($country)
    {
        switch ($country) {
            case 'United States':
                return '.com';
            case 'Canada':
                return '.ca';
            case 'China':
                return '.cn';
            case 'Japan':
                return '.co.jp';
            case 'United Kingdom':
            case 'England':
            case 'Gibraltar':
            case 'Guernsey':
            case 'Ireland':
            case 'Isle of Man':
            case 'Jersey':
                return '.co.uk';
            case 'Australia':
            case 'New Zeland':
                return '.com.au';
            case 'Brazil':
                return '.com.br';
            case 'Germany':
            case 'Austria':
            case 'Liechtenstein':
            case 'Switzerland':
            case 'Luxembourg':
                return '.de';
            case 'Spain':
            case 'Andorra':
                return '.es';
            case 'France':
            case 'Monaco':
            case 'Belgium':
                return '.fr';
            case 'Italy':
            case 'Vatican City':
            case 'San Marino':
                return '.it';
            case 'Mexico':
                return '.com.mx';
            case 'Netherlands':
                return '.nl';
            case 'Poland':
                return '.pl';
            case 'Singapore':
                return '.sg';
            default:
                return '.co.uk';
        }
    }
}
