<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\Dokumen;
use App\Models\Nilai;
use App\Models\NIS;
use App\Models\Siswa;
use File;
use Illuminate\Support\Facades\Auth;

class AdminPendaftaranController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $pendaftaran = Pendaftaran::join('dokumens', 'pendaftarans.id_user', '=', 'dokumens.id_user')
                ->select('pendaftarans.*', 'dokumens.*')
                ->orderBy('tanggal_pendaftaran', 'DESC')
                ->orderBy('nama', 'ASC')
                ->get();

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

            if ($request['status'] == 'Diterima') {
                //data pendaftaran
                $pendaftaran = Pendaftaran::where('id_user', $id)->first();

                //ambil data siswa
                $siswa = Siswa::orderBy('id', 'DESC')->first();
                if ($siswa == null) {
                    //ambil nis
                    $nis = NIS::first();
                    if ($nis == null) {
                        return redirect('adminpendaftaran')->with('nis_kosong', 'Acuan NIS masih kosong!');
                    }
                    $nis_siswa = intval($nis['nis']) + 1;
                } else {
                    $nis_siswa = $siswa['nis'] + 1;
                }

                //create Data siswa
                Siswa::create([
                    'nisn' => $pendaftaran['nisn'],
                    'nis' => $nis_siswa,
                    'nama' => $pendaftaran['nama'],
                    'tempat_lahir' => $pendaftaran['tempat_lahir'],
                    'tanggal_lahir' => $pendaftaran['tanggal_lahir'],
                    'jk' => $pendaftaran['jk'],
                    'alamat' => $pendaftaran['alamat']
                ]);
                Pendaftaran::where('id_user', $id)->update([
                    'status' => $request['status']
                ]);
                return redirect('adminpendaftaran')->with('terima', 'Siswa telah diterima');
            } else {
                Pendaftaran::where('id_user', $id)->update([
                    'status' => $request['status']
                ]);
                return redirect('adminpendaftaran')->with('tolak', 'Siswa telah ditolak');
            }
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
}
