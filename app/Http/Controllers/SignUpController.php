<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function create()
    {
        return view('sign_up');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $validated['password'] = Hash::make($request->password);

        User::create($validated);
        return to_route('login')->with('success', 'Your account has been created');
    }
}
