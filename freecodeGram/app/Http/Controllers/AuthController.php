<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //
    function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard'); // Redirect to a protected page
        } else {
            return back()->withErrors(['email' => 'Incorrect email or password'])->withInput($request->only('email'));
        }


        return redirect('dashboard');
    }

    function register(Request $request)
    {
        $validatedData['name'] = $request->input('name');
        $validatedData['email'] = $request->input('email');
        $validatedData['id_number'] = $request->input('id_number');
        $validatedData['password'] = bcrypt($request->input('password'));
        $validatedData['role'] = 'admin';

        // Create a new user with the request data
        $user = User::create($validatedData);

        // Redirect or return a response
        if ($user) {
            return redirect('dashboard');
        }
        return redirect('register');
    }
}
