 
<div>
<div class="md:col-span-1">
      <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
         
       </div>
    </div>
  <div class="md:grid md:grid-cols-2 md:gap-6">


   
    <div class="mt-5 md:mt-0 md:col-span-2">
      <form wire:submit.prevent="save" action="#" method="POST">
        <div class="shadow sm:rounded-md sm:overflow-hidden">

        
            @if($saved)
            <!--  success message -->
                <div 

                
                x-show.transition.in.duration.1000ms="open"
                
                
                class="flex items-center justify-between  p-4 bg-white border rounded-md shadow-sm">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                      <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                        clip-rule="evenodd" />
                    </svg>
                    <p class="ml-3 text-sm font-bold text-green-600">Profile is saved !</p>
                  </div>
                  <span wire:click="changeSaved" class="inline-flex items-center cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-gray-600" fill="none" viewBox="0 0 24 24"
                      stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                  </span>
                </div>
            <br/>
          @endif
          <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

            <x-input.group  label="Username" for='username' :error="$errors->first('username')" >
                 <x-input.text  wire:model.lazy="username" id="username" type="text" leading-add-on="surge.com/" />
            </x-input.group>

            <x-input.group  label="Birthday" for='birthday' :error="$errors->first('birthday')" >
                   <x-input.date  wire:model="birthday" type="date"  placeholder="DD/MM/YYYY" />
                
            </x-input.group>

           <?php /*    <x-input.group  label="Count" for='count' >
              <div wire:model.lazy="count">
               <!-- use wire:ignore in div parent before Count : <button type="button" onclick="this.innerText=Number(this.innerText)+1">0</button> -->
               Count : 
               <button 
                  type="button"
                  x-data="{count :0 }" 
                  @click="count++;$dispatch('change', count)"
                  x-text="count" 
                 >
                </button>
              </div>
             </x-input.group>
                 Livewire Count {{ $count }}
                 */ ?>
            <x-input.group  label="About" for='about' :error="$errors->first('about')" help-text="Write a few sentences about yourself" >
                 <x-input.rich-text  wire:model.lazy="about" id="about" :initial-value="$about"  />
            </x-input.group>

            

            <x-input.group  label="Photo" for='photo' :error="$errors->first('newAvatar')" >
            
                
                  <span   class="inline-block flex items-center  h-20 w-20 rounded-full overflow-hidden bg-gray-100">
            
                      @if($newAvatar) 
                         <img src="{{ $newAvatar->temporaryUrl()  }}"  class="flex items-center " alt="Profile photo"> 
                         @else 
                       
                        <img src="{{ auth()->user()->avatarUrl()  }}"  class="flex items-center " alt="Profile photo">
                      @endif
                   </span> 
                   
                   
                   <x-input.filepond  wire:model="newAvatar"  />
            
                   <?php /*   <x-input.filepond  wire:model="files" multiple /> */ ?>
            
            <?php /* <x-input.file-upload  wire:model="newAvatar" id="photo">
                 <span   class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
            
                      @if($newAvatar) 
                        <?php /* <img src="{{ $newAvatar->temporaryUrl()  }}" alt="Profile photo">   @else 
                       
                        <img src="{{ auth()->user()->avatarUrl()  }}" alt="Profile photo">
                      @endif
                   </span>
                   </x-input.file-upload>
                   */ ?>
               </x-input.group>
          </div>
           
          <?php /* 
            @foreach($newAvatars as $avatar)
                <div class="col-span-3 flex items-center flex justify-center " >
                   <img class="text-center" src="{{ $avatar->temporaryUrl()  }}" />
                </div>
            @endforeach
          */?>
          <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
          <button type="button" class="ml-5 bg-white py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm  font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Cancel</button>
        &nbsp;
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
 
 
 

