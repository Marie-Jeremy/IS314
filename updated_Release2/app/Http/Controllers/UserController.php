<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('register');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'email' => 'required|string|email|max:255|unique:users',
        'phone_number' => 'required|string|max:255',
        'password' => 'required|string|min:8',
        'gender' => 'required|string|max:255',
        'role_as' => 'required|string|max:255',
    ]);

    $role_as = $request->input('role_as') === 'admin' ? 1 : 0;

    $user = new User;
    $user->name = $request->input('name');
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone_number');
    $user->password = bcrypt($request->input('password'));
    $user->gender = $request->input('gender');
    $user->role_as =  $role_as;
    $user->save();

    return redirect('/')->with('success', 'Registration successful');
}
}
