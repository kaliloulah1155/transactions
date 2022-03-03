<?php


namespace App\Http\Livewire;

use \Illuminate\Http\Request;
use Livewire\Component;
use App\Models\Contact;

class HelloWorld extends Component
{
    public $contacts;

    
     public function refreshChildren(){
         $this->emit('refreshChildren','foo');
     }

    public function mount(){
        
        $this->contacts=Contact::all();
    }

    public function render()
    {     
        return view('livewire.hello-world');
    }
}
