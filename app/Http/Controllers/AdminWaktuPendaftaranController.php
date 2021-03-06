<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waktu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminWaktuPendaftaranController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $waktu = Waktu::where('jenis', 'pendaftaran')->first();
            return view('admin.waktu_pendaftaran.index', compact('waktu'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $waktu = Waktu::where('jenis', 'pendaftaran')->first();
            if ($waktu == null) {
                return view('admin.waktu_pendaftaran.add');
            } else {
                return redirect('adminwaktupendaftaran')->with('errortambahwaktu', 'Waktu pendaftaran telah tersedia');
            }
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [

            'buka' => ['required', 'date'],
            'tutup' => ['required', 'date']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            $buka = $request['buka'];
            $tutup = $request['tutup'];
            if ($tutup < $buka) {
                return redirect('adminwaktupendaftaran')->with('errorwaktu', 'Waktu ujian salah!');
            }
            Waktu::create([
                'jenis' => 'pendaftaran',
                'buka' => $request['buka'],
                'tutup' => $request['tutup']
            ]);
            return redirect('adminwaktupendaftaran')->with('tambah', 'Tanggal telah ditambah!');
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
            $waktu = Waktu::find($id);
            return view('admin.waktu_pendaftaran.edit', compact('waktu'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            $buka = $request['buka'];
            $tutup = $request['tutup'];
            if ($tutup < $buka) {
                return redirect('adminwaktupendaftaran')->with('errorwaktu', 'Waktu pendaftaran salah!');
            }
            Waktu::whereId($id)->update([
                'buka' => $request['buka'],
                'tutup' => $request['tutup']
            ]);
            return redirect('adminwaktupendaftaran')->with('sunting', 'Tanggal telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            Waktu::findOrFail($id)->delete();
            return redirect('adminwaktupendaftaran')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }
}
