<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\QRLogin;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;
use Stevebauman\Location\Facades\Location;

use stdClass;

class QR extends Controller
{
    public function index()
    {
        $qr = QRLogin::latest('updated_at')->paginate(5);
        return view('qr.index',[
            'qr' => $qr,
        ]);
    }
    public function view(): View
    {
        $qr = QRLogin::paginate(10);
        return view('qr.view',[
            'qr' => $qr,
        ]);
    }
    public function find(Request $request)
    {
        $data = $request->all();
        $userId = $data['id'];
        $employee = Employee::where('userName', $userId)->first();
        return response()->json([
            'id' => $employee->id,
            'userName' => $employee->userName,
            'name' => $employee->last.', '.$employee->first.' '.$employee->middle,
            'role' => $employee->role,
            'job' => $employee->job,
        ]);        
    }
    public function image(Request $request)
    {
        $data = $request->all();
        $userId = $data['id'];
        $image = Image::where('userName', $userId)->first();
        $data = $image->image_data;
        $filename = $image->image_name;
        return response($data)
        ->header('Content-Type', 'application/octet-stream')
        ->header('Content-Disposition', 'attachment; filename="' . $filename . '"');    
    
    }
    public function check(Request $request)
    {
        $data = $request->all();
        $loc = [];
        $loc['latitude'] = $data['latitude'];
        $loc['longitude'] = $data['longitude'];
        session()->put('loc',$loc);
        $userId = $data['id'];
        $qr = QRLogin::where('userName', $userId)->latest('updated_at')->first();
        if(is_null($qr)){
            return response()->json([
                'check' => 'null',
            ]);    
        }else{
            if($qr->created_at->eq($qr->updated_at)){
                return response()->json([
                    'check' => 'logout',
                ]); 
            }else{
                return response()->json([
                    'check' => 'login',
                ]);   
            }
        }
    }

    public function store(Request $request): RedirectResponse
    {
        $loc = session()->get('loc');
        try {
            //Create Employee
            $validated = $request->validate([
                'userName' => 'required|string|uppercase|max:255',
                'role' => 'required|string|uppercase|max:255',
                'job' => 'required|string|uppercase|max:255',
                'name' => 'required|string|uppercase|max:255',
            ]);
            $validated['ip'] = $request->ip();
            $validated['geo'] = $loc['longitude'].', '.$loc['latitude'];
            $employee = Employee::where('userName', $validated['userName'])->first();
            $employee->qr()->create($validated);
            $image = Image::findOrFail($employee->id);
            $validated['image_data'] = $image->image_data;
            session()->put('data', $validated);
            return redirect('qr')->with('success', 'Successfully login.');
        } catch (\Exception $e) {
            return redirect('qr')->with('error', $e->getMessage());
        }
    }
    public function update(Request $request): RedirectResponse
    {
        $qr = QRLogin::where('userName', $request->userName)->latest('updated_at')->first();
        try {
            $validated = $request->validate([
                'userName' => 'required|string|uppercase|max:255',
                'role' => 'required|string|uppercase|max:255',
                'job' => 'required|string|uppercase|max:255',
                'name' => 'required|string|uppercase|max:255',
            ]);
            $qr->timestamps = false;
            $qr->updated_at = now(); // or any other timestamp value
            $qr->save();
            return redirect('qr')->with('success', 'Successfully logout.');
        } catch (\Exception $e) {
            return redirect('qr')->with('error', $e->getMessage());
        }
    }

}
