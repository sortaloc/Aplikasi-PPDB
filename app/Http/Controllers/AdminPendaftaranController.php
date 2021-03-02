<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Dokumen;
use App\Models\Nilai;
use File;
use Illuminate\Support\Facades\Auth;

class AdminPendaftaranController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $pendaftaran = Pendaftaran::join('dokumens', 'pendaftarans.id_user', '=', 'dokumens.id_user')
                ->select('pendaftarans.*', 'dokumens.*')
                ->orderBy('tahun_pendaftaran', 'DESC')
                ->orderBy('nama', 'ASC')
                ->simplePaginate(10);

            return view('admin.pendaftaran.index', compact('pendaftaran'));
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
        $nilai = Nilai::where('id_user', $id)->get();
        return response()->json($nilai);
    }


    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            Pendaftaran::whereId($id)->update([
                'status' => 'Diterima'
            ]);

            return redirect('adminpendaftaran')->with('terima', 'Siswa telah diterima');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            $dokumen = Dokumen::where('id_user', $id)->first();
            $pkh = $dokumen['pkh'];
            $kip = $dokumen['kip'];
            $kps = $dokumen['kps'];

            if ($pkh != '-') {
                File::delete('files/' . $pkh);
                Dokumen::where('id_user', $id)->update([
                    'pkh' => '-'
                ]);
            }

            if ($kip != '-') {
                File::delete('files/' . $kip);
                Dokumen::where('id_user', $id)->update([
                    'kip' => '-'
                ]);
            }

            if ($kps != '-') {
                File::delete('files/' . $kps);
                Dokumen::where('id_user', $id)->update([
                    'kps' => '-'
                ]);
            }

            $akta = $dokumen['akta'];
            $skhun = $dokumen['skhun'];
            $ijazah = $dokumen['ijazah'];
            $kk = $dokumen['kk'];
            $ktp = $dokumen['ktp'];

            //hapus file
            File::delete('files/' . $akta);
            File::delete('files/' . $skhun);
            File::delete('files/' . $ijazah);
            File::delete('files/' . $kk);
            File::delete('files/' . $ktp);

            $pendaftaran = Pendaftaran::where('id_user', $id)->first();
            $foto = $pendaftaran['foto'];
            File::delete('images/' . $foto);
            $dokumen_hapus = Dokumen::where('id_user', $id)->first();
            $dokumen_hapus->delete();
            Pendaftaran::where('id_user', $id)->delete();
            Nilai::where('id_user', $id)->delete();

            return redirect('adminpendaftaran')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }

    public function cariData(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $cari = $request['cari'];
            $pendaftaran = Pendaftaran::join('dokumens', 'pendaftarans.id_user', '=', 'dokumens.id_user')
                ->select('pendaftarans.*', 'dokumens.*')
                ->orderBy('tahun_pendaftaran', 'DESC')
                ->orderBy('nama', 'ASC')
                ->orwhere('nisn', 'like', "%" . $cari . "%")
                ->orwhere('tahun_pendaftaran', 'like', "%" . $cari . "%")
                ->orwhere('nama', 'like', "%" . $cari . "%")
                ->orwhere('tempat_lahir', 'like', "%" . $cari . "%")
                ->orwhere('tanggal_lahir', 'like', "%" . $cari . "%")
                ->orwhere('jk', 'like', "%" . $cari . "%")
                ->orwhere('agama', 'like', "%" . $cari . "%")
                ->orwhere('alamat', 'like', "%" . $cari . "%")
                ->orwhere('nama_ayah', 'like', "%" . $cari . "%")
                ->orwhere('nama_ibu', 'like', "%" . $cari . "%")
                ->orwhere('pekerjaan_ayah', 'like', "%" . $cari . "%")
                ->orwhere('pekerjaan_ibu', 'like', "%" . $cari . "%")
                ->orwhere('tempat_tinggal', 'like', "%" . $cari . "%")
                ->orwhere('asal_sekolah', 'like', "%" . $cari . "%")
                ->orwhere('transportasi', 'like', "%" . $cari . "%")
                ->simplePaginate(10);

            return view('admin.pendaftaran.index', compact('pendaftaran'));
        } else {
            return redirect('loginadmin');
        }
    }
}
