<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $id = Auth::user()->id;
        $users = User::find($id);
        $nisn_verified = $users['email_verified_at'];
        
        if ($nisn_verified != null) {
            return view('home');
        } else {
            Auth::logout();
            return redirect('/')->with('keluar', 'NISN akan diverifikasi oleh Admin!');
        }
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('auth.passwords.edit', compact('user'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        
        User::whereId($id)->update([
            'password' => Hash::make($request['password']),
        ]);

        return redirect('home')->with('ubahpassword', 'password berhasil diubah');
    }
}
