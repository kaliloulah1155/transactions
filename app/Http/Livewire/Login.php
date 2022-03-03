<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email='';
    public $password='';


    public function emptyField(){
        $this->email='';
        $this->password='';
     }
     
    protected $rules=[
        'email'=>'required|email',
        'password'=>'required|min:6'
    ];

    public function login(){
    
        $data = $this->validate();

        if(\Auth::attempt(array('email' => $this->email, 'password' => $this->password))){
            
            return redirect('/dashboard');
        }else{
            session()->flash('error', 'Email and password are wrong');
        }
     }
     
    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }
}
