@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Sunting Waktu Pendaftaran</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminwaktupendaftaran.update', $waktu->id) }}" method="post">
            @csrf
            @method('PUT')
    
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Buka</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan tanggal buka.." type="date" class="form-control @error('buka') is-invalid @enderror" required name="buka" value="{{ $waktu->buka }}" autocomplete="buka">
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
                    <input placeholder="masukan tanggal tutup.." type="date" class="form-control @error('tutup') is-invalid @enderror" required name="tutup" value="{{ $waktu->tutup }}" autocomplete="tutup">
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