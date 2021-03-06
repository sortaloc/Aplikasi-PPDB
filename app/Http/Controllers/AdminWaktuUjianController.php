<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Waktu;

class AdminWaktuUjianController extends Controller
{
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $waktu = Waktu::where('jenis', 'ujian')->first();
            return view('admin.waktu_ujian.index', compact('waktu'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $waktu = Waktu::where('jenis', 'ujian')->first();
            if ($waktu == null) {
                return view('admin.waktu_ujian.add');
            } else {
                return redirect('adminwaktuujian')->with('errortambahwaktu', 'Waktu ujian telah tersedia');
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
                return redirect('adminwaktuujian')->with('errorwaktu', 'Waktu ujian salah!');
            }
            Waktu::create([
                'jenis' => 'ujian',
                'buka' => $request['buka'],
                'tutup' => $request['tutup']
            ]);
            return redirect('adminwaktuujian')->with('tambah', 'Tanggal telah ditambah!');
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
            return view('admin.waktu_ujian.edit', compact('waktu'));
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
                return redirect('adminwaktuujian')->with('errorwaktu', 'Waktu pendaftaran salah!');
            }
            Waktu::whereId($id)->update([
                'buka' => $request['buka'],
                'tutup' => $request['tutup']
            ]);
            return redirect('adminwaktuujian')->with('sunting', 'Tanggal telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            Waktu::findOrFail($id)->delete();
            return redirect('adminwaktuujian')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }
}
