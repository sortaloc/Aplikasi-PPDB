@extends('admin.layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h4>Sunting Data Siswa</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminsiswa.update', $siswa->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan nisn.." type="number" class="form-control @error('nisn') is-invalid @enderror" required name="nisn" value="{{ $siswa->nisn }}" autocomplete="nisn" autofocus>
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
                    <input placeholder="masukan nis.." type="number" class="form-control @error('nis') is-invalid @enderror" required name="nis" value="{{ $siswa->nis }}" autocomplete="nis">
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
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama lengkap.." type="text" class="form-control @error('nama') is-invalid @enderror" required name="nama" value="{{ $siswa->nama }}" autocomplete="nama">
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
                        <?php

                        foreach ($kelas as $key => $val) {
                            $selected = $siswa['kelas'] == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan tempat lahir.." type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" autocomplete="tempat_lahir">
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
                    <input placeholder="masukan tanggal lahir.." type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" autocomplete="tanggal_lahir">
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
                            $selected = $siswa['jk'] == $val ? ' selected = "selected" ' : '';

                            echo '<option value=" ' . $val . ' " ' . $selected . ' > ' . $val . ' </option>';
                        }

                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10" required>{{ $siswa->alamat }}</textarea>
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