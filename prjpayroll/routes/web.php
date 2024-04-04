<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(auth()->user()){
        return view('admin.index');
    }else{
        return view('auth.login');
    }
})->name('index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/a-dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('a-dashboard');

Route::resource('a-employee', EmployeeController::class)
    ->only(['index', 'store', 'edit', 'update'])
    ->middleware(['auth']);

Route::get('/a-view', [EmployeeController::class,'view'])->name('a-view');
Route::resource('a-payroll', PayrollController::class)
    ->only(['index', 'store'])
    ->middleware(['auth']);

Route::post('/username', [EmployeeController::class,'getUserName'])->name('username');
Route::post('/a-qr', [EmployeeController::class,'QR'])->name('a-qr');

Route::get('/sample', function () {
    return view('admin.sample');
})->name('sample');
Route::get('/edit', function () {
    return view('admin.editEmp');
});

require __DIR__.'/auth.php';
