@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Acuan NIS</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminnis.store') }}" method="post">
            @csrf

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Acuan NIS</label>
                <div class="col-sm-12 col-md-7">
                <input placeholder="masukan nis.." type="number" class="form-control @error('nis') is-invalid @enderror" required name="nis" value="{{ old('nis') }}" autocomplete="nis" autofocus>
                    @error('nis')
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