<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\User;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $users = User::orderBy('updated_at', 'DESC')->get();
            
            return view('admin.users.index', compact('users'));
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
        if (Auth::guard('admin')->check()) {
            $users = User::orderBy('updated_at', 'DESC')->where('email', $id)->get();
            Notifikasi::where('nisn', $id)->update([
                'status' => 1
            ]);
            return view('admin.users.index', compact('users'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            date_default_timezone_set('Asia/Jakarta');
            $now = date(now());
            User::whereId($id)->update([
                'validasi' => 1,
                'email_verified_at' => $now
            ]);
            return redirect('adminusers')->with('verifikasi', 'NISN telah terverifikasi');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            $now = date(now());
            User::whereId($id)->update([
                'validasi' => 0,
                'email_verified_at' => $now
            ]);
            return redirect('adminusers')->with('verifikasi', 'NISN telah terverifikasi');
        } else {
            return redirect('loginadmin');
        }
    }
}
