<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


//If authenticated, go to dashboard
Route::get('/', function(){
    if(auth()->user()){
        return redirect()->route('dashboard');
    }else{
        return view('auth.login');
    }
});
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified','x-frame-options'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
