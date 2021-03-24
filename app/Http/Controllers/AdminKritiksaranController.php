<?php

namespace App\Http\Controllers;

use App\Models\Kritiksaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class AdminKritiksaranController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $ks = Kritiksaran::orderBY('created_at', 'DESC')->get();
            return view('admin.kritiksaran.index', compact('ks'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string'],
            'email' => ['required', 'email'],
            'pesan' => ['required']

        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        Kritiksaran::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'pesan' => $request['pesan']
        ]);

        return redirect('/')->with('sukses', 'Pesan Anda telah diterima!');
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
        //
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            Kritiksaran::truncate();
    
            return redirect('adminkritiksaran')->with('hapus', 'Semua data berhasil dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }
}
