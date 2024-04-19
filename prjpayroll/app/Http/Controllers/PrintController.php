<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;
//Print
use function Spatie\LaravelPdf\Support\pdf;
use Spatie\Browsershot\Browsershot;

class PrintController extends Controller
{
    public function print()
    {
        return pdf('print.index', [
            'invoiceNumber' => '1234',
            'customerName' => 'Grumpy Cat',
        ]);
    }
}
