@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Waktu Pelaksanaan Ujian</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminwaktu.store') }}" method="post">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Akademik</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="9" placeholder="masukan tahun akademik.." type="text" class="form-control @error('tahun_akademik') is-invalid @enderror" required name="tahun_akademik" value="{{ old('tahun_akademik') }}" autocomplete="tahun_akademik">
                    @error('tahun_akademik')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Buka</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan tanggal buka.." type="date" class="form-control @error('buka') is-invalid @enderror" required name="buka" value="{{ old('buka') }}" autocomplete="buka">
                    @error('buka')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Tutup</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan tanggal tutup.." type="date" class="form-control @error('tutup') is-invalid @enderror" required name="tutup" value="{{ old('tutup') }}" autocomplete="tutup">
                    @error('tutup')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
           

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection