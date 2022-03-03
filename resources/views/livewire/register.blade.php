
<div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
  <div class="max-w-md w-full space-y-8">
    <div>
      <img class="mx-auto h-12 w-auto" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="Surge Logo">
      <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">Sign in to your account</h2>
     
    </div>
    <form class="mt-8 space-y-6" wire:submit.prevent="register" action="#" method="POST">
     
         <div>
          <label for="email-address">Email address</label>
          <input wire:model="email" id="email-address" name="email" type="email" autocomplete="email" required class="@error('email') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Email">
          @error('email') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
       
        <div>
          <label for="password">Password</label>
          <input wire:model.lazy="password" id="password" name="password" type="password" autocomplete="current-password" required class=" @error('password') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password">
          @error('password') <div class="mt-1 text-red-500 text-sm">{{ $message }}</div> @enderror
        </div>
        <div>
          <label for="passwordConfirmation">Password Confirmation</label>
          <input wire:model.lazy="passwordConfirmation" id="passwordConfirmation" name="passwordConfirmation" type="password" autocomplete="current-password" required class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" placeholder="Password Confirmation">
        </div>
      
 
      <div>
        <button type="submit" class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
          
         Register
        </button>
      </div>
      <div class="mt-6">
        <p class="mt-2 text-center text-sm text-gray-600">
             <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500"> Already have an account ? </a>
        </p>
      <div>
    </form>
  </div>
</div>


<!--<form wire:submit.prevent="register">
      
     <div>

        <label for="email">email</label>
        <input wire:model="email" type="text" id="email" name="email" />

        @error('email') <span style="color:red">{{ $message }} </span> @enderror

    </div>
    <div>

        <label for="password">password</label>
        <input wire:model.lazy="password" type="password" id="password" name="password" />
        @error('password') <span style="color:red">{{ $message }} </span> @enderror
    </div>
    <div>

        <label for="passwordConfirmation">passwordConfirmation</label>
        <input wire:model.lazy="passwordConfirmation" type="password" id="passwordConfirmation" name="passwordConfirmation" />

    </div>  
    <div>

     <input type="submit" value="Register" />

    </div>

</form>
-->