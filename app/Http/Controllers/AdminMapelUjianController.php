<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\MapelUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use File;

class AdminMapelUjianController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $mapelujian = MapelUjian::orderBy('nama_mapel', 'ASC')->get();
            return view('admin.mapelujian.index', compact('mapelujian'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $mapel = Mapel::orderBy('nama_mapel', 'ASC')->get();
            return view('admin.mapelujian.add', compact('mapel'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_mapel' => ['required', 'numeric', 'unique:mapel_ujians', 'max:20'],
            'kkm' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric'],
            'waktu' => ['required', 'numeric'],
            'foto' => ['required', 'max:1024', 'file', 'image', 'mimes:jpeg,png,jpg']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            //atur waktu
            date_default_timezone_set('Asia/Jakarta');

            //ambil waktu buat nama foto
            $waktu = date('His');

            $id_mapel = $request['id_mapel'];
            $mapel = Mapel::where('id', $id_mapel)->first();
            $nama_mapel = $mapel['nama_mapel'];

            $imageName = $id_mapel . $waktu . '.' . $request['foto']->extension();
            $request['foto']->move(public_path('image_mp'), $imageName);

            MapelUjian::create([
                'id_mapel' => $id_mapel,
                'nama_mapel' => $nama_mapel,
                'kkm' => $request['kkm'],
                'jumlah' => $request['jumlah'],
                'waktu' => $request['waktu'],
                'foto' => $imageName
            ]);

            return redirect('adminmapelujian')->with('tambah', 'Data telah diubah!');
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
            $mapelujian = MapelUjian::find($id);
            $mapel = Mapel::orderBy('nama_mapel', 'ASC')->get();
            foreach ($mapel as $m) {
                $id_mapel[] = $m['id'];
                $nama_mapel[] = $m['nama_mapel'];
            }

            $array_mapel = array_combine($id_mapel, $nama_mapel);
            return view('admin.mapelujian.edit', compact('mapelujian', 'array_mapel'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validatorEdit(array $data)
    {
        return Validator::make($data, [
            'kkm' => ['required', 'numeric'],
            'jumlah' => ['required', 'numeric'],
            'waktu' => ['required', 'numeric']
        ]);
    }

    protected function validatorIdMapel(array $data)
    {
        return Validator::make($data, [
            'id_mapel' => ['required', 'numeric', 'unique:mapel_ujians', 'max:20']
        ]);
    }

    protected function validatorFoto(array $data)
    {
        return Validator::make($data, [
            'foto' => ['required', 'max:1024', 'file', 'image', 'mimes:jpeg,png,jpg']
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validatorEdit($request->all())->validate();
            //atur waktu
            date_default_timezone_set('Asia/Jakarta');

            //ambil waktu buat nama foto
            $waktu = date('His');

            $mapelujian = MapelUjian::where('id', $id)->first();
            $ambil_id_mapel = $mapelujian['id_mapel'];
            $id_mapel = $request['id_mapel'];
            $mapel = Mapel::where('id', $id_mapel)->first();
            $nama_mapel = $mapel['nama_mapel'];

            if ($id_mapel != $ambil_id_mapel) {
                $this->validatorIdMapel($request->all())->validate();
            }

            if ($request['foto'] != null) {
                $this->validatorFoto($request->all())->validate();
                $foto = $mapelujian['foto'];
                File::delete('image_mp/' . $foto);

                $imageName = $id_mapel . $waktu . '.' . $request['foto']->extension();
                $request['foto']->move(public_path('image_mp'), $imageName);
                MapelUjian::whereId($id)->update([
                    'foto' => $imageName
                ]);
            }

            MapelUjian::whereId($id)->update([
                'id_mapel' => $id_mapel,
                'nama_mapel' => $nama_mapel,
                'kkm' => $request['kkm'],
                'jumlah' => $request['jumlah'],
                'waktu' => $request['waktu']
            ]);

            return redirect('adminmapelujian')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        if (Auth::guard('admin')->check()) {
            $mapelujian = MapelUjian::where('id', $id)->first();
            $foto = $mapelujian['foto'];
            File::delete('image_mp/' . $foto);

            MapelUjian::findOrFail($id)->delete();

            return redirect('adminmapelujian')->with('hapus', 'Data telah dihapus!');
        } else {
            return redirect('loginadmin');
        }
    }
}
