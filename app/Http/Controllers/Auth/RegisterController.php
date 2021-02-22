<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

   
    public function __construct()
    {
        $this->middleware('guest');
        // $this->middleware('admin');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string'],
            'email' => ['required', 'string', 'unique:users'],
            // 'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function validatorAdmin(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string'],
            'username' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['email']),
        ]);
    }

    public function FormRegisterAdmin()
    {
        return view('admin.auth.register');
    }

    protected function RegisterAdmin(Request $request)
    {
        $this->validatorAdmin($request->all())->validate();
        $admin = Admin::create([
            'nama' => $request['nama'],
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('loginadmin');
    }
}
