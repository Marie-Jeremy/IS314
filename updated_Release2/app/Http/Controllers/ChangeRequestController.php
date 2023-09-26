<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChangeRequest;

class ChangeRequestController extends Controller
{
    public function submitForm(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required',
        'email' => 'required|email',
        'phone_number' => 'required',
        'product' => 'required',
        'message' => 'required',
    ]);

    // Create a new ChangeRequest instance and populate it with the form data
    $changeRequest = new ChangeRequest();
    $changeRequest->name = $request->input('name');
    $changeRequest->email = $request->input('email');
    $changeRequest->phone_number = $request->input('phone_number');
    $changeRequest->product = $request->input('product');
    $changeRequest->message = $request->input('message');

    // Save the change request to the database
    $changeRequest->save();

    return redirect()->back()->with('success', 'Change request submitted successfully.');
}
}
