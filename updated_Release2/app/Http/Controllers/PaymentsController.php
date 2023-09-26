<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customers;
use App\Models\User;
use App\Models\Payments;
use App\Models\Policy;
use App\Http\Requests\Admin\CustomersFormRequest;

class PaymentsController extends Controller
{
    public function showPaymentForm(Request $request)
{
    // Retrieve the customer's information from the database
    $customer = Customers::where('email', $request->user()->email)->first();

    // Check if a customer was found
    if ($customer) {
        // Pass the customer's information and policy data to the view
        return view('payment', compact('customer'));
    } else {
        // Display an error message if no customer was found
        return view('payment')->withErrors('No customer information available.');
    }
}

public function storePayments(Request $request)
{
    $validatedData = $request->validate([
        'payment_date' => 'required|date',
        'amount' => 'required|numeric',
    ]);

    // Retrieve the customer's information from the database
    $customer = Customers::where('email', $request->user()->email)->first();

    // Check if a customer was found
    if ($customer) {
        // Store the upgrade request in the database
        $payment = new Payments;
        $payment->customer_id = $customer->id;
        $payment->name = $customer->name;
        $payment->email = $customer->email;
        $payment->payment_date = $validatedData['payment_date'];
        $payment->amount = $validatedData['amount'];
        $payment->save();

        // Redirect the user to the user_home page with a success message
        return redirect('user_home')->with('message', 'Upgrade Request Submitted Successfully');
    } else {
        // Redirect the user to the user_home page with an error message
        return redirect('user_home')->with('errorMessage', 'No customer information available.');
    }
}

public function userHome()
{
    $customer = Auth::user();
    $payments = Payments::where('customer_id', $customer->id)->get();

    $policy = Policy::where('policy_number', $customer->policy_number)->get();

    return view('user_home', compact('customer', 'payments', 'policy'));
}
}
