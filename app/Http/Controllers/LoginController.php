<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    // protected function credentials(Request $request)
    // {
    //     return [
    //         'username' => $request->input('username'),
    //         'password' => $request->input('password'),
    //     ];
    // }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // $user = User::where('username', $request->input('username'))->where('password', $request->input('password'))->first();
        
        // $credentials = [
        //     'username' => $request->input('username'),
        //     'password' => $request->input('password'),
        // ];

        // dd($credentials);
        
        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('pengguna')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'username' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('username');

    } 

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')
            ->withSuccess('You have logged out successfully!');;
    } 
}
