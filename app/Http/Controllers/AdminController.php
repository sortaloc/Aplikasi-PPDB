<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    
    public function index()
    {
        if (Auth::check()) {
            return view('admin.admin');
        }
        return redirect('loginadmin');
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
