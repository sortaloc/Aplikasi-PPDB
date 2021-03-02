<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.admin');
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

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();

            Admin::whereId($id)->update([
                'nama' => $request['nama'],
                'username' => $request['username'],
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
