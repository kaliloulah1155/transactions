<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class Dashboard extends Component
{   
    use WithPagination;
    
    public $search="";
    public $sortField='title';
    public $sortDirection='asc';
    public $showEditModal=false;
    public  $editing ;
   
    protected $rules=[
        'editing.id'=>'required',
        'editing.title'=>'required',
        'editing.amount'=>'required',
        'editing.status'=>'required',
        'editing.date'=>'required',
        
    ];
    
    protected $queryString=['sortField','sortDirection'];
    
    public function updatingSearch()
    {
        $this->resetPage(); 
    }
    
     
   
    
    public function sortBy($field){
        
       if($this->sortField === $field){
         $this->sortDirection=$this->sortDirection === 'asc' ? 'desc' : 'asc';
       }else{
         $this->sortDirection='asc';
       }
       $this->sortField = $field;
    }
    
    public function edit(Transaction $transaction){
        $this->editing['id']=  $transaction['id'];
        $this->editing['date']=  (new \DateTime($transaction['date'] ))->format('Y-m-d');
        $this->editing['title']=  $transaction['title'];
        $this->editing['amount']=  $transaction['amount'];
        $this->editing['status']=  $transaction['status'];
      //$this->editing['date']=$transaction['date'];
    
       $this->showEditModal =true;
    }
    
    public function save(){
    
       $this->validate();
       
       ///dd($this->editing);
       //$this->editing->update();
       Transaction::where('id', '=', $this->editing['id'])->update($this->editing);
       $this->showEditModal =false;
    }

    public function render()
    {
       
       // sleep(1);
        
        $sort = $this->sortField;
        $order = $this->sortDirection;
        
        if(!empty($this->search)){
              
            return view('livewire.dashboard',[
                'transactions'=>Transaction::search($this->search)
                ->within('title_asc')->paginate(10)
            ])->layout('layouts.master');
        }
        
        return view('livewire.dashboard',[
            'transactions'=>Transaction::orderBy($this->sortField, $this->sortDirection)->paginate(10)
        ])->layout('layouts.master');
        
    }
}
