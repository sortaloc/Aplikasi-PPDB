<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Guru;
use App\Models\Pendaftaran;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $users = User::get()->count();
            $pendaftaran = Pendaftaran::get()->count();
            $siswa = Siswa::get()->count();
            $guru = Guru::get()->count();
            return view('admin.admin', compact('users', 'pendaftaran', 'siswa', 'guru'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->check()) {
            $admin = Admin::find($id);
            return view('admin.auth.passwords.edit', compact('admin'));
        } else {
            return redirect('loginadmin');
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorEmail(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'email', 'unique:admins']
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            $email =  auth()->guard('admin')->user()->email;

            if ($email != $request['email']) {
                $this->validatorEmail($request->all())->validate();
            }

            Admin::whereId($id)->update([
                'nama' => $request['nama'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);

            return redirect('admin')->with('sunting', 'Data telah diubah');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        //
    }
}
