<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminTagihanController extends Controller
{
    
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $tagihan = Tagihan::orderBy('nama_tagihan')->get();
            return view('admin.tagihan.index', compact('tagihan'));
        } else {
            return redirect('loginadmin');
        }
    }

    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.tagihan.add');
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_tagihan' => ['required', 'string'],
            'jumlah_tagihan' => ['required', 'numeric'],
            'batas' => ['required', 'date']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            Tagihan::create([
                'nama_tagihan' => $request['nama_tagihan'],
                'jumlah_tagihan' => $request['jumlah_tagihan'],
                'batas' => $request['batas']
            ]);

            return redirect('admintagihan')->with('tambah', 'Data telah ditambah!');
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
            $tagihan = Tagihan::find($id);
            return view('admin.tagihan.edit', compact('tagihan'));
        } else {
            return redirect('loginadmin');
        }
    }

    
    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            Tagihan::whereId($id)->update([
                'nama_tagihan' => $request['nama_tagihan'],
                'jumlah_tagihan' => $request['jumlah_tagihan'],
                'batas' => $request['batas']
            ]);

            return redirect('admintagihan')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }

   
    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            
            Tagihan::findOrFail($id)->delete();

            return redirect('admintagihan')->with('hapus', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }
}
