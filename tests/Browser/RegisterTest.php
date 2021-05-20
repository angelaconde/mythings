<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;
use App\Models\User;

class RegisterTest extends DuskTestCase
{

    /**
     * A Dusk test for the register form with wrong email input.
     *
     * @return void
     */
    public function testRegisterWithWrongEmailFormat()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Confirm Password')
                ->type('name', 'Dusk Test User')
                ->type('email', 'dusktestuser')
                ->type('password', 'Password123')
                ->type('password_confirmation', 'Password123')
                ->check('terms')
                ->press('Register')
                ->pause(1000)
                ->assertSee('Confirm Password');
        });
    }

    /**
     * A Dusk test for the register form with wrong password lenght input.
     *
     * @return void
     */
    public function testRegisterWithWrongPasswordLength()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Confirm Password')
                ->type('name', 'Dusk Test User')
                ->type('email', 'dusktestuser@email.com')
                ->type('password', 'pass')
                ->type('password_confirmation', 'pass')
                ->check('terms')
                ->press('Register')
                ->pause(1000)
                ->assertSee('The password must be at least');
        });
    }

    /**
     * A Dusk test for the register form with wrong password input.
     *
     * @return void
     */
    public function testRegisterWithWrongPasswordFormat()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Confirm Password')
                ->type('name', 'Dusk Test User')
                ->type('email', 'dusktestuser@email.com')
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->check('terms')
                ->press('Register')
                ->pause(1000)
                ->assertSee('The password must contain');
        });
    }

    /**
     * A Dusk test for the register form with wrong password confirmation input.
     *
     * @return void
     */
    public function testRegisterWithWrongPasswordConfirmation()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Confirm Password')
                ->type('name', 'Dusk Test User')
                ->type('email', 'dusktestuser@email.com')
                ->type('password', 'Password123')
                ->type('password_confirmation', 'pass')
                ->check('terms')
                ->press('Register')
                ->pause(1000)
                ->assertSee('The password confirmation does not match');
        });
    }

    /**
     * A Dusk test for the register form without checking terms checkbox.
     *
     * @return void
     */
    public function testRegisterWithoutAcceptingTerms()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Confirm Password')
                ->type('name', 'Dusk Test User')
                ->type('email', 'dusktestuser@email.com')
                ->type('password', 'Password123')
                ->type('password_confirmation', 'Password123')
                ->press('Register')
                ->pause(1000)
                ->assertSee('Confirm Password');
        });
    }

    /**
     * A Dusk test for the register form with all inputs correct.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->assertSee('Confirm Password')
                ->type('name', 'Dusk Test User')
                ->type('email', 'dusktestuser@email.com')
                ->type('password', 'Password123')
                ->type('password_confirmation', 'Password123')
                ->check('terms')
                ->press('Register')
                ->pause(1000)
                ->assertSee('Verify Your Email Address');
        });
    }

    /** 
     * A Dusk test for the delete account form
     * 
     * @return void
     */
    public function testDeleteAccount()
    {
        $user = User::where('email', 'dusktestuser@email.com')->first();
        $user->email_verified_at = now();
        $user->save();
        $this->browse(function (Browser $browser) {
            $browser->loginAs(User::where('email', 'dusktestuser@email.com')->first())
                ->visit('/collection')
                ->assertSee('Test User')
                ->click('#navbarDropdown')
                ->assertSeeLink('Logout')
                ->click('.dropdown-menu-right a:first-of-type')
                ->assertSee('Your profile')
                ->clickLink('Delete')
                ->assertSee('WARNING!')
                ->clickLink('Delete')
                ->pause(1000)
                ->assertSee('Manage');
        });
        $user->forceDelete();
    }
}
