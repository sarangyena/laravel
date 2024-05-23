<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Patient;
use App\Models\Services;
use DeepCopy\Filter\ReplaceFilter;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PatientController extends Controller
{
    private $patient;
    private $appointment;
    public function __construct(){
        $this->patient = Patient::where('user_id',auth()->user()->id)->first();
        $this->appointment = Appointments::where('patient_id', $this->patient->id);
    } 
    public function index(): View
    {
        cache()->forget(''.auth()->user()->id.'');
        return view('user.dashboard');
    }
    public function bookIndex(): View
    {
        $services = Services::all();
        return view('user.selectService', [
            'services' => $services,
        ]);
    }
    public function store(Request $request)
    {
        try {
            $id = Appointments::max('appointment_id')+1;
            $services = $request->input('services');
            $amount = 0;
            $recommend = [];
            foreach ($services as $s) {
                $amount += Services::find($s)->fee;
            }
            foreach ($services as $s) {
                $appointment = [];
                $appointment['appointment_id'] = $id;
                $appointment['services'] = Services::find($s)->id;
                $appointment['date'] = $request->input('date');
                $appointment['amount'] = $amount;
                $this->patient->appointment()->create($appointment);
                if(Services::find($s)->recommend == true){
                    $recommend[Services::find($s)->id] = Services::find($s)->name ;
                }

            }
            Session::put('recommend', $recommend);
            return redirect('/user/recommend');
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function updateApp(Request $request, $id)
    {
        try {
            $max = Appointments::where('patient_id', $id)->max('appointment_id');
            $appointment = Appointments::where('appointment_id', $max)->latest()->get();
            $image = [];
            foreach ($appointment as $app){
                if($request->hasFile($app->id) != false){
                    $image['recommendation'] = file_get_contents($request->file($app->id)->getRealPath());
                    $app->update($image);
                }
                
            }
            return redirect('/user/summary')->with([
                ''
            ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function history()
    {
        $appointment = $this->appointment->paginate(10);
        return view('user.history', [
            'data' => $appointment,
        ]);
    }
    public function minified()
    {
        $data = Appointments::where('patient_id', $this->patient->id)->where('minified',true)->get();
        return view('user.minifiedHistory',[
            'data'=> $data,
        ]);
    }
}
