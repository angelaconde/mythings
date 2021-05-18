<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LandingTest extends DuskTestCase
{
    /**
     * A Dusk test for the landing link to login.
     *
     * @return void
     */
    public function testLandingLinkToLogin()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Manage your collections')
                ->clickLink('Login')
                ->assertSee('Forgot Your Password?');
        });
    }

    /**
     * A Dusk test for the landing link to register.
     *
     * @return void
     */
    public function testLandingLinkToRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Manage your collections')
                ->clickLink('Register')
                ->assertSee('Confirm Password');
        });
    }

    /**
     * A Dusk test for the landing link to about us.
     *
     * @return void
     */
    public function testLandingLinkToAboutUs()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Manage your collections')
                ->press('About us')
                ->whenAvailable('#aboutModal', function ($modal) {
                    $modal->waitForText('My Things is a student project')
                        ->assertSee('My Things is a student project');
                });
        });
    }

    /**
     * A Dusk test for the landing link to Terms.
     *
     * @return void
     */
    public function testLandingLinkToTerms()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Manage your collections')
                ->press('Terms and conditions')
                ->whenAvailable('#termsModal', function ($modal) {
                    $modal->waitForText('Terms and conditions of use')
                        ->assertSee('Terms and conditions of use');
                });
        });
    }

    /**
     * A Dusk test for the landing link to Privacy policy.
     *
     * @return void
     */
    public function testLandingLinkToPrivacyPolicy()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                ->assertSee('Manage your collections')
                ->press('Privacy policy')
                ->whenAvailable('#privacyModal', function ($modal) {
                    $modal->waitForText('Information We Collect')
                        ->assertSee('Information We Collect');
                });
        });
    }
}
