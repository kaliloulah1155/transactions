@props([
    'label',
    ])
 
    <select 
    {!! $attributes->merge(['class' => 'form-select focus:ring-indigo-500  border-2 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md  border-gray-300" {{ $attributes }} aria-label="Default select example']) !!} > 
   
       <option value="" selected >{{$label}} </option>
        {{$slot}}
        
    </select>
 