<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Latarbelakang;

class VisiMisiController extends Controller
{
    
    public function index()
    {
        $latarbelakang = Latarbelakang::first();
        return view('visimisi', compact('latarbelakang'));
    }

    
    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
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
