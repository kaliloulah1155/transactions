@props([
    'label',
    'for',
    'error'=>false,
    'helpText'=>false
    ])

<div class="grid gap-6">
    <div class="col-span-3 sm:col-span-2">
    <label for="{{$for}}" class="block text-sm font-medium text-gray-700">
        {{$label}} 
    </label>
      {{$slot}}

      @if($error)
       <div class="mt-1 text-red-500 text-sm">{{ $error }}</div>  
      @endif
       <br/>
      @if($helpText)
         {{$helpText}}
      @endif
    </div>
</div>