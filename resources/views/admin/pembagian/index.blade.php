@extends('admin.layouts.app')
@section('content')
@if (Session::has('errornisn'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'NISN telah terdaftar sebagai siswa!'
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Tambah Data Siswa</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminpembagian.store') }}" method="post">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-6">
                    <label for="">Nomor Induk Siswa paling akhir adalah {{ $nis }}</label>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIS</label>
                <div class="col-sm-12 col-md-3">
                    <input placeholder="masukan nis.." type="number" class="form-control @error('nis') is-invalid @enderror" required name="nis" value="{{ old('nis') }}" autocomplete="nis" autofocus>
                    @error('nis')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
                <div class="col-sm-12 col-md-3">
                    <select name="kelas" class="form-control selectric" required>
                        @foreach ($kelas as $k)
                        <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Data Siswa Pendaftar</label>
                <div class="col-sm-12 col-md-6">
                    <select name="id_user" class="form-control select2" required>
                        @foreach ($pendaftaran as $p)
                        <option value="{{ $p->id_user }}">({{ $p->nisn }}) {{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection