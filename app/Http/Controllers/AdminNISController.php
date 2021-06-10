<?php

namespace App\Http\Controllers;

use App\Models\NIS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminNISController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $nis = NIS::all();

            return view('admin.nis.index', compact('nis'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $nis = NIS::all();
            if ($nis == null) {
                return view('admin.nis.add');
            } else {
                return redirect('adminnis');
            }
        } else {
            return redirect('loginadmin');
        }
    }


    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $nis = NIS::all();
            if ($nis == null) {
                $request->validate([
                    'nis' => ['required']
                ]);

                NIS::create([
                    'nis' => $request['nis']
                ]);

                return redirect('adminnis')->with('tambah', 'Data telah ditambah!');
            } else {
                return redirect('adminnis');
            }
        } else {
            return redirect('loginadmin');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        if (Auth::guard('admin')->check()) {
            $nis = NIS::find($id);
            return view('admin.nis.edit', compact('nis'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $request->validate([
                'nis' => ['required']
            ]);

            NIS::whereId($id)->update([
                'nis' => $request['nis']
            ]);

            return redirect('adminnis')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            NIS::findorFail($id)->delete();
            return redirect('adminnis')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }
}
