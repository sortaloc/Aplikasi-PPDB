<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Dokumen;
use File;

class AdminPendaftaranController extends Controller
{

    public function index()
    {
        // $pendaftaran = Pendaftaran::orderBy('tahun_pendaftaran', 'DESC')->orderBy('nama', 'ASC')->paginate(10);
        $pendaftaran = Pendaftaran::join('dokumens', 'pendaftarans.id_user', '=', 'dokumens.id_user')
            ->select('pendaftarans.*', 'dokumens.*')
            ->orderBy('tahun_pendaftaran', 'DESC')
            ->orderBy('nama', 'ASC')
            ->paginate(10);

        return view('admin.pendaftaran.index', compact('pendaftaran'));
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
        Pendaftaran::whereId($id)->update([
            'status' => 'Diterima'
        ]);

        return redirect('adminpendaftaran')->with('terima', 'Siswa telah diterima');
    }


    public function destroy($id)
    {
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

        Dokumen::where('id_user', $id)->delete();
        Pendaftaran::where('id_user', $id)->delete();

        return redirect('adminpendaftaran')->with('hapus', 'Data telah dihapus!');
    }

    public function cariData(Request $request)
    {
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

            
            ->paginate(10);

        return view('admin.pendaftaran.index', compact('pendaftaran'));
    }
}
