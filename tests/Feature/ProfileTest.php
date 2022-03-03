<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire\Livewire;
 

class ProfileTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function can_see_livewire_profile_component_on_profile_page()
    {
       
        $user= \App\Models\User::factory()->create();;

        $this->actingAs($user)
        ->withoutExceptionHandling()
        ->get('/profile')
        ->assertSuccessful()
        ->assertSeeLivewire('profile');
    }

    /** @test */
    public function can_update_profile()
    {
       
        $user= \App\Models\User::factory()->create();

        Livewire::actingAs($user)
        ->test('profile')
        ->set('username',"foo")
        ->set('about',"bar")
        ->call('save');
 

        $this->assertEquals('foo',$user->username);
        $this->assertEquals('bar',$user->about);
    }
}
