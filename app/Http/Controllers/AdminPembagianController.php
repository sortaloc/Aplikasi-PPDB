<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use Illuminate\Support\Facades\Validator;

class AdminPembagianController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $pendaftaran = Pendaftaran::orderBy('nama', 'ASC')->where('status', 'Diterima')->get();
            $kelas = Kelas::orderBy('nama_kelas', 'ASC')->get();
            $hitung_siswa = Siswa::orderBy('nis', 'DESC')->first();
            if ($hitung_siswa == null) {
                $nis = 0;
            } else {
                $nis = $hitung_siswa['nis'];
            }

            return view('admin.pembagian.index', compact('pendaftaran', 'kelas', 'nis'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        //
    }

    protected function validatorNIS(array $data)
    {
        return Validator::make($data, [
            'nis' => ['required', 'numeric', 'unique:siswas']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validatorNIS($request->all())->validate();
            $id_user = $request['id_user'];
            $ambil_pendaftaran = Pendaftaran::where('id_user', $id_user)->first();
            $nisn = $ambil_pendaftaran['nisn'];
            $nama = $ambil_pendaftaran['nama'];
            $tempat_lahir = $ambil_pendaftaran['tempat_lahir'];
            $tanggal_lahir = $ambil_pendaftaran['tanggal_lahir'];
            $jk = $ambil_pendaftaran['jk'];
            $alamat = $ambil_pendaftaran['alamat'];

            $hitung_siswa = Siswa::get()->count();

            $hasil = 'nisn tidak ada yang sama';
            if ($hitung_siswa > 0) {
                $siswa = Siswa::get();
                foreach ($siswa as $s) {
                    $nisn_siswas[] = $s['nisn'];
                }
                
                if (in_array($nisn, $nisn_siswas)) {
                    $hasil = 'nisn ada yang sama';
                } else {
                    $hasil =  'nisn tidak ada yang sama';
                }
            }

            if ($hasil == 'nisn tidak ada yang sama') {
                Siswa::create([
                    'nisn' => $nisn,
                    'nis' => $request['nis'],
                    'nama' => $nama,
                    'kelas' => $request['kelas'],
                    'tempat_lahir' => $tempat_lahir,
                    'tanggal_lahir' => $tanggal_lahir,
                    'jk' => $jk,
                    'alamat' => $alamat
                ]);

                return redirect('adminsiswa')->with('tambah', 'Data telah ditambah!');
            } else {
                return redirect('adminpembagian')->with('errornisn', 'NISN Sudah Terdaftar!');
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
