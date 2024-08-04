<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    

    public function indexlog(Request $request)
    {
        return view('login');
    }

    public function indexreg(Request $request)
    {
        return view('register');
    }


    public function register(Request $request)
    {

        
        $validate = $request->validate([
            'name' => 'required|string|unique:users,name',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required|min:6',
        ]);

        if(Auth::attempt($validate))
        {
            return redirect('/login')->with('error', 'Invalid email or password.');
        }else
        {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'admin',
            ]);

            return redirect('login');
        }
        // return response([
        //     'user' => $user,
        //     'token' => $user->createToken('secret')->plainTextToken
        // ]);
        
        
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required',],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $role = Auth::user()->role;
            switch ($role){
                case 'owner':
                    return redirect('profile');
                case 'admin':
                    return redirect('/dashboard');
                case 'staff':
                    
            }
        }
        return redirect('/login')->with('error', 'Invalid email or password.');

    }

    // public function logout ()
    // {
    //     auth()->user()->tokens()->delete();
    //     return response([
    //         'message' => 'Logout Success'
    //     ],200);
    // }

    // public function user()
    // {
    //    return response([
    //     'user' => auth()->user()
    //    ], 200); 
    // }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
