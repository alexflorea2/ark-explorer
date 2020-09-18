<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class BlocksPageTest extends DuskTestCase
{
    public function testListing()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/blocks')
                    ->assertSee('Blocks')
                    ->scrollIntoView('.livewire-pagination')
                    ->assertSee('Showing 1 to ');

            $browser->click('.table-item-row:nth-child(1)');
            $browser->assertSee('Block');
        });
    }
}
