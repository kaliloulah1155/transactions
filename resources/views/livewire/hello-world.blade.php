<div>


 
    @foreach($contacts as $contact)
     
       @livewire('say-hi',['contact'=>$contact],key($contact->id))
        
     @endforeach

     <hr>
     {{now()}}
     <button wire:click="refreshChildren">Refresh Children</button>
    
</div
   