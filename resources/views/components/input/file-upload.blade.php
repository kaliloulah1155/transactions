
 

  <div class="mt-1 flex items-center flex justify-center">
          {{$slot}}
         &nbsp; 
     <div x-data="{focused:false}">
        <input  @focus="focused=true" @blur="focused=false" class="sr-only" type="file"   {{ $attributes }} />
        
        <label for="{{ $attributes['id']}}" x-bind:class="{'outline-none ring-2 ring-offset-2 ring-indigo-500' : focused}"  class="cursor-pointer ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 ">
            Change
          </label>
     </div>