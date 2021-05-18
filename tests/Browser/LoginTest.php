<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test for the login form.
     *
     * @return void
     */
    public function testLoginWithWrongPassword()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Login')
                ->type('email', 'testuser1@email.com')
                ->type('password', 'xxx')
                ->pause(2000)
                ->press('Login')
                ->pause(1000)
                ->assertSee('Incorrect');
        });
    }

    /**
     * A Dusk test for the login form.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                ->assertSee('Login')
                ->type('email', 'testuser1@email.com')
                ->type('password', 'Password123')
                ->pause(2000)
                ->press('Login')
                ->pause(1000)
                ->assertSee('My collection');
        });
    }

    /**
     * A Dusk test for the logout form.
     *
     * @return void
     */
    public function testLogout()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/collection')
                ->click('#navbarDropdown')
                ->clickLink('Logout')
                ->assertSee('Manage your collections');
        });
    }
}
