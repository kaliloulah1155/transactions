<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\Profile;
use App\Http\Livewire\Login;
use App\Http\Livewire\Register;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::redirect('/','login');
   
 Route::middleware('auth')->group(function(){
    Route::get('/dashboard', Dashboard::class);

    Route::get('/profile', Profile::class);
 });
 
Route::get('/register', Register::class);
Route::get('/login', Login::class)->middleware('guest')->name('login'); 

Route::get('/logout', function () {
    auth()->logout();
    return redirect('login');
}); 
 
Route::get('/contact', function () {
    return view('contact');
});


 


