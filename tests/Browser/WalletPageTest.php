<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class WalletPageTest extends DuskTestCase
{
    public function testSpecificWallet()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/wallets/ALUeCYpPvPUMt9FUEWWf2xAoaX3WXo9hou')
                    ->assertSee('ALUeCYpPvPUMt9FUEWWf2xAoaX3WXo9hou')
                    ->assertSee('Transactions')
                    ->assertSee('Wallet');
        });
    }
}
