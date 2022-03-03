<?php

namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Livewire\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    function can_register(){
        
           Livewire::test('register')
           ->set('email','caleb@gmail.com')
           ->set('password','secret')
           ->set('passwordConfirmation','secret')
           ->call('register')
           ->assertRedirect('/dashboard');

           $this->assertTrue(User::whereEmail('caleb@gmail.com')->exists());
           $this->assertEquals('caleb@gmail.com',auth()->user()->email);
       
    }

    
}
