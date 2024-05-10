<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProfileController;
use App\Models\Services;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $services = Services::all();
    return view('index', [
        'services' => $services,
    ]);
})->name('index');
Route::middleware(['auth','ADMIN'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('a-dash');
    Route::get('/admin/users', [AdminController::class, 'online'])->name('a-online');
    Route::get('/admin/patients', [AdminController::class, 'patients'])->name('a-patients');
    Route::get('/admin/oUpdate/{id}', [AdminController::class, 'onlineUpdate'])->name('a-oUpdate');
    Route::get('/admin/delete/{id}/{route}', [AdminController::class, 'destroy'])->name('a-delete');
    Route::get('/admin/view/{id}/', [AdminController::class, 'viewPatient'])->name('a-view');


});
Route::middleware(['auth','CASHIER'])->group(function(){
    Route::get('/cashier/dashboard', [CashierController::class, 'index'])->name('c-dash');
});
Route::middleware(['auth','USER'])->group(function(){
    Route::get('/user/dashboard', [PatientController::class, 'index'])->name('u-dash');
});



Route::resource('contact', ContactController::class)
    ->only('store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
