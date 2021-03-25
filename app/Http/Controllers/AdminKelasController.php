<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminKelasController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $kelas = Kelas::orderBy('nama_kelas', 'ASC')->get();
            return view('admin.kelas.index', compact('kelas'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $guru = Guru::orderBy('nama', 'ASC')->get();
            $pesan = 0;
            return view('admin.kelas.add', compact('guru', 'pesan'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'angka' => ['required', 'numeric'],
            'huruf' => ['required', 'string'],
            'id_guru' => ['required', 'numeric', 'unique:kelas'],
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            $kelas = $request['angka'] . $request['huruf'];
            $id = $request['id_guru'];
            $ambil_guru = Guru::find($id);
            $wali_kelas = $ambil_guru['nama'];

            $hitung_kelas = Kelas::where('nama_kelas', $kelas)->count();
            if ($hitung_kelas > 0) {
                return redirect('adminkelas')->with('errorkelas', 'kelas sudah tersedia!');
            }
            Kelas::create([
                'nama_kelas' => $kelas,
                'id_guru' => $id,
                'wali_kelas' => $wali_kelas
            ]);
            return redirect('adminkelas')->with('tambah', 'Data telah ditambah!');
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
            $guru = Guru::orderBy('nama', 'ASC')->get();
            $kelas = Kelas::find($id);
            $nama_kelas = $kelas['nama_kelas'];
            $angka = substr($nama_kelas, 0, 1);
            $huruf = substr($nama_kelas, 1, 2);
            $pesan = 0;

            foreach ($guru as $g) {
                $array_guru[] = $g['id'];
                $array_wali[] = $g['nama'];
            }

            $array = array_combine($array_guru, $array_wali);

            return view('admin.kelas.edit', compact('kelas', 'angka', 'huruf', 'pesan', 'array'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'angka' => ['required', 'numeric'],
            'huruf' => ['required', 'string'],
            'id_guru' => ['required', 'numeric'],
        ]);
    }

    protected function validatorIdguru(array $data)
    {
        return Validator::make($data, [
            'id_guru' => ['required', 'numeric', 'unique:kelas'],
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validatorEdit($request->all())->validate();

            //request input
            $input_kelas = $request['angka'] . $request['huruf'];
            $input_id_guru = $request['id_guru'];

            // ambil data guru
            $ambil_guru = Guru::where('id', $input_id_guru)->first();
            $ambil_wali_kelas = $ambil_guru['nama'];

            //ambil satu data kelas berdasarkan id
            $ambil_kelas = Kelas::find($id);
            $nama_kelas = $ambil_kelas['nama_kelas'];
            $ambil_idguru = $ambil_kelas['id_guru'];
            
            //validasi kelas
            $ambil_datakelas = Kelas::get('nama_kelas');
            foreach ($ambil_datakelas as $a) {
                $seluruh_kelas[] = $a['nama_kelas'];
            }

            if ($input_kelas != $nama_kelas) {

                $hasil = '';
                if (in_array($input_kelas, $seluruh_kelas)) {
                    $hasil = 'kelas ada yang sama';
                } 

                if ($hasil == 'kelas ada yang sama') {
                    
                    return redirect('adminkelas')->with('errorkelas', 'kelas sudah tersedia!');
                }
            }

            
            //validasi id_guru
            if ($input_id_guru != $ambil_idguru) {
                $this->validatorIdguru($request->all())->validate();
            }

            

            Kelas::whereId($id)->update([
                'nama_kelas' => $input_kelas,
                'id_guru' => $input_id_guru,
                'wali_kelas' => $ambil_wali_kelas
            ]);
            return redirect('adminkelas')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            $kelas = Kelas::findOrFail($id);
            $kelas->delete();
            return redirect('adminkelas')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }
}
