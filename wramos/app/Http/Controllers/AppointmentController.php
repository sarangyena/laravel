<?php

namespace App\Http\Controllers;

use App\Models\Appointments;
use App\Models\Patient;
use App\Models\Services;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    private $cache;
    public function __construct(){
        if(!is_null(cache(''.auth()->user()->id.''))){
            $this->cache = cache(''.auth()->user()->id.'');
        }
    }
    public function index(): View
    {
        if(url()->previous() == 'http://localhost:8000/user/recommend'){
            $services = Services::all();
            return view('user.book',[
                'data'=>$services,
                'cache'=>$this->cache,
            ]);
        }else{
            cache()->forget(''.auth()->user()->id.'');
            $services = Services::all();
            return view('user.book',[
                'data'=>$services,
            ]);
        }
        
    }
    public function cache(Request $request): RedirectResponse
    {
        $cache = [];
        $cache['date'] = $request->date;
        $cache['services'] = $request->input('services');
        $cache['recommend'] = [];
        $services = Services::all();
        $cache['total'] = 0;
        $cache['allServices'] = null;
        foreach($services as $s){
            if($cache['allServices'] == null){
                $cache['allServices'] = $s->name;
            }else{
                $cache['allServices'] = $cache['allServices'].', '.$s->name;
            }
            if(isset($cache['services'][$s->id])){
                $cache['total'] += $s->fee;
                if($s->recommend == true){
                    $cache['recommend'][$s->id] = $s->name;
                }
            }else{
                continue;
            }
        }
        cache()->forget(''.auth()->user()->id.'');
        $this->cache = cache()->forever(auth()->user()->id, $cache);
        return redirect()->route('u-recommend');
    }
    public function recommend(Request $request)
    {
        $temp = $this->cache;
        $temp['temp'] = $temp['services'];
        $patient = Patient::where('user_id', auth()->user()->id)->first();
        $max = Appointments::where('patient_id', $patient->id)->max('appointment_id')+1;
        $temp['appointment_id'] = $max;
        for($i = 1; $i <= max(array_keys($temp['temp'])); $i++){
            if(isset($temp['temp'][$i])){
                $temp['services'] = $temp['temp'][$i];
                if(isset($temp['recommend'][$i])){
                    $temp['amount'] = intval(Services::find($i)->fee);
                    $temp['recommendation'] = file_get_contents($request->file($i)->getRealPath());
                }else{
                    $temp['recommendation'] = null;
                    $temp['amount'] = intval(Services::find($i)->fee);
                }
                if($i == max(array_keys($temp['temp']))){
                    $temp['minified'] = true;
                }
                $patient->appointment()->create($temp);
            }
        } 
        $temp['services'] = $temp['temp'];
        unset($temp['recommendation']);
        unset($temp['temp']);
        cache()->forget(''.auth()->user()->id.'');
        $this->cache = cache()->forever(auth()->user()->id, $temp);
        return redirect()->route('u-summary');
    }
}
