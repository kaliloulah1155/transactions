@props(['initialValue'=>""])
<div 
  
  wire:ignore
  {{$attributes}}
  x-data 
  @trix-blur="$dispatch('change', $event.target.value)"
class="mt-1">
    
     <input id="x" value="{{ $initialValue }}" type="hidden" />
    <trix-editor
       input="x"
    class="shadow-sm focus:ring-indigo-500 resize-none focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
    ></trix-editor>
</div>