<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $info = $request->validate([
            'username' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email','unique:users'],
            'password' => ['required', 'min:3', 'confirmed']
        ]);
        
        $user = User::create($info);

        Auth::login($user, $remember = false);

        return redirect()->route('posts.index');
    }
    public function login(Request $request)
    {
        $infos = $request->validate([
            'email' => ['required', 'max:255', 'email'],
            'password' => ['required']
        ]);


        if (Auth::attempt($infos, $request->remember)) {
        return redirect()->intended('dashbord');
        }else{
            return back()->withErrors([
                'failed' =>'The provider credentials do not match our records.'
            ]);
        }
    }
    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/posts');
    }
}
