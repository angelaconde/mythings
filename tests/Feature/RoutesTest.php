<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;

class RoutesTest extends TestCase
{
    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteLanding()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteRegister()
    {
        $response = $this->get('register');
        $response->assertStatus(200);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteLogin()
    {
        $response = $this->get('login');
        $response->assertStatus(200);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteCollection()
    {
        $user = User::all()->random();
        $response = $this->actingAs($user)->get('collection');
        $response->assertStatus(200);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteStats()
    {
        $user = User::all()->random();
        $response = $this->actingAs($user)->get('stats');
        $response->assertStatus(200);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteReleases()
    {
        $user = User::all()->random();
        $response = $this->actingAs($user)->get('releases');
        $response->assertStatus(200);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteProfileThatExists()
    {
        $user = User::all()->random();
        $response = $this->actingAs($user)->get('profile/1');
        $response->assertStatus(200);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRouteProfileThatDoesNotExist()
    {
        $user = User::all()->random();
        $response = $this->actingAs($user)->get('profile/A');
        $response->assertStatus(404);
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRoutePublicWishlistWithoutAuthenticatedUser()
    {
        $userWithPublicWishlist = User::where('wishlist', 1)->first();
        if ($userWithPublicWishlist) {
            $response = $this->get('wishlist/' . $userWithPublicWishlist->id);
            $response->assertStatus(200);
        } else {
            $this->assertNull($userWithPublicWishlist);
        }
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRoutePrivateWishlistWithoutAuthenticatedUser()
    {
        $userWithPrivateWishlist = User::where('wishlist', 0)->first();
        if ($userWithPrivateWishlist) {
            $response = $this->get('wishlist/' . $userWithPrivateWishlist->id);
            $response->assertSee('private');
        } else {
            $this->assertNull($userWithPrivateWishlist);
        }
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRoutePrivateWishlistWithAuthenticatedUserThatIsNotTheOwner()
    {
        $userWithPrivateWishlist = User::where('wishlist', 0)->first();
        $user = User::where('id', '!=', $userWithPrivateWishlist->id)->get()->random();
        if ($userWithPrivateWishlist) {
            $response = $this->actingAs($user)->get('wishlist/' . $userWithPrivateWishlist->id);
            $response->assertSee('Sorry');
        } else {
            $this->assertNull($userWithPrivateWishlist);
        }
    }

    /**
     * Route test.
     *
     * @return void
     */
    public function testRoutePrivateWishlistWithAuthenticatedUserThatIsTheOwner()
    {
        $userWithPrivateWishlist = User::where('wishlist', 0)->first();
        if ($userWithPrivateWishlist) {
            $response = $this->actingAs($userWithPrivateWishlist)->get('wishlist/' . $userWithPrivateWishlist->id);
            $response->assertStatus(200);
            $response->assertSee('Your wishlist is currently');
        } else {
            $this->assertNull($userWithPrivateWishlist);
        }
    }
}
