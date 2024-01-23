<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use LDAP\Result;

class PaymentController extends Controller
{
    public function index() {
        return view('home');
    }
    
    
    public function checkout(Request $request) {
        $request->request->add([
            'total_price' => $request->quantity * 50000,
            'status' => 'Unpaid'
        ]);
        
        $order = Payment::create($request->all());

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'first_name' => $request->name,
                'last_name' => '',
                'phone' => $request->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return view('checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request) {
        $serverKey = config('midtrans.server_key');
        $hash = hash("sha512", $request->order_id.$request->status_code.$request->gross_amount.$serverKey);
        if ($hash == $request->signature_key){
            if($request->transaction_status == 'capture'){
                $order = Payment::find($request->order_id);
                $order->update(['status' => 'Paid']);
            }
        }
    }

    public function invoice($id) {
        $order = Payment::find($id);
        return view('invoice', compact('order'));
    }
}
