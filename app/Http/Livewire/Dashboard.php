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
    public $editing ;
    public $modalText="Add";
    public $showFilters=false;
   
   public function rules(){
     return [
        'editing.id'=>'',
        'editing.title'=>'required|min:3',
        'editing.amount'=>'required',
        'editing.status'=>'required|in:'.collect(Transaction::STATUSES)->keys()->implode(','),
        'editing.date'=>'required',
        
    ];
   }
   
  
    
    protected $queryString=['sortField','sortDirection'];
    
    public function updatingSearch()
    {
        $this->resetPage(); 
    }
    
    
     public function makeBlankTransaction(){
        $this->modalText="Add";
        
        $this->editing['id']= '';
        $this->editing['date']=  (new \DateTime(now() ))->format('Y-m-d');
        $this->editing['title']= '';
        $this->editing['amount']=  '';
        $this->editing['status']= 'processing';
     }
   
    
    public function sortBy($field){
        
       if($this->sortField === $field){
         $this->sortDirection=$this->sortDirection === 'asc' ? 'desc' : 'asc';
       }else{
         $this->sortDirection='asc';
       }
       $this->sortField = $field;
    }
    
    public function create(){
    
        $this->makeBlankTransaction();
        $this->showEditModal =true;
        
        
    }
    
    public function edit(Transaction $transaction){
    
        $this->modalText="Edit";
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
       
      $record = Transaction::find($this->editing['id']);
      
      if($record){
        Transaction::where('id', '=', $this->editing['id'])->update($this->editing);
      }else{
      
        Transaction::create([
            'title' => $this->editing['title'],
            'amount' =>$this->editing['amount'],
            'status' => $this->editing['status'],
            'date' => (new \DateTime($this->editing['date'] ))->format('Y-m-d'),
        ]);
      
      }
       
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
