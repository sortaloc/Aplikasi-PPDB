@extends('layouts.app')
@section('content')
@if (Session::has('tambah'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah ditambahkan!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('sunting'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Data telah diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('editfoto'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Foto telah diubah!',
        showConfirmButton: false,
        timer: 2000
    })
</script>
@endif
@if (Session::has('nisnuserama'))
<script>
    Swal.fire({
        icon: 'error',
        title: 'NISN telah terdaftar di akun lain!'
    })
</script>
@endif
<div class="card author-box card-primary">
    <div class="card-header">
        <h4>Formulir</h4>
        <div class="card-header-action">
            <a href="{{ route('daftar.edit', $pendaftaran->id)}}" class="btn btn-outline-info">
                Edit Formulir
            </a>
        </div>
    </div>
    <div class="card-body row">
        <div class="col-md-3">
            <img id="gambar_foto" alt="image" src="{{ url('images/'. $pendaftaran->foto) }}" style="width: 210px; height: 280px" class="img-thumbnail mx-auto d-block">
            <div class="clearfix"></div>
            <button id="btn_foto" style="width: 90%;" class="btn btn-icon icon-left btn-info mt-3 mx-auto d-block"><i class="far fa-edit"></i> Ganti Foto</button>

            <form method="POST" action="{{ url('daftar/updatefoto', $pendaftaran->id) }}" enctype="multipart/form-data">
                @csrf
                <input name="foto" id="input_foto" type="file" accept="image/jpeg,image/jpg,image/png," class="form-control @error('foto') is-invalid @enderror" style="display: none;" required>
                @error('foto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <button id="btn_simpan" style="display: none; width: 90%;" class="btn btn-icon icon-left btn-primary mt-3 mx-auto "><i class="far fa-save"></i> Simpan</button>
            </form>
            <script>
                var btn_foto = document.getElementById('btn_foto');
                var input_foto = document.getElementById('input_foto');

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
                            document.getElementById("btn_simpan").style.display = "block";
                        }
                        reader.readAsDataURL(a.files[0]);
                    }
                }
            </script>

            <br>


        </div>
        <div class="col-md-9">
            <div class="author-box-name">
                <h5 class="text-primary">{{ $pendaftaran->nama }}</h5>
            </div>
            <div class="author-box-job">Calon Peserta Didik Baru</div>
            <div class="author-box-description">
                <div class="row">
                    <div class="col-md-3">
                        <span>NISN</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->nisn }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Tahun Pendaftaran</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->tahun_pendaftaran }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Tempat, Tanggal Lahir</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->tempat_lahir }}, {{ $tanggal_lahir }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Jenis Kelamin</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->jk }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Agama</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->agama }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Alamat</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->alamat }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Nama Ayah</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->nama_ayah }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Nama Ibu</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->nama_ibu }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Pekerjaan Ayah</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->pekerjaan_ayah }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Pekerjaan Ibu</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->pekerjaan_ibu }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Tempat Tinggal</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->tempat_tinggal }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Asal Sekolah</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->asal_sekolah }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Transportasi</span>
                    </div>
                    <div class="col-md-9">
                        <span>: {{ $pendaftaran->transportasi }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <span>Status</span>
                    </div>
                    <div class="col-md-9">
                        : <span class="badge badge-warning">{{ $pendaftaran->status }}</span>
                    </div>
                </div>
            </div>
            <br>
        </div>
    </div>
</div>
</div>





@endsection