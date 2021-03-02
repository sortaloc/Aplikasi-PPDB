@extends('admin.layouts.app')
@section('content')
@if (Session::has('sunting'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Halaman Utama</h4>
    </div>
    <div class="card-body">
        <h4>Selamat Datang, {{ auth()->guard('admin')->user()->nama }}!</h4>
        <p>Aplikasi PPDB Mts Ma'arif NU 12 Bulakparen</p>
    </div>
</div>
@endsection