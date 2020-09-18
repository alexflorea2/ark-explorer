<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class TransactionPageTest extends DuskTestCase
{
    public function testSpecificTransaction()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/transactions/2172d3d6c0aa3c94db6336ca8bed1fbf301c5e905945c97b6ff55c807b693a1e')
                    ->assertSee('2020-09-18 05:32:56')
                    ->assertSee('Recipient')
                    ->assertSee('ARBZM8oKx9uL6seimWyGEpLe2gWFcneU1j');
        });
    }
}
