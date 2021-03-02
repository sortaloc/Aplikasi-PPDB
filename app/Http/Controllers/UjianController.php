<?php

namespace App\Http\Controllers;

use App\Models\MapelUjian;
use App\Models\Nilai;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UjianController extends Controller
{

    public function index()
    {
        $mapelujian = MapelUjian::orderBy('nama_mapel', 'ASC')->get();

        return view('ujian.index', compact('mapelujian'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $id_user = Auth::user()->id;
        $id_mapel = $request['id_mapel'];
        $ambil_mapel_ujian = MapelUjian::where('id_mapel', $id_mapel)->first();
        $nama_mapel = $ambil_mapel_ujian['nama_mapel'];
        $kkm = $ambil_mapel_ujian['kkm'];
        $soal = Soal::where('id_mapel', $id_mapel)->get();
        $jumlahsoal = $soal->count();

        if ($soal->count() > 0) {
            $nomor = 0;

            foreach ($soal as $s) {
                $nomor++;
                $ambil_jawaban = $request['jawaban' . $nomor];

                $jawaban = substr($ambil_jawaban, 0, 1);
                $id_soal = substr($ambil_jawaban, 1);

                $nilai = 0;

                if ($s->id == $id_soal && $s->jawaban == $jawaban) {
                    $nilai++;
                }

                $array_nilai[] = $nilai;
            }

            $hitung_nilai = array_sum($array_nilai);
            $hitung_nilai_akhir = $hitung_nilai / $jumlahsoal * 100;
            $nilai_akhir = substr($hitung_nilai_akhir, 0, 5);
            
        }
        Nilai::create([
            'id_user' => $id_user,
            'id_mapel' => $id_mapel,
            'nama_mapel' => $nama_mapel,
            'kkm' => $kkm,
            'nilai' => $nilai_akhir
        ]);

        return redirect('ujian')->with('selesai', 'Jawaban Anda telah dikirim!');
    }


    public function show($id)
    {
        $id_user = Auth::user()->id;
        $ambil_nilai = Nilai::where('id_user', $id_user)->where('id_mapel', $id)->count();
        if ($ambil_nilai > 0) {
            return redirect('ujian')->with('errorshow', 'Anda sudah mengikuti ujian ini!');
        }
        $soal = Soal::where('id_mapel', $id)->get();
        $id_mapel = $id;
        return view('ujian.show', compact('soal', 'id_mapel'));
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
