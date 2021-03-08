<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\Waktu;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use File;

class DaftarController extends Controller
{

    public function index()
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();
        $tanggal_buka = $ambil_waktu['buka'];
        $tanggal_tutup = $ambil_waktu['tutup'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d');
        if ($tanggal_sekarang < $tanggal_buka) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran masih di tutup!');
        } elseif ($tanggal_sekarang > $tanggal_tutup) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!'); 
        }



        $id = Auth::user()->id;
        $nama = Auth::user()->name;
        $nisn = Auth::user()->email;
        $pendaftaran = Pendaftaran::where('id_user', $id)->first();

        if ($pendaftaran == null) {
            return view('daftar.add', compact('nama', 'nisn'));
        } else {
            $tanggal = $pendaftaran['tanggal_lahir'];
            $hari = substr($tanggal, 8, 2);
            $bulan = substr($tanggal, 5, 2);
            $tahun = substr($tanggal, 0, 4);
            if ($bulan == '01') {
                $bulan = 'Januari';
            } elseif ($bulan == '02') {
                $bulan = 'Februari';
            } elseif ($bulan == '03') {
                $bulan = 'Maret';
            } elseif ($bulan == '04') {
                $bulan = 'April';
            } elseif ($bulan == '05') {
                $bulan = 'Mei';
            } elseif ($bulan == '06') {
                $bulan = 'Juni';
            } elseif ($bulan == '07') {
                $bulan = 'Juli';
            } elseif ($bulan == '08') {
                $bulan = 'Agustus';
            } elseif ($bulan == '09') {
                $bulan = 'September';
            } elseif ($bulan == '10') {
                $bulan = 'Oktober';
            } elseif ($bulan == '11') {
                $bulan = 'November';
            } elseif ($bulan == '12') {
                $bulan = 'Desember';
            }

            $tanggal_lahir = $hari . " " . $bulan . " " . $tahun;

            $tanggal_pendaftaran = $pendaftaran['tanggal_pendaftaran'];
            $hari_pendaftaran = substr($tanggal_pendaftaran, 8, 2);
            $bulan_pendaftaran = substr($tanggal_pendaftaran, 5, 2);
            $tahun_pendaftaran = substr($tanggal_pendaftaran, 0, 4);
            if ($bulan_pendaftaran == '01') {
                $bulan_pendaftaran = 'Januari';
            } elseif ($bulan_pendaftaran == '02') {
                $bulan_pendaftaran = 'Februari';
            } elseif ($bulan_pendaftaran == '03') {
                $bulan_pendaftaran = 'Maret';
            } elseif ($bulan_pendaftaran == '04') {
                $bulan_pendaftaran = 'April';
            } elseif ($bulan_pendaftaran == '05') {
                $bulan_pendaftaran = 'Mei';
            } elseif ($bulan_pendaftaran == '06') {
                $bulan_pendaftaran = 'Juni';
            } elseif ($bulan_pendaftaran == '07') {
                $bulan_pendaftaran = 'Juli';
            } elseif ($bulan_pendaftaran == '08') {
                $bulan_pendaftaran = 'Agustus';
            } elseif ($bulan_pendaftaran == '09') {
                $bulan_pendaftaran = 'September';
            } elseif ($bulan_pendaftaran == '10') {
                $bulan_pendaftaran = 'Oktober';
            } elseif ($bulan_pendaftaran == '11') {
                $bulan_pendaftaran = 'November';
            } elseif ($bulan_pendaftaran == '12') {
                $bulan_pendaftaran = 'Desember';
            }

            $tanggal_pendaftaran = $hari_pendaftaran . " " . $bulan_pendaftaran . " " . $tahun_pendaftaran;
            return view('daftar.index', compact('pendaftaran', 'tanggal_lahir', 'tanggal_pendaftaran'));
        }
    }


    public function create()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nisn' => ['required', 'numeric', 'unique:pendaftarans'],
            'nama' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'string'],
            'alamat' => ['required'],
            'nama_ayah' => ['required', 'string'],
            'nama_ibu' => ['required', 'string'],
            'pekerjaan_ayah' => ['required', 'string'],
            'pekerjaan_ibu' => ['required', 'string'],
            'tempat_tinggal' => ['required', 'string'],
            'asal_sekolah' => ['required', 'string'],
            'transportasi' => ['required', 'string'],
            'foto' => ['required', 'max:1024', 'file', 'image', 'mimes:jpeg,png,jpg']
        ]);
    }

    public function store(Request $request)
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();
        $tanggal_buka = $ambil_waktu['buka'];
        $tanggal_tutup = $ambil_waktu['tutup'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d');
        if ($tanggal_sekarang < $tanggal_buka) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran masih di tutup!');
        } elseif ($tanggal_sekarang > $tanggal_tutup) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!'); 
        }


        //ambil data user
        $id_user = Auth::user()->id;
        $nisn_user = Auth::user()->email;
        $nama_user = Auth::user()->name;

        //atur tahun pelajaran
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d");

        //ambil waktu buat nama foto
        $waktu = date('His');

        //isi kolom proses
        $status = 'Proses';

        //validasi nisn user
        $ambil_nisnuser = User::get('email');
        foreach ($ambil_nisnuser as $a) {
            $nisn_users[] = $a['email'];
        }

        $this->validator($request->all())->validate();

        //update nisn ke users
        if ($request['nisn'] != $nisn_user) {

            $hasil = '';
            if (in_array($request['nisn'], $nisn_users)) {
                $hasil = 'nisn ada yang sama';
            } else {
                $hasil =  'nisn tidak ada yang sama';
            }

            if ($hasil == 'nisn tidak ada yang sama') {
                User::whereId($id_user)->update([
                    'email' => $request['nisn'],
                    'password' => Hash::make($request['nisn']),
                ]);
            } else {
                return redirect('daftar')->with('nisnusersama', 'NISN Sudah Terdaftar!');
            }
        }

        if ($request['nama'] === $nama_user) {
            User::whereId($id_user)->update([
                'name' => $request['nama'],
            ]);
        }

        $imageName = $id_user . $waktu . '.' . $request['foto']->extension();
        $request['foto']->move(public_path('images'), $imageName);
        Pendaftaran::create([
            'id_user' => $id_user,
            'nisn' => $request['nisn'],
            'tanggal_pendaftaran' => $now,
            'nama' => $request['nama'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'jk' => $request['jk'],
            'agama' => $request['agama'],
            'alamat' => $request['alamat'],
            'nama_ayah' => $request['nama_ayah'],
            'nama_ibu' => $request['nama_ibu'],
            'pekerjaan_ayah' => $request['pekerjaan_ayah'],
            'pekerjaan_ibu' => $request['pekerjaan_ibu'],
            'tempat_tinggal' => $request['tempat_tinggal'],
            'asal_sekolah' => $request['asal_sekolah'],
            'transportasi' => $request['transportasi'],
            'foto' => $imageName,
            'status' => $status,
        ]);

        return redirect('daftar')->with('tambah', 'Data telah ditambahkan!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();
        $tanggal_buka = $ambil_waktu['buka'];
        $tanggal_tutup = $ambil_waktu['tutup'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d');
        if ($tanggal_sekarang < $tanggal_buka) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran masih di tutup!');
        } elseif ($tanggal_sekarang > $tanggal_tutup) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!'); 
        }

        $pendaftaran = Pendaftaran::find($id);
        return view('daftar.edit', compact('pendaftaran'));
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'nisn' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'string'],
            'nama_ayah' => ['required', 'string'],
            'nama_ibu' => ['required', 'string'],
            'alamat' => ['required'],
            'tempat_tinggal' => ['required', 'string'],
            'asal_sekolah' => ['required', 'string'],
            'transportasi' => ['required', 'string']
        ]);
    }

    public function update(Request $request, $id)
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();
        $tanggal_buka = $ambil_waktu['buka'];
        $tanggal_tutup = $ambil_waktu['tutup'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d');
        if ($tanggal_sekarang < $tanggal_buka) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran masih di tutup!');
        } elseif ($tanggal_sekarang > $tanggal_tutup) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!'); 
        }
        
        //ambil data user
        $id_user = Auth::user()->id;
        $nisn_user = Auth::user()->email;
        $nama_user = Auth::user()->name;

        //validasi nisn user
        $ambil_nisnuser = User::get('email');
        foreach ($ambil_nisnuser as $a) {
            $nisn_users[] = $a['email'];
        }



        //update nisn ke users
        if ($request['nisn'] != $nisn_user) {

            $hasil = '';
            if (in_array($request['nisn'], $nisn_users)) {
                $hasil = 'nisn ada yang sama';
            } else {
                $hasil =  'nisn tidak ada yang sama';
            }

            if ($hasil == 'nisn tidak ada yang sama') {
                User::whereId($id_user)->update([
                    'email' => $request['nisn'],
                    'password' => Hash::make($request['nisn']),
                ]);
            } else {
                return redirect('daftar')->with('nisnusersama', 'NISN Sudah Terdaftar!');
            }
        }

        if ($request['nama'] != $nama_user) {
            User::whereId($id_user)->update([
                'name' => $request['nama'],
            ]);
        }

        $this->validatorEdit($request->all())->validate();
        Pendaftaran::whereId($id)->update([
            'nisn' => $request['nisn'],
            'nama' => $request['nama'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tanggal_lahir' => $request['tanggal_lahir'],
            'jk' => $request['jk'],
            'agama' => $request['agama'],
            'alamat' => $request['alamat'],
            'nama_ayah' => $request['nama_ayah'],
            'nama_ibu' => $request['nama_ibu'],
            'pekerjaan_ayah' => $request['pekerjaan_ayah'],
            'pekerjaan_ibu' => $request['pekerjaan_ibu'],
            'tempat_tinggal' => $request['tempat_tinggal'],
            'asal_sekolah' => $request['asal_sekolah'],
            'transportasi' => $request['transportasi'],
        ]);

        return redirect('daftar')->with('sunting', 'Data telah diubah!');
    }

    protected function validatorFoto(array $data)
    {
        return Validator::make($data, [
            'foto' => ['required', 'max:1024', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    public function ubahFoto(Request $request, $id)
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();
        $tanggal_buka = $ambil_waktu['buka'];
        $tanggal_tutup = $ambil_waktu['tutup'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d');
        if ($tanggal_sekarang < $tanggal_buka) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran masih di tutup!');
        } elseif ($tanggal_sekarang > $tanggal_tutup) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!'); 
        }
        
        $this->validatorFoto($request->all())->validate();

        // hapus foto
        $ambil_data = Pendaftaran::find($id);
        $file = $ambil_data['foto'];

        File::delete('images/' . $file);

        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('His');

        $id_user = Auth::user()->id;
        $imageName = $id_user . $waktu . '.' . $request['foto']->extension();
        $request['foto']->move(public_path('images'), $imageName);

        Pendaftaran::whereId($id)->update([
            'foto' => $imageName,
        ]);
        return redirect('daftar')->with('editfoto', 'Data telah diubah!')->with('foto', $imageName);
    }


    public function destroy($id)
    {
        //
    }
}
