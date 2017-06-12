<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Test\Browser\Pages\ChatPage;
use App\Models\User;

class ChatLogin extends DuskTestCase
{
    /**
     * A basic browser test example.
     *
     * @return void
     */
    public function a_user_can_send_a_message()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) {
            $browser->loginAs($user)
                    ->visit(new ChatPage);
        });
    }
}
