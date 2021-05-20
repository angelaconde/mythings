<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class CollectionTest extends DuskTestCase
{
    /**
     * A Dusk test for the User Game CRUD.
     *
     * @return void
     */
    public function testCrudUserGame()
    {
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::find(1))
                ->visit('/collection')
                ->assertSee('Search')
                ->press('Add Game')
                ->assertSee('Ownership')
                ->type('title', 'Subnautica')
                ->check('label[for=owned]')
                ->check('label[for=digital]')
                ->check('label[for=started]')
                ->check('label[for=finished]')
                ->check('label[for=completed]')
                ->click('#add-game-modal .modal-footer > button:nth-of-type(2)')
                ->assertSee('The game was added to your collection.')
                ->assertSee('Subnautica')
                ->click('.editgamebutton')
                ->assertSee('Edit Game')
                ->check('label[for=edit-wanted]')
                ->click('#edit-game-modal .modal-footer > button:nth-of-type(2)')
                ->assertSee('has been updated')
                ->click('.deletebutton')
                ->pause(1000)
                ->assertSee('Are you sure?')
                ->press('Yes, remove the game')
                ->assertSee('has been removed from your collection')
                ->press('.close')
                ->pause(1000)
                ->assertDontSee('Subnautica');
        });
    }
}
