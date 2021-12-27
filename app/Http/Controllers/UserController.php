<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;


class UserController extends Controller
{

    public function register(Request $request){
        $userRegistration = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:5|max:20',
            'address' => 'required|min:5|max:95',
            'gender' => 'required|in:M,F'    
        ]);
        
        $userRegistration['role'] = 'Member';
        $userRegistration['password'] = Hash::make($userRegistration['password']);

        User::create($userRegistration);

        $request->session()->flash('success_register', 'Registration Successfull! Please Login');

        return redirect('/login');
    }

    public function login(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',  
        ]);

        $remember = $request->has('remember') ? true : false;

        $tokenexpired = 60;

        if(Auth::attempt($credentials, $remember)){
            $request->session()->regenerate();
            Cookie::queue('email', $credentials['email'], $tokenexpired);
            Cookie::queue('password', $credentials['password'], $tokenexpired);
         
            return redirect()->intended('/');
        }
            return back()->with('loginError', 'login Failed!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function update(Request $request){

        if(Auth::user()->role == 'Admin'){
            $credentials = $request->validate([
                'name' => 'required|max:15',
                'email' => 'required|email:dns',
                'password' => 'required',  
                'address',
                'gender'
            ]);
    
            $credentials['address'] = Auth::user()->address;
            $credentials['gender'] = Auth::user()->gender;
            $credentials['password'] = Hash::make($credentials['password']);
    
    
            User::where('id', Auth::user()->id)
                    ->update($credentials);
            
            return redirect('/')->with('profile/success_update', 'Profile has been updated!');

        }else{
            $credentials = $request->validate([
                'name' => 'required|max:15',
                'email' => 'required|email:dns',
                'password' => 'required|min:5|max:20',  
                'address' => 'required|min:5|max:20',
                'gender' => 'required'
            ]);

            $credentials['password'] = Hash::make($credentials['password']);
    
            User::where('id', Auth::user()->id)
                    ->update($credentials);
            
            return redirect('/')->with('profile/success_update', 'Profile has been updated!');
        }
        

    }
}
