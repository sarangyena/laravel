<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use Illuminate\Http\Request;
//Print
use Spatie\Browsershot\Browsershot;

class PrintController extends Controller
{
    public function index()
    {
        return view("print.index");
    }
    public function print($id)
    {
        Browsershot::html('Foo')
            ->setNodeBinary('/usr/local/bin/node')
            ->setNpmBinary('/usr/local/bin/npm');
        Browsershot::html('<h1>Hello world!!</h1>')->save('example.pdf');    
    }
}
