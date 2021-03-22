<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Guru;
use Illuminate\Support\Facades\Validator;
use File;

class AdminGuruController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $guru = Guru::orderBy('nama', 'ASC')->simplePaginate(10);
            return view('admin.guru.index', compact('guru'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.guru.add');
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'numeric', 'unique:gurus'],
            'nuptk' => ['required', 'numeric', 'unique:gurus'],
            'tahun_masuk' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
            'pendidikan' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'string'],
            'alamat' => ['required'],
            'no_hp' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'unique:gurus'],
            'foto' => ['required', 'max:1024', 'file', 'image', 'mimes:jpeg,png,jpg']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            //validasi tahun
            $tahun_masuk = $request['tahun_masuk'];
            if ($tahun_masuk > 20) {
                return back()->with('error_length_tahun_masuk', 'Tahun terlalu panjang');
            }
            
            //validasi nomor hp
            $no_hp = $request['no_hp'];
            $hitung_no_hp = strlen($no_hp);
            if ($hitung_no_hp >= 14) {
                return back()->with('error_length_no_hp', 'Nomor HP terlalu panjang');
            }
            $val_no_hp = substr($no_hp, 0, 3);
            if ($val_no_hp != 628) {
                return back()->with('errorno_hp', 'Format No Hp salah!');
            }

            //atur waktu
            date_default_timezone_set('Asia/Jakarta');

            //ambil waktu buat nama foto
            $waktu = date('His');

            //ambil NIP
            $nip = $request['nip'];

            $imageName = $nip . $waktu . '.' . $request['foto']->extension();
            $request['foto']->move(public_path('imagesguru'), $imageName);
            Guru::create([
                'nip' => $nip,
                'nuptk' => $request['nuptk'],
                'tahun_masuk' => $request['tahun_masuk'],
                'nama' => $request['nama'],
                'pendidikan' => $request['pendidikan'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jk' => $request['jk'],
                'agama' => $request['agama'],
                'alamat' => $request['alamat'],
                'no_hp' => $request['no_hp'],
                'email' => $request['email'],
                'foto' => $imageName
            ]);

            return redirect('adminguru')->with('tambah', 'Data telah ditambahkan!');
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
            $guru = Guru::find($id);
            return view('admin.guru.edit', compact('guru'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'numeric'],
            'nuptk' => ['required', 'numeric'],
            'tahun_masuk' => ['required', 'numeric'],
            'nama' => ['required', 'string'],
            'pendidikan' => ['required', 'string'],
            'tempat_lahir' => ['required', 'string'],
            'tanggal_lahir' => ['required', 'date'],
            'jk' => ['required', 'in:Laki-laki,Perempuan'],
            'agama' => ['required', 'string'],
            'alamat' => ['required'],
            'no_hp' => ['required', 'string'],
            'email' => ['required', 'string', 'email']
        ]);
    }

    protected function validatorNIP(array $data)
    {
        return Validator::make($data, [
            'nip' => ['required', 'numeric', 'unique:gurus']
        ]);
    }

    protected function validatorNUPTK(array $data)
    {
        return Validator::make($data, [
            'nuptk' => ['required', 'numeric', 'unique:gurus']
        ]);
    }

    protected function validatorEmail(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'unique:gurus']
        ]);
    }

    protected function validatorFoto(array $data)
    {
        return Validator::make($data, [
            'foto' => ['required', 'max:1024', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validatorEdit($request->all())->validate();
            //validasi tahun
            $tahun_masuk = $request['tahun_masuk'];
            if ($tahun_masuk > 20) {
                return back()->with('error_length_tahun_masuk', 'Tahun terlalu panjang');
            }
            //validasi nomor hp
            $no_hp = $request['no_hp'];
            $hitung_no_hp = strlen($no_hp);
            if ($hitung_no_hp >= 14) {
                return back()->with('error_length_no_hp', 'Nomor HP terlalu panjang');
            }
            $val_no_hp = substr($no_hp, 0, 3);
            if ($val_no_hp != 628) {
                return back()->with('errorno_hp', 'Format No Hp salah!');
            }
            
            $ambil_guru = Guru::find($id);
            $ambil_nip = $ambil_guru['nip'];
            $ambil_nuptk = $ambil_guru['nuptk'];
            $ambil_email = $ambil_guru['email'];

            if ($ambil_nip != $request['nip']) {
                $this->validatorNIP($request->all())->validate();
            }

            if ($ambil_nuptk != $request['nuptk']) {
                $this->validatorNUPTK($request->all())->validate();
            }

            if ($ambil_email != $request['email']) {
                $this->validatorEmail($request->all())->validate();
            }

            if ($request['foto'] != null) {
                $this->validatorFoto($request->all())->validate();
                // hapus foto
                $foto = $ambil_guru['foto'];
                File::delete('imagesguru/' . $foto);

                date_default_timezone_set('Asia/Jakarta');
                $waktu = date('His');

                $imageName = $request['nip'] . $waktu . '.' . $request['foto']->extension();
                $request['foto']->move(public_path('imagesguru'), $imageName);
                Guru::whereId($id)->update([
                    'foto' => $imageName
                ]);
            }

            Guru::whereId($id)->update([
                'nip' => $request['nip'],
                'nuptk' => $request['nuptk'],
                'tahun_masuk' => $request['tahun_masuk'],
                'nama' => $request['nama'],
                'pendidikan' => $request['pendidikan'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tanggal_lahir' => $request['tanggal_lahir'],
                'jk' => $request['jk'],
                'agama' => $request['agama'],
                'alamat' => $request['alamat'],
                'no_hp' => $request['no_hp'],
                'email' => $request['email'],
            ]);

            return redirect('adminguru')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            $guru = Guru::findOrFail($id);
            $ambil_guru = Guru::find($id);
            $foto = $ambil_guru['foto'];
            File::delete('imagesguru/' . $foto);
            $guru->delete();
            return redirect('adminguru')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }

    public function cariData(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $cari = $request['cari'];
            $guru = Guru::orderBy('nama', 'ASC')
                ->orwhere('nip', 'like', "%" . $cari . "%")
                ->orwhere('nuptk', 'like', "%" . $cari . "%")
                ->orwhere('tahun_masuk', 'like', "%" . $cari . "%")
                ->orwhere('nama', 'like', "%" . $cari . "%")
                ->orwhere('pendidikan', 'like', "%" . $cari . "%")
                ->orwhere('tempat_lahir', 'like', "%" . $cari . "%")
                ->orwhere('tanggal_lahir', 'like', "%" . $cari . "%")
                ->orwhere('jk', 'like', "%" . $cari . "%")
                ->orwhere('agama', 'like', "%" . $cari . "%")
                ->orwhere('alamat', 'like', "%" . $cari . "%")
                ->orwhere('no_hp', 'like', "%" . $cari . "%")
                ->orwhere('email', 'like', "%" . $cari . "%")
                ->simplePaginate(10);

            return view('admin.guru.index', compact('guru'));
        } else {
            return redirect('loginadmin');
        }
    }
}
