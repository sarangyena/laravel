<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Mail\Reply;
use App\Models\Appointments;
use App\Models\Patient;
use App\Models\Services;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    $services = Services::all();
    return view('index', [
        'services' => $services,
    ]);
})->name('index');
Route::middleware(['auth', 'ADMIN'])->group(function () {
    Route::get('/admin/appointments', [AdminController::class, 'appointments'])->name('a-appointments');
    Route::get('/admin/read/{id}', [ContactController::class, 'updateRead'])->name('a-read');
    Route::get('/admin/queries', [AdminController::class, 'queries'])->name('a-queries');
    Route::post('/admin/queries/{id}', [ContactController::class, 'reply'])->name('a-reply');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('a-dash');
    Route::get('/admin/users', [AdminController::class, 'online'])->name('a-online');
    Route::get('/admin/patients', [AdminController::class, 'patients'])->name('a-patients');
    Route::get('/admin/oUpdate/{id}', [AdminController::class, 'onlineUpdate'])->name('a-oUpdate');
    Route::get('/admin/delete/{id}/{route}', [AdminController::class, 'destroy'])->name('a-delete');
    Route::get('/admin/view/{id}/', [AdminController::class, 'viewPatient'])->name('a-view');
    Route::get('/admin/services', [AdminController::class, 'services'])->name('a-services');
    Route::get('/admin/packages', [AdminController::class, 'packages'])->name('a-packages');
    Route::get('/admin/addPackage', [AdminController::class, 'addPackage'])->name('a-addP');
    Route::get('/admin/addService', [AdminController::class, 'addService'])->name('a-addS');
    Route::post('/admin/storeP', [AdminController::class, 'storeP'])->name('a-storeP');
    Route::post('/admin/storeS', [AdminController::class, 'storeS'])->name('a-storeS');
    Route::get('/admin/deleteP/{id}', [AdminController::class, 'deletePackage'])->name('a-deleteP');
    Route::get('/admin/editP/{id}', [AdminController::class, 'editPackage'])->name('a-editP');
    Route::get('/admin/editS/{id}', [AdminController::class, 'editS'])->name('a-editS');
    Route::patch('/admin/updateP/{id}', [AdminController::class, 'updatePackage'])->name('a-updateP');
});
Route::middleware(['auth', 'CASHIER'])->group(function () {
    Route::get('/cashier/dashboard', [CashierController::class, 'index'])->name('c-dash');
});
Route::middleware(['auth', 'USER'])->group(function () {
    Route::get('/user/minified', [PatientController::class, 'minified'])->name('u-minified');
    Route::get('/user/dashboard', [PatientController::class, 'index'])->name('u-dash');
    Route::get('/user/book', [AppointmentController::class, 'index'])->name('u-book');
    Route::post('/user/cache', [AppointmentController::class, 'cache'])->name('u-cache');
    Route::post('/admin/store', [PatientController::class, 'store'])->name('u-store');
    Route::get('/user/recommend', function () {
        if(empty(cache('' . auth()->user()->id . '')) == true){
            $services = Services::all();
            return redirect()->route('u-book',[
                'data'=>$services,
            ]);
        }else{
            return view('user.recommend');
        }
    })->name('u-recommend');
    Route::post('/user/recommend/', [AppointmentController::class, 'recommend'])->name('u-recommend');
    Route::get('/user/summary', function () {
        return view('user.summary');
    })->name('u-summary');
    Route::get('/user/history',[PatientController::class, 'history'])->name('u-history');
    Route::get('/user/payment', [PaymentController::class, 'successView'])->name('u-payment');
    Route::get('/user/pay', [PaymentController::class, 'pay'])->name('u-pay');
    Route::get('/user/success', [PaymentController::class, 'success'])->name('u-success');
    Route::post('/user/storePay', [PaymentController::class, 'storePay'])->name('u-storePay');
});



Route::resource('contact', ContactController::class)
    ->only('store');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/testroute', function(){
    $data = [];
    $data['name']= 'adada';
    $data['email'] = 'asgdsfasd@';
    $data['phone'] = '124123';
    $data['date'] = 'asdasddate';
    $data['message']='mesage';
    $data['remarks'] = 'daeremasr';
    return view('admin.mail', [
        'data'=>$data,
    ]);
});

require __DIR__ . '/auth.php';
