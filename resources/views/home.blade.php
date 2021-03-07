@extends('layouts.app')
@section('content')
@if (Session::has('ubahpassword'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Password berhasil diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('pendaftaran_belum_di_mulai'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Pendaftaran belum dibuka!'
    })
</script>
@endif
@if (Session::has('pendaftaran_sudah_di_tutup'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Pendaftaran sudah ditutup!'
    })
</script>
@endif

@if (Session::has('ujian_belum_di_mulai'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Ujian belum dibuka!'
    })
</script>
@endif
@if (Session::has('ujian_sudah_di_tutup'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Ujian sudah ditutup!'
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Halaman Utama</h4>
    </div>
    <div class="card-body">
        <h4>Selamat Datang, {{ Auth::user()->name }}!</h4>
        <p>Aplikasi PPDB</p>
    </div>
</div>
@endsection