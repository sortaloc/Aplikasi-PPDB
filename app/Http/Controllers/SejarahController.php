<?php

namespace App\Http\Controllers;

use App\Models\Latarbelakang;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    
    public function index()
    {
        $latarbelakang = Latarbelakang::first();
       
        return view('sejarah', compact('latarbelakang'));
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
