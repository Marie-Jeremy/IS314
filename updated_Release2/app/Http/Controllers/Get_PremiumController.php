<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Get_premium;

class Get_PremiumController extends Controller
{
    public function premiumindex()
    {
        $get_premium = Get_Premium::all();
        return view('admin.customers.premiumindex', compact('get_premium'));
    }

    public function create()
    {
        return view('get_premium');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:18',
            'gender' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'marital_status' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'policy_type' => 'required|string|max:255',
            'policy_duration' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
        ]);

        $get_premium = new Get_premium;
        $get_premium->name = $request->input('name');
        $get_premium->age = $request->input('age');
        $get_premium->gender = $request->input('gender');
        $get_premium->birth_date = $request->input('birth_date');
        $get_premium->marital_status = $request->input('marital_status');
        $get_premium->phone = $request->input('phone');
        $get_premium->address = $request->input('address');
        $get_premium->email = $request->input('email');
        $get_premium->policy_type = $request->input('policy_type');
        $get_premium->policy_duration = $request->input('policy_duration');
        $get_premium->destination = $request->input('destination');
        $get_premium->save();

        return redirect('/')->with('success', 'Get Premium successful');
    }

}
