<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Employee;
use App\Models\Image;
use App\Models\Payroll;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('admin.emp');
    }

    public function view(): View
    {
        return view('admin.view', [
            'employees' => Employee::with('user')->first()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        try{
            // Get the authenticated user's name
            $admin = auth()->user()->name;
            $id = Employee::count()+1;
            //Create Employee
            $validated = $request->validate([
                'role' => 'required|string|uppercase|max:255',
                'userName' => 'required|string|uppercase|max:255',
                'last' => 'required|string|uppercase|max:255',
                'first' => 'required|string|uppercase|max:255',
                'middle' => 'nullable|string|uppercase|max:255',
                'status' => 'required|string|uppercase|max:255',
                'email' => 'nullable|string|uppercase|max:255',
                'phone' => 'nullable|string|uppercase|max:255',
                'job' => 'required|string|uppercase|max:255',
                'sss' => 'nullable|string|uppercase|max:255',
                'philhealth' => 'nullable|string|uppercase|max:255',
                'pagibig' => 'nullable|string|uppercase|max:255',
                'rate' => 'required|string|uppercase|max:255',
                'address' => 'required|string|uppercase|max:255',
                'eName' => 'nullable|string|uppercase|max:255',
                'ePhone' => 'nullable|string|uppercase|max:255',
                'eAdd' => 'nullable|string|uppercase|max:255',            
            ]);
            $validated['password'] = Hash::make($request->last);
            $validated['created_by'] = $admin;
            $request->user()->employees()->create($validated);
            //Get Image
            $userName = $request->userName;
            $fileName = $userName.'-'.time().'.'.$request->image->extension();
            $imageData = file_get_contents($request->file('image')->getRealPath());
            //Get QR
            $writer = new PngWriter();
            $qrCode = QrCode::create($userName)
                ->setEncoding(new Encoding('UTF-8'))
                ->setErrorCorrectionLevel(ErrorCorrectionLevel::Low)
                ->setSize(300)
                ->setMargin(10)
                ->setRoundBlockSizeMode(RoundBlockSizeMode::Margin)
                ->setForegroundColor(new Color(0, 0, 0))
                ->setBackgroundColor(new Color(255, 255, 255));
            $result = $writer->write($qrCode);
            //Save File
            $result->saveToFile(public_path('images/'.$fileName));
            $qrData = file_get_contents(public_path('images/'.$fileName));
            $imagePath = 'images/' . $fileName; 
            Storage::disk('public')->delete($imagePath);

            // Save Image And QR
            $image = new Image();
            $image->userId = $id;
            $image->image_name = $fileName;
            $image->image_data = $imageData;
            $image->qr_data = $qrData;
            $image->save();

            //Create Payroll
            $payroll = new Payroll();
            $payroll->userId = $id;
            $payroll->name = $request->last.', '.$request->first.' '.$request->middle;
            $payroll->job = $request->job;
            $payroll->rate = $request->rate;
            $payroll->rph = $request->rate/8+($request->rate/8)*0.2;
            $payroll->save();

            return redirect(route('a-employee.index'))->with('success', 'Successfully added employee.');
        }catch (\Exception $e) {
            return redirect(route('a-employee.index'))->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $employee = Employee::find($id);
        $image = Image::find($id);
        Gate::authorize('update', $employee);
        return view('admin.editEmp', [
            'employee' => $employee,
            'image' => $image,
        ]);

    // Load the edit view
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee): RedirectResponse
    {
        Gate::authorize('update', $employee);
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
        $employee->update($validated);
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
    }

    public function getUserName(Request $request){
        $data = $request->input('role');
        $count = (string)Employee::where('role', $data)->count() + 1;
        $role = $data[0];
        $length = strlen($count);
        switch($length){
            case 1:
                return response()->json($role.'-00'.$count);
            case 2:
                return response()->json($role.'-0'.$count);
            default:
                return response()->json($role.'-'.$count);
        }
    }
    
    public function QR(Request $request){
        $data = $request->input('id');
        $image = Image::findOrFail($data);
        $filename = $image->image_name;
        $qrData = $image->qr_data;
        $headers = [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];
        return response()->stream(function () use ($qrData) {
            echo $qrData;
        }, 200, $headers);
    }
}


