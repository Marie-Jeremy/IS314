<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        'phone_number' => 'nullable|string|max:255',
        'password' => 'required|string|min:8', 
        
    ]);

    $role_as = $request->input('role_as') === 'admin' ? 1 : 0;

    $user = new User;
    $user->name = $request->input('name');
    $user->username = $request->input('username');
    $user->email = $request->input('email');
    $user->phone_number = $request->input('phone_number');
    $user->password = bcrypt($request->input('password'));
    $user->gender = $request->input('gender');
    $user->role_as =  '0';

    $user->recipe_type = is_array($request->input('recipe_type')) ? implode(',', $request->input('recipe_type')) : $request->input('recipe_type');
    $user->cuisine = is_array($request->input('cuisine')) ? implode(',', $request->input('cuisine')) : $request->input('cuisine');
    
    $user->save();

    Session::flash('success', 'Registration successful. You can now log in.');
    return redirect('/login');
}
}
