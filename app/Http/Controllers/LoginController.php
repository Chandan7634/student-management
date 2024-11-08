<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){
        $val = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('parties.index');
        }else{
            return view('welcome')->with('flash_message','Attendence Added Successfully!');
        }
    }

    public function logout(){
        Auth::logout();
        return view('welcome');
    }
}
