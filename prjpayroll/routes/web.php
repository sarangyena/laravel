<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Functions;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QR;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPdf\Facades\Pdf;

//Admin and User Dashboard
Route::get('admin/dashboard', [AdminController::class,'index'])->middleware(['auth','admin'])->name('a-dash');
Route::get('employee/dashboard', [UserController::class,'index'])->middleware(['auth','user'])->name('e-dash');

//If authenticated, go to dashboard
Route::get('/', function(){
    if(auth()->user()){
        $type = auth()->user()->userType;
        if($type == 'admin'){
            return redirect()->route('a-dash');
        }else if($type == 'QR'){
            return redirect()->route('qr');
        }else{
            return redirect()->route('e-dash');
        }
    }else{
        return view('auth.login');
    }
});

//Admin
Route::middleware(['auth','admin'])->group(function(){
    //Employee
    Route::get('admin/employee', [AdminController::class, 'empIndex'])->name('a-employee');
    Route::post('admin/store', [AdminController::class, 'store'])->name('a-store');
    Route::get('admin/view', [AdminController::class, 'empView'])->name('a-view');
    Route::post('admin/username', [Functions::class,'getUserName'])->name('username');
    Route::get('admin/{id}/edit', [AdminController::class,'edit'])->name('a-edit');
    Route::patch('admin/{id}/employee', [AdminController::class,'update'])->name('a-update');
    Route::delete('admin/{id}', [AdminController::class,'destroy'])->name('a-delete');
    Route::get('admin/{id}/qr', [Functions::class,'QR'])->name('a-qr');

    //Payroll
    Route::get('admin/payroll', [AdminController::class,'payView'])->name('a-payroll');
    Route::get('admin/{id}/payroll', [AdminController::class,'payEdit'])->name('a-payEdit');
    Route::patch('admin/{id}/payroll', [AdminController::class,'payUpdate'])->name('a-payUpdate');
});

//Employee
Route::middleware(['auth','user'])->group(function(){
    Route::get('employee/salary', [EmployeeController::class, 'salary'])->name('e-salary');

});


//QR Login
Route::middleware(['auth','QR'])->group(function () {
    Route::get('qr',[QR::class,'index'])->name('qr');
    Route::get('qr/view',[QR::class,'view'])->name('qr-view');
    Route::post('qr/find',[QR::class,'find']);
    Route::post('qr/image',[QR::class,'image']);
    Route::post('qr/check',[QR::class,'check']);
    Route::post('qr/store',[QR::class,'store'])->name('qr-store');
    Route::patch('qr/update', [QR::class,'update'])->name('qr-update');
});
//Print
Route::get('print/', [PrintController::class,'__invoke'])->name('print');

//Route::get('print',[PrintController::class,'index'])->name('print');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
