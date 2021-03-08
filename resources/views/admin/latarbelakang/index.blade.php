@extends('admin.layouts.app')
@section('content')

@if (Session::has('tambah'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah ditambah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
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
@if (Session::has('latarbelakangada'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Latar belakang sudah ada!'
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Halaman Latar Belakang</h4>
        @if ($latarbelakang != null)

        <div class="card-header-action">
            <a href="{{ route('adminlatarbelakang.edit', $latarbelakang->id) }}" class="btn btn-info btn-icon icon-left">
                <i class="far fa-edit"></i>
                Edit Latar Belakang
            </a>
        </div>

        @else
        <div class="card-header-action">
            <a href="{{ route('adminlatarbelakang.create') }}" class="btn btn-primary btn-icon icon-left">
                <i class="fas fa-plus"></i>
                Tambahkan Latar Belakang
            </a>
        </div>
        @endif
    </div>

    <div class="card-body">
        @if ($latarbelakang != null)
        <h4>Sejarah</h4>
        <ol>
            <p>{{ $latarbelakang->sejarah }}</p>
        </ol>
        <h4>Visi</h4>
        <ol>
            <p>{{ $latarbelakang->visi }}</p>
        </ol>
        <h4>Misi</h4>
        <ol>
            <p>{{ $latarbelakang->misi }}</p>
        </ol>
        @else
        <h4>Sejarah</h4>
        <ol>
            <p>-</p>
        </ol>
        <h4>Visi</h4>
        <ol>
            <p>-</p>
        </ol>
        <h4>Misi</h4>
        <ol>
            <p>-</p>
        </ol>
        @endif
    </div>
</div>
@endsection