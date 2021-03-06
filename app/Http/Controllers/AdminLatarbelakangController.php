<?php

namespace App\Http\Controllers;

use App\Models\Latarbelakang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminLatarbelakangController extends Controller
{

    public function index()
    {
        if (Auth::guard('admin')->check()) {
            $latarbelakang = Latarbelakang::orderBy('updated_at')->first();

            return view('admin.latarbelakang.index', compact('latarbelakang'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function create()
    {
        if (Auth::guard('admin')->check()) {
            return view('admin.latarbelakang.add');
        } else {
            return redirect('loginadmin');
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'sejarah' => ['required'],
            'visi' => ['required'],
            'misi' => ['required'],
        ]);
    }


    public function store(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            $latarbelakang = Latarbelakang::get()->count();

            if ($latarbelakang > 0) {
                return redirect('adminlatarbelakang')->with('latarbelakangada', 'Latar belakang sudah tersedia!');
            }

            Latarbelakang::create([
                'sejarah' => $request['sejarah'],
                'visi' => $request['visi'],
                'misi' => $request['misi']
            ]);

            return redirect('adminlatarbelakang')->with('tambah', 'Data telah ditambah!');
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
            $latarbelakang = Latarbelakang::find($id);

            return view('admin.latarbelakang.edit', compact('latarbelakang'));
        } else {
            return redirect('loginadmin');
        }
    }


    public function update(Request $request, $id)
    {
        if (Auth::guard('admin')->check()) {
            $this->validator($request->all())->validate();
            Latarbelakang::whereId($id)->update([
                'sejarah' => $request['sejarah'],
                'visi' => $request['visi'],
                'misi' => $request['misi']
            ]);

            return redirect('adminlatarbelakang')->with('sunting', 'Data telah diubah!');
        } else {
            return redirect('loginadmin');
        }
    }


    public function destroy($id)
    {
        //
    }
}
