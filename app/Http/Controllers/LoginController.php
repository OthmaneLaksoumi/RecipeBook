<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class LoginController extends Controller
{
    public function show()
    {
        return view('login');
    }


    public function authenticate(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $credentials = ['email' => $email, 'password' => $password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return to_route('index');
        } else {
            return back()->withErrors(['not_match' => 'Email or Password false'])->withInput();
        }
    }

    public function profile()
    {
        $profile = auth()->user();
        return view('profile', ['profile' => $profile]);
    }

    public function update(User $user, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
        ]);



        $validated = $validator->validated();


        if(in_array($user->name, $validated) && in_array($user->email, $validated)) {
            return to_route('profile');
        }

        $user->fill($validated)->save();
        
        return to_route('profile')->with('modified', 'Your account updated successfuly');
        

    }

    public function logout()
    {
        session()->flush();

        Auth::logout();

        return to_route('index');
    }
}
