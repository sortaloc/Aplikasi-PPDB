<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $users = User::orderBy('updated_at', 'DESC')->simplePaginate(10);
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
        //
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
                'email_verified_at' => $now
            ]);
            return redirect('adminusers')->with('verifikasi', 'NISN telah terverifikasi');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        //
    }

    public function cariData(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $cari = $request['cari'];
            $users = User::orderBy('updated_at', 'DESC')
                ->orwhere('name', 'like', "%" . $cari . "%")
                ->orwhere('email', 'like', "%" . $cari . "%")
                ->orwhere('tempat_lahir', 'like', "%" . $cari . "%")
                ->orwhere('tanggal_lahir', 'like', "%" . $cari . "%")
                ->orwhere('nama_ibu', 'like', "%" . $cari . "%")
                ->simplePaginate(10);

            return view('admin.users.index', compact('users'));
        } else {
            return redirect('loginadmin');
        }
    }
}