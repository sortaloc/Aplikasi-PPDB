<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\MapelUjian;
use App\Models\Soal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminSoalController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $mapelujian = MapelUjian::orderBy('nama_mapel', 'ASC')->get();
            $soal = Soal::orderBy('nama_mapel', 'ASC')->simplePaginate(10);

            return view('admin.soal.index', compact('mapelujian', 'soal'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $mapelujian = MapelUjian::orderBy('nama_mapel', 'ASC')->get();

            return view('admin.soal.add', compact('mapelujian'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_mapel' => ['required', 'numeric|max:20'],
            'soal' => ['required'],
            'A' => ['required'],
            'B' => ['required'],
            'C' => ['required'],
            'D' => ['required'],
            'E' => ['required'],
            'jawaban' => ['required', 'string']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            
            $id_mapel = $request['id_mapel'];
            $jumlah = Soal::where('id_mapel', $id_mapel)->count();
            $mapelujian = MapelUjian::where('id_mapel', $id_mapel)->first();
            $nama_mapel = $mapelujian['nama_mapel'];
            $jumlah_soal = $mapelujian['jumlah'];
            
            if ($jumlah_soal == $jumlah) {
                return redirect('adminsoal')->with('soal', 'Quota soal sudah penuh!');
            }
            
            Soal::create([
                'id_mapel' => $id_mapel,
                'nama_mapel' => $nama_mapel,
                'soal' => $request['soal'],
                'A' => $request['A'],
                'B' => $request['B'],
                'C' => $request['C'],
                'D' => $request['D'],
                'E' => $request['E'],
                'jawaban' => $request['jawaban']
            ]);

            return redirect('adminsoal')->with('tambah', 'Data telah ditambah!');
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
            $mapelujian = MapelUjian::orderBy('nama_mapel', 'ASC')->get();
            $soal = Soal::find($id);

            foreach ($mapelujian as $mu) {
                $id_mapel[] = $mu['id_mapel'];
                $nama_mapel[] = $mu['nama_mapel'];
            }

            $array_mapel_ujian = array_combine($id_mapel, $nama_mapel);

            return view('admin.soal.edit', compact('array_mapel_ujian', 'soal'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            $id_mapel = $request['id_mapel'];
            $mapel = Mapel::where('id', $id_mapel)->first();
            $nama_mapel = $mapel['nama_mapel'];

            Soal::whereId($id)->update([
                'id_mapel' => $id_mapel,
                'nama_mapel' => $nama_mapel,
                'soal' => $request['soal'],
                'A' => $request['A'],
                'B' => $request['B'],
                'C' => $request['C'],
                'D' => $request['D'],
                'E' => $request['E'],
                'jawaban' => $request['jawaban']
            ]);

            return redirect('adminsoal')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            Soal::findOrFail($id)->delete();

            return redirect('adminsoal')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }

    public function cariData(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $cari = $request['cari'];

            $soal = Soal::orderBy('nama_mapel', 'ASC')
                ->orwhere('nama_mapel', 'like', "%" . $cari . "%")
                ->paginate(10);

            $mapelujian = MapelUjian::orderBy('nama_mapel', 'ASC')->get();

            return view('admin.soal.index', compact('soal', 'mapelujian'));
        } else {
            return redirect('loginadmin');
        }
    }
}
