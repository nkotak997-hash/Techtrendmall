<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;

class RazorpayPaymentController extends Controller
{
    public function index()
    {
        return view('razorpayView');
    }
    public function store(Request $request)
{
    $input = $request->all();
    $api = new Api("rzp_test_FUijwPsI1t6dUR", "jRnoTlr33KFYLVmWfEf1zNvq");

    $paymentId = $input['razorpay_payment_id'];
    $amount = $input['amount']; // This is the total cart price sent from the frontend

    if (!empty($paymentId)) {
        try {
            // Capture the payment with the correct amount
            $response = $api->payment->fetch($paymentId)->capture([
                'amount' => $amount // Amount in paise
            ]);

            Session::put('success', 'Payment successful');
            return redirect()->route('success.page'); // Redirect to a success page
        } catch (Exception $e) {
            Session::put('error', $e->getMessage());
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    Session::put('error', 'Payment failed. Try again.');
    return redirect()->back();
}

}
