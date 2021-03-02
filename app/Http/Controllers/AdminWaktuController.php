<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Waktu;
use Illuminate\Support\Facades\Validator;

class AdminWaktuController extends Controller
{
    
    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $waktu = Waktu::orderBy('updated_at', 'DESC')->take(1)->first();
         
         
            if ($waktu->count() == 0) {
                return view('admin.waktu.add');
            } else {
                return view('admin.waktu.index', compact('waktu'));   
            }
        } else {
            return redirect('loginadmin');
        }
    }

    
    public function create()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'tahun_akademik' => ['required', 'string'],
            'buka' => ['required'],
            'tutup' => ['required']
        ]);
    }
   
    public function store(Request $request)
    {
        $this->validator($request->all())->validate();
        $buka = $request['buka'];
        $tutup = $request['tutup'];
        if ($tutup < $buka) {
            return redirect('adminwaktu')->with('errorwaktu', 'Waktu pendaftaran salah!');
        }
        Waktu::create([
            'tahun_akademik' => $request['tahun_akademik'],
            'buka' => $request['buka'],
            'tutup' => $request['tutup']
        ]);
        return redirect('adminwaktu')->with('tambah', 'Tanggal telah ditambah!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $waktu = Waktu::find($id);
        return view('admin.waktu.edit', compact('waktu'));
    }

    
    public function update(Request $request, $id)
    {
        $this->validator($request->all())->validate();
        $buka = $request['buka'];
        $tutup = $request['tutup'];
        if ($tutup < $buka) {
            return redirect('adminwaktu')->with('errorwaktu', 'Waktu pendaftaran salah!');
        }
        Waktu::whereId($id)->update([
            'tahun_akademik' => $request['tahun_akademik'],
            'buka' => $request['buka'],
            'tutup' => $request['tutup']
        ]);
        return redirect('adminwaktu')->with('sunting', 'Tanggal telah diubah!');
    }

    
    public function destroy($id)
    {
        //
    }
}
