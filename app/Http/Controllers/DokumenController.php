<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;
use File;
use App\Models\Waktu;

use Illuminate\Support\Facades\Validator;


class DokumenController extends Controller
{

    public function index()
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();

        if ($ambil_waktu == null) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran belum dibuka');
        }

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
        $nisn = Auth::user()->email;
        $dokumen = Dokumen::where('id_user', $id)->first();

        if ($dokumen == null) {
            return view('dokumen.add');
        } else {
            return view('dokumen.index', compact('dokumen'));
        }
    }


    public function create()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'akta' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'skhun' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'ijazah' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'kk' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'ktp' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    protected function validatorPKH(array $data)
    {
        return Validator::make($data, [
            'pkh' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    protected function validatorKIP(array $data)
    {
        return Validator::make($data, [
            'kip' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    protected function validatorKPS(array $data)
    {
        return Validator::make($data, [
            'kps' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }


    public function store(Request $request)
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();


        if ($ambil_waktu == null) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran belum dibuka');
        }


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
        $cek = Dokumen::where('id_user', $id)->first();

        $waktu = date('His');

        if ($cek == null) {

            //Validasi dan penamaan semua form
            $this->validator($request->all())->validate();

            //pkh
            $ambil_pkh = $request['pkh'];
            if ($ambil_pkh != null) {
                $this->validatorPKH($request->all())->validate();
                $pkh = 'pkh' . $id . $waktu . '.' . $request['pkh']->extension();
                $request['pkh']->move(public_path('files'), $pkh);
            } else {
                $pkh = '-';
            }

            //kip
            $ambil_kip = $request['kip'];
            if ($ambil_kip != null) {
                $this->validatorKIP($request->all())->validate();
                $kip = 'kip' . $id . $waktu . '.' . $request['kip']->extension();
                $request['kip']->move(public_path('files'), $kip);
            } else {
                $kip = '-';
            }

            //kps
            $ambil_kps = $request['kps'];
            if ($ambil_kps != null) {
                $this->validatorKPS($request->all())->validate();
                $kps = 'kps' . $id . $waktu . '.' . $request['kps']->extension();
                $request['kps']->move(public_path('files'), $kps);
            } else {
                $kps = '-';
            }

            //akta
            $akta = 'akta' . $id . $waktu . '.' . $request['akta']->extension();

            //skhun
            $skhun = 'skhun' . $id . $waktu . '.' . $request['skhun']->extension();

            //ijazah
            $ijazah = 'ijazah' . $id . $waktu . '.' . $request['ijazah']->extension();

            //kk
            $kk = 'kk' . $id . $waktu . '.' . $request['kk']->extension();

            //ktp
            $ktp = 'ktp' . $id . $waktu . '.' . $request['ktp']->extension();

            //kirim file
            $request['akta']->move(public_path('files'), $akta);
            $request['skhun']->move(public_path('files'), $skhun);
            $request['ijazah']->move(public_path('files'), $ijazah);
            $request['kk']->move(public_path('files'), $kk);
            $request['ktp']->move(public_path('files'), $ktp);

            //kirim ke database
            Dokumen::create([
                'id_user' => $id,
                'akta' => $akta,
                'skhun' => $skhun,
                'ijazah' => $ijazah,
                'kk' => $kk,
                'ktp' => $ktp,
                'pkh' => $pkh,
                'kip' => $kip,
                'kps' => $kps,
            ]);
            return redirect('dokumen')->with('tambah', 'Berkas telah ditambahkan!');
        } else {
            return redirect('dokumen')->with('errorberkas', 'Berkas telah tersedia!');
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();


        if ($ambil_waktu == null) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!');
        }

        $tanggal_buka = $ambil_waktu['buka'];
        $tanggal_tutup = $ambil_waktu['tutup'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d');
        if ($tanggal_sekarang < $tanggal_buka) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran masih di tutup!');
        } elseif ($tanggal_sekarang > $tanggal_tutup) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!');
        }
        $dokumen = Dokumen::find($id);
        return view('dokumen.edit', compact('dokumen'));
    }


    public function update(Request $request, $id)
    {
        //Validasi pendaftaran
        $ambil_waktu = Waktu::where('jenis', 'pendaftaran')->first();


        if ($ambil_waktu == null) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!');
        }

        $tanggal_buka = $ambil_waktu['buka'];
        $tanggal_tutup = $ambil_waktu['tutup'];
        date_default_timezone_set('Asia/Jakarta');
        $tanggal_sekarang = date('Y-m-d');
        if ($tanggal_sekarang < $tanggal_buka) {
            return redirect('home')->with('pendaftaran_belum_di_mulai', 'Pendaftaran masih di tutup!');
        } elseif ($tanggal_sekarang > $tanggal_tutup) {
            return redirect('home')->with('pendaftaran_sudah_di_tutup', 'Pendaftaran sudah di tutup!');
        }


        $waktu = date('His');
        $ambil_dokumen = Dokumen::find($id);

        //pi
        if ($request['pkh'] != null) {
            $this->validatorPKH($request->all())->validate();
            File::delete('files/' . $ambil_dokumen['pkh']);
            $pkh = 'pkh' . $id . $waktu . '.' . $request['pkh']->extension();
            $request['pkh']->move(public_path('files'), $pkh);
            Dokumen::whereId($id)->update([
                'pkh' => $pkh
            ]);
        }

        //kip
        if ($request['kip'] != null) {
            $this->validatorKIP($request->all())->validate();
            File::delete('files/' . $ambil_dokumen['kip']);
            $kip = 'kip' . $id . $waktu . '.' . $request['kip']->extension();
            $request['kip']->move(public_path('files'), $kip);
            Dokumen::whereId($id)->update([
                'kip' => $kip
            ]);
        }

        //kps
        if ($request['kps'] != null) {
            $this->validatorKPS($request->all())->validate();
            File::delete('files/' . $ambil_dokumen['kps']);
            $kps = 'kps' . $id . $waktu . '.' . $request['kps']->extension();
            $request['kps']->move(public_path('files'), $kps);
            Dokumen::whereId($id)->update([
                'kps' => $kps
            ]);
        }

        //akta
        if ($request['akta'] != null) {
            $request->validate([
                'akta' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            ]);
            File::delete('files/' . $ambil_dokumen['akta']);
            $akta = 'akta' . $id . $waktu . '.' . $request['akta']->extension();
            $request['akta']->move(public_path('files'), $akta);
            Dokumen::whereId($id)->update([
                'akta' => $akta
            ]);
        }

        //skhun
        if ($request['skhun'] != null) {
            $request->validate([
                'skhun' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            ]);
            File::delete('files/' . $ambil_dokumen['skhun']);
            $skhun = 'skhun' . $id . $waktu . '.' . $request['skhun']->extension();
            $request['skhun']->move(public_path('files'), $skhun);
            Dokumen::whereId($id)->update([
                'skhun' => $skhun
            ]);
        }

        //ijazah
        if ($request['ijazah'] != null) {
            $request->validate([
                'ijazah' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            ]);
            File::delete('files/' . $ambil_dokumen['ijazah']);
            $ijazah = 'ijazah' . $id . $waktu . '.' . $request['ijazah']->extension();
            $request['ijazah']->move(public_path('files'), $ijazah);
            Dokumen::whereId($id)->update([
                'ijazah' => $ijazah
            ]);
        }

        //kk
        if ($request['kk'] != null) {
            $request->validate([
                'kk' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            ]);
            File::delete('files/' . $ambil_dokumen['kk']);
            $kk = 'kk' . $id . $waktu . '.' . $request['kk']->extension();
            $request['kk']->move(public_path('files'), $kk);
            Dokumen::whereId($id)->update([
                'kk' => $kk
            ]);
        }

        //ktp
        if ($request['ktp'] != null) {
            $request->validate([
                'ktp' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            ]);
            File::delete('files/' . $ambil_dokumen['ktp']);
            $ktp = 'ktp' . $id . $waktu . '.' . $request['ktp']->extension();
            $request['ktp']->move(public_path('files'), $ktp);
            Dokumen::whereId($id)->update([
                'ktp' => $ktp
            ]);
        }

        return redirect('dokumen')->with('sunting', 'Berkas telah diubah!');
    }


    public function destroy(Request $request, $id)
    {
        $dokumen = Dokumen::findOrFail($id);
        $pkh = $dokumen['pkh'];
        $kip = $dokumen['kip'];
        $kps = $dokumen['kps'];


        if ($pkh == $request['pkh']) {
            File::delete('files/' . $pkh);
            Dokumen::whereId($id)->update([
                'pkh' => '-'
            ]);
        }

        if ($kip == $request['kip']) {
            File::delete('files/' . $kip);
            Dokumen::whereId($id)->update([
                'kip' => '-'
            ]);
        }

        if ($kps == $request['kps']) {
            File::delete('files/' . $kps);
            Dokumen::whereId($id)->update([
                'kps' => '-'
            ]);
        }

        return redirect('dokumen')->with('hapus', 'Data berkas telah dihapus!');
    }
}
