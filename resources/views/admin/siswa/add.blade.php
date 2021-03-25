@extends('admin.layouts.app')

@section('content')

@if (Session::has('error_length_nisn'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        NISN terlalu panjang!
    </div>
</div>
@endif

@if (Session::has('error_length_nis'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        NIS terlalu panjang!
    </div>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Siswa</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminsiswa.store') }}" method="post">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan nisn.." type="number" class="form-control @error('nisn') is-invalid @enderror" required name="nisn" value="{{ old('nisn') }}" autocomplete="nisn" autofocus>
                    @error('nisn')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <label for="">Nomor Induk Siswa paling akhir adalah {{ $nis }}</label>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIS</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan nis.." type="number" class="form-control @error('nis') is-invalid @enderror" required name="nis" value="{{ old('nis') }}" autocomplete="nis">
                    @error('nis')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama lengkap.." type="text" class="form-control @error('nama') is-invalid @enderror" required name="nama" value="{{ old('nama') }}" autocomplete="nama">
                    @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kelas</label>
                <div class="col-sm-12 col-md-7">
                    <select name="kelas" class="form-control selectric" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($kelas as $k)
                        <option value="{{ $k->nama_kelas }}">{{ $k->nama_kelas }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan tempat lahir.." type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" value="{{ old('tempat_lahir') }}" autocomplete="tempat_lahir">
                    @error('tempat_lahir')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Lahir</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan tanggal lahir.." type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autocomplete="tanggal_lahir">
                    @error('tanggal_lahir')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jenis Kelamin</label>
                <div class="col-sm-12 col-md-7">
                    <select name="jk" class="form-control selectric" required>
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10" required></textarea>
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