 
<div>
 
   <h1 class="text-2xl font-semibold text-gray-900"> Dashboard </h1>
   
    
   <div class="py-4 space-y-4">
      <div>
           <div class="w-1/4">
               <x-input.text wire:model="search"  placeholder="Search transaction ..."  />
			</div>
		</div>
    <div class="flex-col space-y-4" wire:loading.class="opacity-50" wire:target="search">
       <x-table>
          <x-slot name="head">
              <x-table.heading> <a wire:click="sortBy('title')" :direction="$sortField === 'title' ? $sortDirection : null ">Title</a></x-table.heading>
			  <x-table.heading> <a wire:click="sortBy('amount')" :direction="$sortField === 'amount' ? $sortDirection : null ">Amount</a> </x-table.heading>
			  <x-table.heading> <a wire:click="sortBy('status')" :direction="$sortField === 'status' ? $sortDirection : null ">Status</a></x-table.heading>
			  <x-table.heading> <a wire:click="sortBy('date')" :direction="$sortField === 'date' ? $sortDirection : null ">Date</a></x-table.heading>
		      <x-table.heading> </x-table.heading>
		  </x-slot>
		  <x-slot name="body">
		  
		     
		    
             
		    @forelse($transactions as $transaction)
		    
			
		      <x-table.row >
		          <x-table.cell>
		          
				        <div class="flex items-center">
							<div>
								<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
								</svg>
                            </div>       
							<div class="ml-3">
								<p class="text-gray-600 truncate">
 									{{ $transaction->title }}
 									
								</p>
							</div>
						</div>
		            
		          
		          </x-table.cell>
				  <x-table.cell>
				        <p class="text-gray-900 whitespace-no-wrap"> $ {{ $transaction->amount }} USD</p>
				       
				  </x-table.cell>
				  <x-table.cell>
				  
				      <span
                                        class="relative inline-block px-3 py-1 font-semibold text-{{ $transaction->status_color}}-900 leading-tight">
                                        <span aria-hidden
                                            class="absolute inset-0 bg-{{ $transaction->status_color}}-200 opacity-50 rounded-full"></span>
									<span class="relative"> {{ $transaction->status }}</span>
									</span>
				    
				</x-table.cell>
				  <x-table.cell>{{ $transaction->date_for_humans }}</x-table.cell>
				  
				<x-table.cell>
				    <x-button.link wire:click="edit({{ $transaction->id  }})">   Edit </x-button.link>
				</x-table.cell>
			  </x-table.row>
			@empty
			<x-table.row>
			   <x-table.cell colspan="4"> 
			       <div class="flex justify-center items-center space-x-2">
				   <x-icon.inbox></x-icon.inbox>
			          <span class="font-medium py-8 text-cool-gray-400 text-xl">No Transaction found...</span>
				        
			       </div>
			        
			   </x-table.cell>
			</x-table.row>
			
			@endforelse
			  
			  
		  </x-slot> 
		</x-table>
	</div>
	  <div>
	     	{{ $transactions->links()}}
		</div>
   </div>
</div>

 
	<x-modal.dialog wire:model.defer="showEditModal">
	   <x-slot name="title">Edit Transaction</x-slot>
	   
	   <x-slot name="content">
	       <x-input.group for="title" label="Title" :error="$errors->first('editing.title')">
		       <x-input.text wire:model="editing.title" id="title" />
	       </x-input.group>
	       <x-input.group for="amount" label="Amount" :error="$errors->first('editing.amount')">
		       <x-input.money wire:model="editing.amount" id="amount" />
	       </x-input.group>
	       <x-input.group for="status" label="Status" :error="$errors->first('editing.status')">
		       <x-input.select wire:model="editing.status" id="status" > 
					   
				    @foreach( \App\Models\Transaction::STATUSES as $value=>$label)
					   <option value="{{ $value }}"> {{$label}}</option>
				    @endforeach
				</x-input.select>
	       </x-input.group>
		   <x-input.group for="date" label="Date" :error="$errors->first('editing.date')">
		       <x-input.text wire:model="editing.date"  type="date"  placeholder="DD/MM/YYYY" id="date" />
	       </x-input.group>
	       
	       <x-input.text wire:model="editing.id"  type="hidden"  />
	   </x-slot>
	   
	   <x-slot name="footer">
	      <x-button.secondary  wire:click="$set('showEditModal', false)" >Cancel</x-button.secondary> &nbsp;
	      <x-button.primary wire:click.prevent="save" >Save</x-button.primary>
	   </x-slot>
	</x-modal.dialog>
 
 
