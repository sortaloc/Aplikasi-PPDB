@extends('admin.layouts.app')
@section('content')

<div class="card">
    <div class="card-header">
        <h4>Sunting Data Mapel</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminmapel.update', $mapel->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Mapel</label>
                <div class="col-sm-12 col-md-7">
                    <input pattern="[A-Za-z0-9 ,.]+" placeholder="masukan nama mapel.." type="text" class="form-control @error('nama_mapel') is-invalid @enderror" required name="nama_mapel" value="{{ $mapel->nama_mapel }}" autocomplete="nama_mapel">
                    @error('nama_mapel')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">KKM</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan kkm.." type="number" class="form-control @error('kkm') is-invalid @enderror" required name="kkm" value="{{ $mapel->kkm }}" autocomplete="kkm">
                    @error('kkm')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Guru Mapel</label>
                <div class="col-sm-12 col-md-7">
                    <select name="guru_mapel" class="form-control select2" required>
                        <?php
                        foreach ($array as $key => $val) {
                            $selected = $mapel['guru_mapel'] == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }
                        ?>
                    </select>
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