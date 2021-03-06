@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>Sunting Formulir</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('daftar.update', $pendaftaran->id ) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan nisn.." type="number" class="form-control @error('nisn') is-invalid @enderror" required name="nisn" value="{{ $pendaftaran->nisn }}" autocomplete="nisn" autofocus>
                    @error('nisn')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama lengkap.." type="text" class="form-control @error('nama') is-invalid @enderror" required name="nama" value="{{ $pendaftaran->nama }}" autocomplete="nama">
                    @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan tempat lahir.." type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" value="{{ $pendaftaran->tempat_lahir }}" autocomplete="tempat_lahir">
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
                    <input placeholder="masukan tanggal lahir.." type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir" value="{{ $pendaftaran->tanggal_lahir }}" autocomplete="tanggal_lahir">
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
                        <?php

                        $array_jk = array('Laki-laki', 'Perempuan');

                        foreach ($array_jk as $key => $val) {
                            $selected = $pendaftaran['jk'] == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan agama.." type="text" class="form-control @error('agama') is-invalid @enderror" required name="agama" value="{{ $pendaftaran->agama }}" autocomplete="agama">
                    @error('agama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10" required>{{ $pendaftaran->alamat }}</textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama ayah.." type="text" class="form-control @error('nama_ayah') is-invalid @enderror" required name="nama_ayah" value="{{ $pendaftaran->nama_ayah }}" autocomplete="nama_ayah">
                    @error('nama_ayah')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ibu</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama ibu.." type="text" class="form-control @error('nama_ibu') is-invalid @enderror" required name="nama_ibu" value="{{ $pendaftaran->nama_ibu }}" autocomplete="nama_ibu">
                    @error('nama_ibu')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan Ayah</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan pekerjaan ayah.." type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" required name="pekerjaan_ayah" value="{{ $pendaftaran->pekerjaan_ayah }}" autocomplete="pekerjaan_ayah">
                    @error('pekerjaan_ayah')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pekerjaan Ibu</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan pekerjaan ibu.." type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" required name="pekerjaan_ibu" value="{{ $pendaftaran->pekerjaan_ibu }}" autocomplete="pekerjaan_ibu">
                    @error('pekerjaan_ibu')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Tinggal</label>
                <div class="col-sm-12 col-md-7">
                    <select name="tempat_tinggal" class="form-control selectric" required>
                        <?php

                        $array_tempat_tinggal = array('Bersama Orang Tua', 'Bersama Wali', 'Kontrak / Kos');

                        foreach ($array_tempat_tinggal as $key => $val) {
                            $selected = $pendaftaran['tempat_tinggal'] == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="60" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan asal sekolah.." type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" required name="asal_sekolah" value="{{ $pendaftaran->asal_sekolah }}" autocomplete="asal_sekolah">
                    @error('asal_sekolah')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Transportasi</label>
                <div class="col-sm-12 col-md-7">
                    <select name="transportasi" class="form-control selectric" required>
                        <?php

                        $array_transportasi = array('Jalan Kaki', 'Motor', 'Mobil', 'Angkutan Umum');

                        foreach ($array_transportasi as $key => $val) {
                            $selected = $pendaftaran['transportasi'] == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="far fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection