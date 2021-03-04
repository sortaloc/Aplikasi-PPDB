@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Tagihan</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('admintagihan.store') }}" method="post">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Tagihan</label>
                <div class="col-sm-12 col-md-7">
                    <input pattern="[A-Za-z0-9 ,.]+" placeholder="masukan nama tagihan.." type="text" class="form-control @error('nama_tagihan') is-invalid @enderror" required name="nama_tagihan" value="{{ old('nama_tagihan') }}" autocomplete="nama_tagihan">
                    @error('nama_tagihan')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Tagihan (Rp. )</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan jumlah tagihan.." type="number" class="form-control @error('jumlah_tagihan') is-invalid @enderror" required name="jumlah_tagihan" value="{{ old('jumlah_tagihan') }}" autocomplete="jumlah_tagihan">
                    @error('jumlah_tagihan')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Batas Pembayaran</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan batas pembayaran.." type="date" class="form-control @error('batas') is-invalid @enderror" required name="batas" value="{{ old('batas') }}" autocomplete="batas">
                    @error('batas')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
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