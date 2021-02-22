<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function FormLoginAdmin()
    {
        return view('admin.auth.login');
    }

    public function LoginAdmin(Request $request)
    {
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            $user = auth()->guard('admin')->user();
            return redirect('admin');
        }
       
        return redirect('loginadmin')->with('error', 'Username atau katasandi salah!');
    }
}
