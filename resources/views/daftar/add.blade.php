@extends('layouts.app')

@section('content')
@if (Session::has('nisnusersama'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'NISN telah terdaftar pada akun lain!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Lengkapi Formulir</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('daftar.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NISN</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan nisn.." type="number" class="form-control @error('nisn') is-invalid @enderror" required name="nisn" value="{{ $nisn }}" autocomplete="nisn">
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
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama lengkap.." type="text" class="form-control @error('nama') is-invalid @enderror" required name="nama" value="{{ $nama }}" autocomplete="nama">
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
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan tempat lahir.." type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" autocomplete="tempat_lahir">
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
                    <input placeholder="masukan tanggal lahir.." type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir" autocomplete="tanggal_lahir">
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
                    <select name="jk" class="form-control selectric">
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan agama.." type="text" class="form-control @error('agama') is-invalid @enderror" required name="agama" autocomplete="agama">
                    @error('agama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Lengkap</label>
                <div class="col-sm-12 col-md-7">
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10"></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Ayah</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama ayah.." type="text" class="form-control @error('nama_ayah') is-invalid @enderror" required name="nama_ayah" autocomplete="nama_ayah">
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
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama ibu.." type="text" class="form-control @error('nama_ibu') is-invalid @enderror" required name="nama_ibu" autocomplete="nama_ibu">
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
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan pekerjaan ayah.." type="text" class="form-control @error('pekerjaan_ayah') is-invalid @enderror" required name="pekerjaan_ayah" autocomplete="pekerjaan_ayah">
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
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan pekerjaan ibu.." type="text" class="form-control @error('pekerjaan_ibu') is-invalid @enderror" required name="pekerjaan_ibu" autocomplete="pekerjaan_ibu">
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
                        <option value="">-- Pilih --</option>
                        <option value="Bersama Orang Tua">Bersama Orang Tua</option>
                        <option value="Bersama Wali">Bersama Wali</option>
                        <option value="Kontrak / Kos">Kontrak / Kos</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Asal Sekolah</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="60" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan asal sekolah.." type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" required name="asal_sekolah" autocomplete="asal_sekolah">
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
                        <option value="">-- Pilih --</option>
                        <option value="Jalan Kaki">Jalan Kaki</option>
                        <option value="Motor">Motor</option>
                        <option value="Mobil">Mobil</option>
                        <option value="Angkutan Umum">Angkutan Umum</option>
                    </select>
                </div>
            </div>

            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                <div class="col-sm-12 col-md-7">
                    <input name="foto" id="input_foto" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('foto') is-invalid @enderror" style="display: none;" required>
                    <button type="button" id="btn_foto" class="btn btn-outline-info btn-sm">Upload Foto</button>
                    @error('foto')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                <div class="col-sm-12 col-md-7">
                    <img style="display: none;" src="" style="width: 400px; height: 200px" id="gambar_foto" src="" alt="..." class="img-thumbnail img-responsive">
                </div>
            </div>

            <script>
                var btn_foto = document.getElementById('btn_foto');
                var input_foto = document.getElementById('input_foto');
                var gbr_foto = document.getElementById('gambar_foto');
                btn_foto.addEventListener('click', function() {
                    input_foto.click();
                })
                input_foto.addEventListener('change', function() {
                    gambar_foto(this);
                })

                function gambar_foto(a) {
                    if (a.files && a.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('gambar_foto').src = e.target.result;
                        }
                        gbr_foto.style.display = "block";
                        reader.readAsDataURL(a.files[0]);
                    }
                }
            </script>

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