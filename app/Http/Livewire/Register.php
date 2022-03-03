<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
   
class Register extends Component
{
   
    public $email='';
    public $password='';
    public $passwordConfirmation='';
    

    public function emptyField(){
        $this->email='';
        $this->password='';
        $this->passwordConfirmation='';
    }

    public function updatedEmail(){
         $this->validate(['email'=>'unique:users']);
    }

    protected $rules =[
        'email'=>'required|email|unique:users',
        'password'=>'required|min:6|same:passwordConfirmation'
    ];
    public function register(){
        $data = $this->validate();
       $user=  User::create([
            'email'=>$data['email'],
            'password'=> Hash::make($data['password'])
        ]);
        $this->emptyField();

         auth()->login($user);
        return redirect('/dashboard');
    }

    
}
