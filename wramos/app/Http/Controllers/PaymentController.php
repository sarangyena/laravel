<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Payment;
use App\Models\Services;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Ixudra\Curl\Facades\Curl;

class PaymentController extends Controller
{
    private $cache;
    private $patient;
    public function __construct(){
        if(!is_null(cache(''.auth()->user()->id.''))){
            $this->cache = cache(''.auth()->user()->id.'');
        }
        $this->patient = Patient::where('user_id',auth()->user()->id)->first();
    }
    public function pay()
    {        
        $data = [
            'data' => [
                'attributes' => [
                    'line_items' => Services::all()->map(function ($service) {
                        $cache = $this->cache;
                        if(isset($cache['services'][$service->id])){
                            return [
                                'currency'      => 'PHP',
                                'amount'        => intval($service->fee)*100,
                                'description'   => $service->name,
                                'name'          => $service->name,
                                'quantity'      => 1,
                            ];
                        }
                        
                    })->toArray(),
                    
                    'payment_method_types' => [
                        'card',
                        'gcash',
                        'grab_pay',
                    ],
                    'success_url' => 'http://localhost:8000/user/success',
                    'cancel_url' => 'http://localhost:8000/success',
                    'description' => 'W. RAMOS Diagnostic Laboratory Services'
                ],
            ]
        ];

        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . env('AUTH_PAY'))
            ->withData($data)
            ->asJson()
            ->post();
        Session::put('session_id', $response->data->id);
        return redirect()->to($response->data->attributes->checkout_url);
    }

    public function success()
    {
        $sessionId = Session::get('session_id');
        $response = Curl::to('https://api.paymongo.com/v1/checkout_sessions/' . $sessionId)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . env('AUTH_PAY'))
            ->asJson()
            ->get();
        
        $cache = $this->cache;
        $data = [];
        $data['reference'] = $response->data->id;
        $data['type'] = $response->data->attributes->payments[0]->type;
        $data['method'] = $response->data->attributes->payment_method_used;
        $data['status'] = $response->data->attributes->payments[0]->attributes->status;
        $data['amount'] = $response->data->attributes->payments[0]->attributes->amount / 100;
        $data['paid_at'] = Carbon::createFromTimestamp($response->data->attributes->paid_at)->toDateTimeString();   
        $this->patient->payment()->create($data);
        cache()->forget(''.auth()->user()->id.'');
        cache()->forever(auth()->user()->id, $data);
        return redirect()->route('u-payment');
    }
    public function successView()
    {
        return view('user.payment');
    }
    public function linkPay()
    {
        $data['data']['attributes']['amount'] = 150050;
        $data['data']['attributes']['description'] = 'Test transaction.';

        $response = Curl::to('https://api.paymongo.com/v1/links')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . env('AUTH_PAY'))
            ->withData($data)
            ->asJson()
            ->post();

        dd($response);
    }

    public function linkStatus($linkid)
    {
        $response = Curl::to('https://api.paymongo.com/v1/links/' . $linkid)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . env('AUTH_PAY'))
            ->asJson()
            ->get();

        dd($response);
    }


    public function refund()
    {

        $data['data']['attributes']['amount']       = 5000;
        $data['data']['attributes']['payment_id']   = 'pay_sA83KrtmJUdue8prEHD6rZrY';
        $data['data']['attributes']['reason']       = 'duplicate';

        $response = Curl::to('https://api.paymongo.com/refunds')
            ->withHeader('Content-Type: application/json')
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . env('AUTH_PAY'))
            ->withData($data)
            ->asJson()
            ->post();

        dd($response);
    }

    public function refundStatus($id)
    {
        $response = Curl::to('https://api.paymongo.com/refunds/' . $id)
            ->withHeader('accept: application/json')
            ->withHeader('Authorization: Basic ' . env('AUTH_PAY'))
            ->asJson()
            ->get();

        dd($response);
    }
    public function storePay()
    {
        
    }
}
