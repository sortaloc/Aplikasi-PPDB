@extends('admin.layouts.app')
@section('content')

@if (Session::has('error_length_kkm'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        KKM terlalu panjang!
    </div>
</div>
@endif

@if (Session::has('error_length_jumlah'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        Jumlah soal terlalu panjang!
    </div>
</div>
@endif

@if (Session::has('error_length_waktu'))
<div class="alert alert-danger alert-dismissible show fade">
    <div class="alert-body">
        <button class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
        Waktu ujian terlalu panjang!
    </div>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h4>Tambah Data Mapel Ujian</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('adminmapelujian.store' ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Mapel</label>
                <div class="col-sm-12 col-md-7">
                    <select name="id_mapel" class="form-control select2" required>
                        <option value="">-- Pilih --</option>
                        @foreach($mapel as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_mapel }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">KKM</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan kkm.." type="number" class="form-control @error('kkm') is-invalid @enderror" required name="kkm" value="{{ old('kkm') }}" autocomplete="kkm">
                    @error('kkm')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah Soal</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan jumlah soal.." type="number" class="form-control @error('jumlah') is-invalid @enderror" required name="jumlah" value="{{ old('jumlah') }}" autocomplete="jumlah">
                    @error('jumlah')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Waktu Ujian (menit)</label>
                <div class="col-sm-12 col-md-7">
                    <input placeholder="masukan waktu ujian.." type="number" class="form-control @error('waktu') is-invalid @enderror" required name="waktu" value="{{ old('waktu') }}" autocomplete="waktu">
                    @error('waktu')
                    <div class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4">
                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar Sampul</label>
                <div class="col-sm-12 col-md-7">
                    <input name="foto" id="input_foto" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('foto') is-invalid @enderror" style="display: none;" required>
                    <button type="button" id="btn_foto" class="btn btn-icon icon-left btn-outline-info btn-sm"><i class="fas fa-camera"></i> Upload Gambar</button>
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