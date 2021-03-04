@extends('layouts.app')
@section('content')
@if (Session::has('errorberkas'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'Berkas sudah tersedia!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
<div class="card">
    <div class="card-header">
        <h4>Lengkapi Berkas</h4>
    </div>
    <div class="card-body">

        @foreach ($errors->all() as $error)
        <div class="alert alert-danger alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
                {{ $error }}
            </div>
        </div>
        @endforeach

        <div class="row">
            <div class="col-md-3 text-center">
                <span>Akta Kelahiran</span>
                <br>
                <br>
                <a id="btn_akta" class="btn btn-icon icon-left btn-round btn-outline-primary"><i class="fas fa-upload"></i> Upload</a>
            </div>
            <div class="col-md-3 text-center">
                <span>Surat Keterangan Hasil Ujian Nasional (SKHUN)</span>
                <br>
                <a id="btn_skhun" class="btn btn-icon icon-left btn-round btn-outline-secondary"><i class="fas fa-upload"></i> Upload</a>
            </div>
            <div class="col-md-3 text-center">
                <span>Ijazah</span>
                <br>
                <br>
                <a id="btn_ijazah" class="btn btn-icon icon-left btn-round btn-outline-info"><i class="fas fa-upload"></i> Upload</a>
            </div>
            <div class="col-md-3 text-center">
                <span>Kartu Keluarga</span>
                <br>
                <br>
                <a id="btn_kk" class="btn btn-icon icon-left btn-round btn-outline-warning"><i class="fas fa-upload"></i> Upload</a>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 text-center">
                <span>Kartu Tanda Penduduk (KTP) salah satu keluarga</span>
                <br>
                <a id="btn_ktp" class="btn btn-icon icon-left btn-round btn-outline-danger"><i class="fas fa-upload"></i> Upload</a>
            </div>
            <div class="col-md-3 text-center">
                <span>Program Keluarga Harapan (PKH) jika ada</span>
                <br>
                <a id="btn_pkh" class="btn btn-icon icon-left btn-round btn-outline-success"><i class="fas fa-upload"></i> Upload</a>
            </div>
            <div class="col-md-3 text-center">
                <span>Kartu Indonesia Pintar (KIP) jika ada</span>
                <br>
                <br>
                <a id="btn_kip" class="btn btn-icon icon-left btn-round btn-outline-info"><i class="fas fa-upload"></i> Upload</a>
            </div>
            <div class="col-md-3 text-center">
                <span>Kartu Perlindungan Sosial (KPS) jika ada</span>
                <br>
                <a id="btn_kps" class="btn btn-icon icon-left btn-round btn-outline-dark"><i class="fas fa-upload"></i> Upload</a>
            </div>
        </div>

        <form action="{{ route('dokumen.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input name="pkh" id="input_pkh" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('pkh') is-invalid @enderror" style="display: none;">
            <input name="kip" id="input_kip" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('kip') is-invalid @enderror" style="display: none;">
            <input name="kps" id="input_kps" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('kps') is-invalid @enderror" style="display: none;">
            <input name="akta" id="input_akta" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('akta') is-invalid @enderror" style="display: none;" required>
            <input name="skhun" id="input_skhun" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('skhun') is-invalid @enderror" style="display: none;" required>
            <input name="ijazah" id="input_ijazah" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('ijazah') is-invalid @enderror" style="display: none;" required>
            <input name="kk" id="input_kk" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('kk') is-invalid @enderror" style="display: none;" required>
            <input name="ktp" id="input_ktp" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('ktp') is-invalid @enderror" style="display: none;" required>
            <br>
            <div class="card-footer row">
                <div class="col-md-10"></div>
                <div class="col-md-2 text-center">
                    <button type="submit" class="btn btn-icon icon-left btn-primary"><i class="fas fa-save"></i>  Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card" id="tampil_berkas" style="display: none;">
    <div class="card-header">
        <h4>Tampilan Berkas</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3 text-center">
                <span id="span_akta" style="display: none;">Akta Kelahiran</span>
                <br>
                <br>
                <img id="gambar_akta" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_skhun" style="display: none;">Surat Keterangan Hasil Ujian Nasional (SKHUN)</span>
                <br>
                <img id="gambar_skhun" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_ijazah" style="display: none;">Ijazah</span>
                <br>
                <br>
                <img id="gambar_ijazah" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_kk" style="display: none;">Kartu Keluarga</span>
                <br>
                <br>
                <img id="gambar_kk" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-3 text-center">
                <span id="span_ktp" style="display: none;">Kartu Tanda Penduduk (KTP) salah satu keluarga</span>
                <br>
                <img id="gambar_ktp" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_pkh" style="display: none;">Program Keluarga Harapan (PKH)</span>
                <br>
                <br>
                <img id="gambar_pkh" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_kip" style="display: none;">Kartu Indonesia Pintar (KIP)</span>
                <br>
                <br>
                <img id="gambar_kip" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
            <div class="col-md-3 text-center">
                <span id="span_kps" style="display: none;">Kartu Perlindungan Sosial (KPS)</span>
                <br>
                <br>
                <img id="gambar_kps" style="width: 230px; height: 300px; display: none;" class="img-thumbnail mx-auto" src="" alt="">
            </div>
        </div>
    </div>
</div>

<script>
    // pkh
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_pkh = document.getElementById('btn_pkh');
    var input_pkh = document.getElementById('input_pkh');
    var span_pkh = document.getElementById('span_pkh');
    var gambar_pkh = document.getElementById('gambar_pkh');

    btn_pkh.addEventListener('click', function() {
        input_pkh.click();
    })
    input_pkh.addEventListener('change', function() {
        tampil_pkh(this);
    })

    function tampil_pkh(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_pkh').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_pkh.style.display = "block";
            gambar_pkh.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }

    // kip
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_kip = document.getElementById('btn_kip');
    var input_kip = document.getElementById('input_kip');
    var span_kip = document.getElementById('span_kip');
    var gambar_kip = document.getElementById('gambar_kip');

    btn_kip.addEventListener('click', function() {
        input_kip.click();
    })
    input_kip.addEventListener('change', function() {
        tampil_kip(this);
    })

    function tampil_kip(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_kip').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_kip.style.display = "block";
            gambar_kip.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }

    // kps
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_kps = document.getElementById('btn_kps');
    var input_kps = document.getElementById('input_kps');
    var span_kps = document.getElementById('span_kps');
    var gambar_kps = document.getElementById('gambar_kps');

    btn_kps.addEventListener('click', function() {
        input_kps.click();
    })
    input_kps.addEventListener('change', function() {
        tampil_kps(this);
    })

    function tampil_kps(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_kps').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_kps.style.display = "block";
            gambar_kps.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }

    // Akta
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_akta = document.getElementById('btn_akta');
    var input_akta = document.getElementById('input_akta');
    var span_akta = document.getElementById('span_akta');
    var gambar_akta = document.getElementById('gambar_akta');

    btn_akta.addEventListener('click', function() {
        input_akta.click();
    })
    input_akta.addEventListener('change', function() {
        tampil_akta(this);
    })

    function tampil_akta(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_akta').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_akta.style.display = "block";
            gambar_akta.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }

    // Skhun
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_skhun = document.getElementById('btn_skhun');
    var input_skhun = document.getElementById('input_skhun');
    var span_skhun = document.getElementById('span_skhun');
    var gambar_skhun = document.getElementById('gambar_skhun');

    btn_skhun.addEventListener('click', function() {
        input_skhun.click();
    })
    input_skhun.addEventListener('change', function() {
        tampil_skhun(this);
    })

    function tampil_skhun(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_skhun').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_skhun.style.display = "block";
            gambar_skhun.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }

    // Ijazah
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_ijazah = document.getElementById('btn_ijazah');
    var input_ijazah = document.getElementById('input_ijazah');
    var span_ijazah = document.getElementById('span_ijazah');
    var gambar_ijazah = document.getElementById('gambar_ijazah');

    btn_ijazah.addEventListener('click', function() {
        input_ijazah.click();
    })
    input_ijazah.addEventListener('change', function() {
        tampil_ijazah(this);
    })

    function tampil_ijazah(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_ijazah').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_ijazah.style.display = "block";
            gambar_ijazah.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }

    // KK
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_kk = document.getElementById('btn_kk');
    var input_kk = document.getElementById('input_kk');
    var span_kk = document.getElementById('span_kk');
    var gambar_kk = document.getElementById('gambar_kk');

    btn_kk.addEventListener('click', function() {
        input_kk.click();
    })
    input_kk.addEventListener('change', function() {
        tampil_kk(this);
    })

    function tampil_kk(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_kk').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_kk.style.display = "block";
            gambar_kk.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }

    // KTP
    var tampil_berkas = document.getElementById('tampil_berkas');
    var btn_ktp = document.getElementById('btn_ktp');
    var input_ktp = document.getElementById('input_ktp');
    var span_ktp = document.getElementById('span_ktp');
    var gambar_ktp = document.getElementById('gambar_ktp');

    btn_ktp.addEventListener('click', function() {
        input_ktp.click();
    })
    input_ktp.addEventListener('change', function() {
        tampil_ktp(this);
    })

    function tampil_ktp(a) {
        if (a.files && a.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('gambar_ktp').src = e.target.result;
            }
            tampil_berkas.style.display = "block";
            span_ktp.style.display = "block";
            gambar_ktp.style.display = "block";
            reader.readAsDataURL(a.files[0]);
        }
    }
</script>
@endsection