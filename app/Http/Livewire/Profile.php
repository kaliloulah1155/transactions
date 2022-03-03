<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads; 

    public $username="";
    public $about="";
    public $birthday="";
    public $newAvatar;
    public $files=[];
    public $count=0;
    public $saved=false;

     public function mount(){
       
         $this->username=auth()->user()->username;
         $this->about=auth()->user()->about;
         $this->birthday=  (new \DateTime(auth()->user()->birthday ))->format('Y-m-d');

     }

      
     public function changeSaved(){
        $this->saved=false;
     }
    

    public function save(){
        
         
        $profileData=$this->validate([
            'username'=>'required|max:24',
            'about'=>'required|max:140',
            'birthday'=>'required|sometimes',
            'newAvatar'=>'image|max:40|mimes:jpeg,jpg,png,gif'
        ]);

        $filename=$this->newAvatar->store('/','avatars');
         
        $profileData['birthday']=  (new \DateTime($profileData['birthday'] ))->format('Y-m-d');
        auth()->user()->update(
            [
                'username'=>$profileData['username'],
                'about'=>$profileData['about'],
                'birthday'=>$profileData['birthday'],
                'avatar'=>$filename  
            ]
        );
        
        $this->saved=true;
    }   

    public function render()
    {
        return view('livewire.profile')->layout('layouts.master');
    }
}
