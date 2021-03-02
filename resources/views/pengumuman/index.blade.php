@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Halaman Pengumuman</h4>
    </div>
    <div class="card-body text-center">
        <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Status hasil ujian tertulis anda </p><span class="badge badge-warning">Sedang dalam penilaian</span> 
    </div>
</div>
<div class="card">
    <div class="card-header">
        <h4>Halaman Nilai</h4>
    </div>
    <div class="card-body">
        
    </div>
</div>
@endsection