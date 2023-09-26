<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\User;
use App\Models\Policy;
use App\Models\UpgradeRequest;
use App\Models\Payments;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CustomersFormRequest;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;


class CustomersController extends Controller
{
    public function index()
    {
        $customers = Customers::all();
        return view('admin.customers.index', compact('customers'));
    }
  
    public function create()
    {
        $policy = Policy::all();
        return view('admin.customers.create', compact('policy'));
    }

    public function store(CustomersFormRequest $request)
    {
        $data = $request->validated();

        $user = new User;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->username = $data['username'];
        $user->password = bcrypt($data['password']);
        $user->role_as = 0; // set role_as as 0 for customer
        $user->save();

        $customers = new Customers;
        $customers->customer_id = $data['customer_id'];
        $customers->name = $data['name'];
        $customers->username = $data['username'];
        $customers->age = $data['age'];
        $customers->gender = $data['gender'];
        $customers->birth_date = $data['birth_date'];
        $customers->marital_status = $data['marital_status'];
        $customers->phone = $data['phone'];
        $customers->email = $data['email'];
        $customers->address = $data['address'];
        $customers->password = $data['password'];
        $customers->policy_number = $data['policy_number'];
        $customers->policy_type = $data['policy_type'];
        $customers->plans = $data['plans'];
        $customers->description = $data['description']; 
        $customers->save();

        return redirect('admin/customers')->with('message', 'Customer Added Successfully');
    }

    public function edit($customer_id)
    {
        $customers = Customers::find($customer_id);
        $policy = Policy::all();
        return view('admin.customers.edit', compact('customers', 'policy'));
    }

    public function update(customersFormRequest $request, $customer_id)
    {
        $data = $request->validated();

        $customers = Customers::find($customer_id);
        $customers->customer_id = $data['customer_id'];
        $customers->name = $data['name'];
        $customers->username = $data['username'];
        $customers->age = $data['age'];
        $customers->gender = $data['gender'];
        $customers->birth_date = $data['birth_date'];
        $customers->marital_status = $data['marital_status'];
        $customers->phone = $data['phone'];
        $customers->email = $data['email'];
        $customers->address = $data['address'];
        $customers->password = $data['password'];
        $customers->policy_number = $data['policy_number'];
        $customers->policy_type = $data['policy_type'];
        $customers->plans = $data['plans'];
        $customers->description = $data['description'];
        $customers->update();

        return redirect('admin/customers')->with('message', 'Customer Updated Successfully');
    }

    public function destroy($customer_id)
    {
        $customers = Customers::find($customer_id);
        if($customer_id)
        {
            $customers->delete();
            return redirect('admin/customers')->with('message','Customer Deleted Successfully');
        }
        else
        {
            return redirect('admin/customers')->with('message', 'No Customer Id Found');
        }
    }

    public function generatePDF($customer_id)
    {
        $customers = Customers::find($customer_id);
        if(!$customers){
            return redirect('admin/customers')->with('message', 'Customer not found');
        }
        $html = view('admin.customers.pdf_report', compact('customers'))->render();
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream("customers.pdf", array("Attachment" => false));
    }

    public function showHomepage(Request $request)
    {
        // Retrieve the customer's information from the database
        $customer = Customers::where('email', $request->user()->email)->first();
    
         // Retrieve the policy data from the policy table
        $policy = Policy::all();

        // Check if a customer was found
        if ($customer) {
            // Pass the customer's information to the view
            return view('user_home', ['customer' => $customer, 'policy' => $policy]);
        } else {
            // Display an error message if no customer was found
            return view('user_home', ['errorMessage' => 'No customer information available.']);
        }
    }
    
    public function showUpgradeForm(Request $request)
{
    // Retrieve the customer's information from the database
    $customer = Customers::where('email', $request->user()->email)->first();

    // Retrieve the policy data from the policy table
    $policy = Policy::all();

    // Check if a customer was found
    if ($customer) {
        // Pass the customer's information and policy data to the view
        return view('upgrade-request', ['customer' => $customer, 'policy' => $policy]);
    } else {
        // Display an error message if no customer was found
        return view('upgrade-request', ['errorMessage' => 'No customer information available.']);
    }
}

public function storeUpgradeRequest(Request $request)
{
    $validatedData = $request->validate([
        'policy_number' => 'required',
        'policy_type' => 'required',
        'premium_amount' => 'required|numeric',
        'plans' => 'required',
    ]);

    // Retrieve the customer's information from the database
    $customer = Customers::where('email', $request->user()->email)->first();

    // Check if a customer was found
    if ($customer) {
        // Store the upgrade request in the database
        $upgradeRequest = new UpgradeRequest;
        $upgradeRequest->customer_id = $customer->id;
        $upgradeRequest->name = $customer->name;
        $upgradeRequest->email = $customer->email;
        $upgradeRequest->policy_number = $validatedData['policy_number'];
        $upgradeRequest->policy_type = $validatedData['policy_type'];
        $upgradeRequest->premium_amount = $validatedData['premium_amount'];
        $upgradeRequest->plans = $validatedData['plans'];
        $upgradeRequest->save();

        // Redirect the user to the user_home page with a success message
        return redirect('user_home')->with('message', 'Upgrade Request Submitted Successfully');
    } else {
        // Redirect the user to the user_home page with an error message
        return redirect('user_home')->with('errorMessage', 'No customer information available.');
    }
}

public function showUpgradeRequests()
{
    // Retrieve the upgrade requests from the database
    $upgradeRequests = UpgradeRequest::with('customer')->get();

    // Pass the upgrade requests to the view
    return view('admin.upgrade_requests', compact('upgradeRequests'));
}

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

public function userHome(Request $request)
{
    // Retrieve the customer's information from the database
    $customer = Customers::where('email', $request->user()->email)->first();

    // Check if the customer exists and has a policy number
    if ($customer && $customer->policy_number) {
        // Retrieve the policy information based on the customer's policy number
        $policy = Policy::where('policy_number', $customer->policy_number)->get();

        // Retrieve the payment information for the customer
        $payments = Payments::where('customer_id', $customer->id)->get();

        // Pass the customer, policy, and payments data to the view
        return view('user_home', compact('customer', 'policy', 'payments'));
    } else {
        // Pass only the customer data to the view
        return view('user_home', compact('customer'));
    }
}

public function showPaymentsMade()
{
    // Retrieve the payments from the database
    $payments = Payments::all();

    // Pass the payments to the view
    return view('admin.payments_made', compact('payments'));
}


}
