<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use App\Models\Mapel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminMapelController extends Controller
{
    
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $mapel = Mapel::orderBy('nama_mapel')->get();
            return view('admin.mapel.index', compact('mapel'));
        } else {
            return redirect('loginadmin');
        }
    }

    
    public function create()
    {
        if (Auth::guard('admin')->check()) {
            $guru = Guru::orderBy('nama', 'ASC')->get();
            return view('admin.mapel.add', compact('guru'));
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama_mapel' => ['required', 'string'],
            'kkm' => ['required', 'numeric'],
            'guru_mapel' => ['required', 'string']
        ]);
    }

    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            Mapel::create([
                'nama_mapel' => $request['nama_mapel'],
                'kkm' => $request['kkm'],
                'guru_mapel' => $request['guru_mapel']
            ]);
            return redirect('adminmapel')->with('tambah', 'Data telah ditambah!');
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
        $mapel = Mapel::find($id);
        $guru = Guru::orderBy('nama', 'ASC')->get();
        foreach ($guru as $g) {
            $array[] = $g['nama'];
        }
        
        return view('admin.mapel.edit', compact('mapel', 'array'));
    }

   
    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            Mapel::whereId($id)->update([
                'nama_mapel' => $request['nama_mapel'],
                'kkm' => $request['kkm'],
                'guru_mapel' => $request['guru_mapel']
            ]);
            return redirect('adminmapel')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }

   
    public function destroy($id)
    {
        Mapel::findOrFail($id)->delete();
        return redirect('adminmapel')->with('hapus', 'Data telah dihapus');
    }
}
