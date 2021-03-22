@extends('admin.layouts.app')

@section('content')

@if (Session::has('errorno_hp'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Format No HP salah!'
    })
</script>
@endif
@if (Session::has('error_length_no_hp'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Nomor HP terlalu panjang!'
    })
</script>
@endif
@if (Session::has('error_length_tahun_masuk'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Tahun terlalu panjang!'
    })
</script>
@endif

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Guru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminguru.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIP</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan nip.." type="number" class="form-control @error('nip') is-invalid @enderror" required name="nip" value="{{ old('nip') }}" autocomplete="nip" autofocus>
                    @error('nip')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NUPTK</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan nuptk.." type="number" class="form-control @error('nuptk') is-invalid @enderror" required name="nuptk" value="{{ old('nuptk') }}" autocomplete="nuptk">
                    @error('nuptk')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Lengkap</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z ,.]+" placeholder="masukan nama lengkap.." type="text" class="form-control @error('nama') is-invalid @enderror" required name="nama" value="{{ old('nama') }}" autocomplete="nama">
                    @error('nama')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tahun Masuk</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan tahun masuk.." type="number" class="form-control @error('tahun_masuk') is-invalid @enderror" required name="tahun_masuk" value="{{ old('tahun_masuk') }}" autocomplete="tahun_masuk">
                    @error('tahun_masuk')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pendidikan Terakhir</label>
                <div class="col-sm-12 col-md-7">
                    <input pattern="[A-Za-z0-9 ,.]+" placeholder="masukan pendidikan terakhir.." type="text" class="form-control @error('pendidikan') is-invalid @enderror" required name="pendidikan" value="{{ old('pendidikan') }}" autocomplete="pendidikan">
                    @error('pendidikan')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tempat Lahir</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan tempat lahir.." type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" required name="tempat_lahir" value="{{ old('tempat_lahir') }}" autocomplete="tempat_lahir">
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
                    <input placeholder="masukan tanggal lahir.." type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" required name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" autocomplete="tanggal_lahir">
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
                        <option value="">-- Pilih --</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Agama</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" pattern="[A-Za-z0-9 ,.]+" placeholder="masukan agama.." type="text" class="form-control @error('agama') is-invalid @enderror" required name="agama" value="{{ old('agama') }}" autocomplete="agama">
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
                    <textarea name="alamat" class="form-control" id="" cols="30" rows="10" required></textarea>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nomor Hp</label>
                <div class="col-sm-12 col-md-7">
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+</div>
                        </div>
                        <input id="inlineFormInputGroup" placeholder="masukan nomor hp dengan format 6281234xxxx.." type="number" class="form-control @error('no_hp') is-invalid @enderror" required name="no_hp" value="{{ old('no_hp') }}" autocomplete="no_hp">
                        @error('no_hp')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                <div class="col-sm-12 col-md-7">
                    <input maxlength="40" placeholder="masukan email.." type="email" class="form-control @error('email') is-invalid @enderror" required name="email" value="{{ old('email') }}" autocomplete="email">
                    @error('nama_ibu')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                <div class="col-sm-12 col-md-7">
                    <input name="foto" id="input_foto" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('foto') is-invalid @enderror" style="display: none;" required>
                    <button type="button" id="btn_foto" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-camera"></i> Upload Foto</button>
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
                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection