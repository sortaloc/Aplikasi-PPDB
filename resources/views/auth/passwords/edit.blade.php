@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        <h4>Sunting Password</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('home.update', $user->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password Baru</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan password.." type="password" class="form-control @error('password') is-invalid @enderror" required name="password" autocomplete="password">
                    @error('password')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Konfirmasi Password</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="konfirmasi password.." type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection