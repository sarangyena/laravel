<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use App\Models\Employee;
use App\Models\Image;
use App\Models\Log;
use App\Models\Payroll;
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
    private $user;
    public function __construct()
    {
        //User
        $this->user = auth()->user();
    }
    public function salary(): View
    {
        $salary = Payroll::where('userName', $this->user->userName)->paginate(5);
        return view('employee.salary',[
            'payroll' => $salary,
        ]);
    }
}
