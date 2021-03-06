@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Latar Belakang</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminlatarbelakang.store') }}" method="post">
            @csrf
            
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sejarah</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="sejarah" class="form-control" id="" required autofocus></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Visi</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="visi" class="form-control" id="" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Misi</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="misi" class="form-control" id="" required></textarea>
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