<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Userbaru;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'nama_ibu' => ['required', 'string']
        ]);
    }
    

    protected function validatorAdmin(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string'],
            'username' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
    }

    protected function create(array $data)
    {
        $admin = Admin::orderBy('updated_at', 'DESC')->first();
        $email = $admin['email'];
        $nama = $data['name'];
        $nisn = $data['email'];
        Mail::to($email)->send(new Userbaru($nama, $nisn));

        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tempat_lahir' => $data['tempat_lahir'],
            'tanggal_lahir' => $data['tanggal_lahir'],
            'nama_ibu' => $data['nama_ibu']
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
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);
        return redirect('loginadmin');
    }
}
