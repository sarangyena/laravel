<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Employee;
use App\Models\Image;
use App\Models\Log;
use App\Models\User;
use Illuminate\Support\Carbon;
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



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     // Define a class property
    private $current;
    private $firstDay;
    private $lastDay;
    private $admin;

    public function __construct()
    {
        //Dates
        $this->current = Carbon::today();
        $firstDay = $this->current->copy()->startOfWeek();
        $lastDay = $this->current->copy()->endOfWeek();
        $this->firstDay = $firstDay->format('F j, Y');
        $this->lastDay = $this->current->format('F j, Y');
        //Admin
        $this->admin = auth()->user();
    }
    public function index(): View
    {
        $log = Log::where('user_id', $this->admin->id)
            ->whereDate('created_at', $this->current)
            ->get();
        return view('admin.emp', [
            'log' => $log,
        ]);
    }

    public function view(): View
    {
        $today = Carbon::today();
        // Example specific date
        $specificDate = Carbon::parse('2024-01-07');

        // Compare week numbers
        $isSameWeek = $specificDate->week() === $today->week();
        dd($today->week());

        $log = Log::where('user_id', $this->admin->id)
            ->whereDate('created_at', $this->current)
            ->get();
        $count = Employee::paginate(5);
        if ($count == null) {
            return view('admin.view', [
                'employees' => Employee::with('user')->first()->paginate(5),
                'log' => $log,
            ]);
        } else {
            return view('admin.view', [
                'employees' => $count,
                'log' => $log,
            ]);
        }
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
        $week = $this->firstDay.' - '.$this->lastDay;
        try {
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
            $validated['created_by'] = $this->admin->name;
            $request->user()->employees()->create($validated);
            $employee = Employee::latest()->first();

            //Get Image
            $userName = $request->userName;
            $fileName = $userName . '-' . time() . '.' . $request->image->extension();
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
            $result->saveToFile(public_path('images/' . $fileName));
            $qrData = file_get_contents(public_path('images/' . $fileName));
            $imagePath = 'images/' . $fileName;
            Storage::disk('public')->delete($imagePath);

            // Save Image And QR
            $image = [];
            $image['image_name'] = $fileName;
            $image['image_data'] = $imageData;
            $image['qr_data'] = $qrData;
            $employee->image()->create($image);

            //Create Payroll
            $payroll = [];
            $payroll['name'] = $request->last . ', ' . $request->first . ' ' . $request->middle;
            $payroll['userName'] = $userName;
            $payroll['week'] = $week;
            $payroll['employee_id'] = $employee->id;
            $payroll['job'] = $request->job;
            $payroll['rate'] = $request->rate;
            $payroll['rph'] = $request->rate / 8 + ($request->rate / 8) * 0.2;
            $request->user()->payroll()->create($payroll);

            $log = [];
            $log['title'] = "ADD EMPLOYEE";
            $log['log'] = "User " . auth()->user()->userName . " added " . $userName . ".";
            $request->user()->log()->create($log);
            return redirect(route('a-employee.index'))->with('success', 'Successfully added employee.');
        } catch (\Exception $e) {
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
        $id = auth()->user()->id;
        $currentDate = Carbon::today();
        $log = Log::where('user_id', $id)
            ->whereDate('created_at', $currentDate)
            ->get();
        $employee = Employee::find($id);
        $image = Image::find($id);
        Gate::authorize('update', $employee);
        return view('admin.editEmp', [
            'employee' => $employee,
            'image' => $image,
            'log' => $log,
        ]);

        // Load the edit view
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        try {
            $employee = Employee::find($id);
            Gate::authorize('update', $employee);
            $validated = $request->validate([
                'role' => 'nullable|string|uppercase|max:255',
                'userName' => 'nullable|string|uppercase|max:255',
                'last' => 'nullable|string|uppercase|max:255',
                'first' => 'nullable|string|uppercase|max:255',
                'middle' => 'nullable|string|uppercase|max:255',
                'status' => 'nullable|string|uppercase|max:255',
                'email' => 'nullable|string|uppercase|max:255',
                'phone' => 'nullable|string|uppercase|max:255',
                'job' => 'nullable|string|uppercase|max:255',
                'sss' => 'nullable|string|uppercase|max:255',
                'philhealth' => 'nullable|string|uppercase|max:255',
                'pagibig' => 'nullable|string|uppercase|max:255',
                'rate' => 'nullable|string|uppercase|max:255',
                'address' => 'nullable|string|uppercase|max:255',
                'eName' => 'nullable|string|uppercase|max:255',
                'ePhone' => 'nullable|string|uppercase|max:255',
                'eAdd' => 'nullable|string|uppercase|max:255',
            ]);
            $employee->update($validated);
            $changes = $employee->getChanges();
            unset($changes['updated_at']);
            $columns = [];
            foreach ($changes as $attribute => $values) {
                $columns[] = $attribute;
            }
            $sentence = implode(', ', $columns);
            $log = [];
            $log['title'] = "EDIT EMPLOYEE";
            $log['log'] = "User " . auth()->user()->userName . " edited " . $employee->userName . " details. The columns edited are " . $sentence . ".";
            $request->user()->log()->create($log);
            return redirect(route('a-view'))->with('update', 'Successfully Updated Employee.');
        } catch (\Exception $e) {
            return redirect(route('a-view'))->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::find($id);
            Gate::authorize('delete', $employee);
            $employee->delete();
            $id = auth()->user()->id;
            $admin = User::find($id);
            $log = [];
            $log['title'] = "DELETE EMPLOYEE";
            $log['log'] = "User " . auth()->user()->userName . " deleted " . $employee->userName . ".";
            $admin->log()->create($log);
            return redirect(route('a-view'))->with('delete', 'Successfully Deleted Employee.');;
        } catch (\Exception $e) {
            return redirect(route('a-view'))->with('error', $e->getMessage());
        }
    }

    public function getUserName(Request $request)
    {
        $data = $request->input('role');
        $count = Employee::where('role', $data)
            ->orderBy('id', 'desc')
            ->value('id') + 1;
        $role = $data[0];
        $length = strlen($count);
        switch ($length) {
            case 1:
                return response()->json($role . '-00' . $count);
            case 2:
                return response()->json($role . '-0' . $count);
            default:
                return response()->json($role . '-' . $count);
        }
    }

    public function QR(Request $request)
    {
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
