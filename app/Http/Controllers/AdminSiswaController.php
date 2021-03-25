<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminSiswaController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $siswa = Siswa::orderBy('kelas', 'ASC')->orderBy('nama', 'ASC')->get();
            return view('admin.siswa.index', compact('siswa'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $hitung_siswa = Siswa::orderBy('nis', 'DESC')->first();
            if ($hitung_siswa == null) {
                $nis = 0;
            } else {
                $nis = $hitung_siswa['nis'];
            }

            $kelas = Kelas::orderBy('nama_kelas')->get();
            return view('admin.siswa.add', compact('kelas', 'nis'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nisn' => ['required', 'numeric', 'unique:siswas'],
            'nis' => ['required', 'numeric', 'unique:siswas'],
            'nama' => ['required', 'string'],
            'kelas' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'alamat' => ['required']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();

            //validasi nisn
            $nisn = $request['nisn'];
            $len_nisn = strlen($nisn);
            if ($len_nisn > 11) {
                return back()->with('error_length_nisn', 'NISN terlalu panjang!');
            }

            //validasi nis
            $nis = $request['nis'];
            $len_nis = strlen($nis);
            if ($len_nis > 11) {
                return back()->with('error_length_nis', 'NIS terlalu panjang!');
            }


            Siswa::create([
                'nisn' => $request['nisn'],
                'nis' => $request['nis'],
                'nama' => $request['nama'],
                'kelas' => $request['kelas'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jk' => $request['jk'],
                'alamat' => $request['alamat']
            ]);

            return redirect('adminsiswa')->with('tambah', 'Data telah ditambah!');
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
            $hitung_siswa = Siswa::orderBy('nis', 'DESC')->first();
            if ($hitung_siswa == null) {
                $nis = 0;
            } else {
                $nis = $hitung_siswa['nis'];
            }

            $ambil_kelas = Kelas::orderBy('nama_kelas')->get();
            foreach ($ambil_kelas as $a) {
                $kelas[] = $a->nama_kelas;
            }

            $siswa = Siswa::find($id);
            return view('admin.siswa.edit', compact('kelas', 'nis', 'siswa'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'nisn' => ['required', 'numeric'],
            'nis' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
            'kelas' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'alamat' => ['required']
        ]);
    }

    protected function validatorNISN(array $data)
    {
        return Validator::make($data, [
            'nisn' => ['required', 'numeric', 'unique:siswas']
        ]);
    }

    protected function validatorNIS(array $data)
    {
        return Validator::make($data, [
            'nis' => ['required', 'numeric', 'unique:siswas']
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validatorEdit($request->all())->validate();
            //validasi nisn
            $nisn = $request['nisn'];
            $len_nisn = strlen($nisn);
            if ($len_nisn > 11) {
                return back()->with('error_length_nisn', 'NISN terlalu panjang!');
            }

            //validasi nis
            $nis = $request['nis'];
            $len_nis = strlen($nis);
            if ($len_nis > 11) {
                return back()->with('error_length_nis', 'NIS terlalu panjang!');
            }

            $ambil_data_siswa = Siswa::where('id', $id)->first();
            $ambil_nisn = $ambil_data_siswa['nisn'];
            $ambil_nis = $ambil_data_siswa['nis'];

            if ($nisn != $ambil_nisn) {
                $this->validatorNISN($request->all())->validate();
            }

            if ($nis != $ambil_nis) {
                $this->validatorNIS($request->all())->validate();
            }

            Siswa::whereId($id)->update([
                'nisn' => $request['nisn'],
                'nis' => $request['nis'],
                'nama' => $request['nama'],
                'kelas' => $request['kelas'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jk' => $request['jk'],
                'alamat' => $request['alamat']
            ]);

            return redirect('adminsiswa')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            Siswa::findOrFail($id)->delete();
            return redirect('adminsiswa')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }
}
