@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Soal</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminsoal.store') }}" method="post">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Mapel</label>
                <div class="col-sm-12 col-md-7">
                    <select name="id_mapel" class="form-control select2" required>
                        <option value="">-- Pilih --</option>
                        @foreach ($mapelujian as $mu)
                        <option value="{{ $mu->id_mapel }}">{{ $mu->nama_mapel }}</option>
                        
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Soal</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="soal" class="summernote" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan A</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="A" class="summernote" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan B</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="B" class="summernote" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan C</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="C" class="summernote" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan D</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="D" class="summernote" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilihan E</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="E" class="summernote" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pilih Jawaban</label>
                <div class="col-sm-12 col-md-7">
                    <select name="jawaban" class="form-control selectric" required>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
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