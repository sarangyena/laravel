<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;
//Print
use Spatie\LaravelPdf\Facades\Pdf;
class PrintController extends Controller
{
    public function __invoke()
    {
            Pdf::view('print.index', [
                'invoiceNumber' => '1234',
                'customerName' => 'Grumpy Cat',
            ])
            ->format('a4')
            ->save('invoice.pdf');
    }
}
