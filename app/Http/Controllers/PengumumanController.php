<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengumumanController extends Controller
{
   
    public function index()
    {
        $id_user = Auth::user()->id;
        $nilai = Nilai::orderBy('tanggal_ujian')->where('id_user', $id_user)->simplePaginate(10);
        $ambil_pendaftaran = Pendaftaran::where('id_user', $id_user)->first();
        
        if ($ambil_pendaftaran == null) {
            return redirect('daftar')->with('statuskosong', 'Silahkan daftar terlebih dahulu!');
        } else {
            $status = $ambil_pendaftaran['status'];
            return view('pengumuman.index', compact('nilai', 'status'));
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
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
